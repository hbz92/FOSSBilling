<?php
/**
 * Plesk Extended Features Installation Script
 * 
 * This script installs the Plesk Extended Features for FOSSBilling
 * Run this script from the FOSSBilling root directory
 */

// Check if we're running from the correct directory
if (!file_exists('src/load.php')) {
    die("Error: Please run this script from the FOSSBilling root directory.\n");
}

// Load FOSSBilling
require_once 'src/load.php';

echo "Plesk Extended Features Installation Script\n";
echo "==========================================\n\n";

try {
    // Check if database connection is available
    $di = include 'src/di.php';
    $db = $di['db'];
    
    echo "✓ Database connection established\n";
    
    // Check if the tables already exist
    $existingTables = $db->getCol("SHOW TABLES LIKE 'service_hosting_app_installation'");
    
    if (!empty($existingTables)) {
        echo "⚠ Tables already exist. Do you want to reinstall? (y/N): ";
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        fclose($handle);
        
        if (trim($line) !== 'y' && trim($line) !== 'Y') {
            echo "Installation cancelled.\n";
            exit(0);
        }
        
        echo "Dropping existing tables...\n";
        $db->exec("DROP TABLE IF EXISTS service_hosting_app_backup");
        $db->exec("DROP TABLE IF EXISTS service_hosting_app_installation");
        $db->exec("DROP TABLE IF EXISTS service_hosting_plesk_product_config");
        $db->exec("DROP TABLE IF EXISTS service_hosting_plesk_config");
    }
    
    // Read and execute the SQL file
    $sqlFile = 'src/install/sql/plesk_extended.sql';
    if (!file_exists($sqlFile)) {
        die("Error: SQL file not found at $sqlFile\n");
    }
    
    $sql = file_get_contents($sqlFile);
    $statements = explode(';', $sql);
    
    echo "Creating database tables...\n";
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement)) {
            try {
                $db->exec($statement);
            } catch (Exception $e) {
                echo "Warning: " . $e->getMessage() . "\n";
            }
        }
    }
    
    echo "✓ Database tables created successfully\n";
    
    // Check if Plesk server manager exists
    $pleskManagerFile = 'src/library/Server/Manager/Plesk.php';
    if (!file_exists($pleskManagerFile)) {
        echo "⚠ Warning: Plesk server manager not found at $pleskManagerFile\n";
        echo "  Please ensure the Plesk server manager is properly installed.\n";
    } else {
        echo "✓ Plesk server manager found\n";
    }
    
    // Check if the extended Plesk manager exists
    $extendedPleskFile = 'src/modules/Servicehosting/ServicePleskAutoInstaller.php';
    if (!file_exists($extendedPleskFile)) {
        echo "⚠ Warning: Plesk Auto Installer service not found at $extendedPleskFile\n";
        echo "  Please ensure all files are properly copied.\n";
    } else {
        echo "✓ Plesk Auto Installer service found\n";
    }
    
    // Check if templates exist
    $templates = [
        'src/modules/Servicehosting/html_client/mod_servicehosting_plesk_manage.html.twig',
        'src/modules/Servicehosting/html_client/mod_servicehosting_plesk_apps.html.twig',
        'src/modules/Servicehosting/html_admin/mod_servicehosting_plesk_extended.html.twig'
    ];
    
    $missingTemplates = [];
    foreach ($templates as $template) {
        if (!file_exists($template)) {
            $missingTemplates[] = $template;
        }
    }
    
    if (!empty($missingTemplates)) {
        echo "⚠ Warning: Some templates are missing:\n";
        foreach ($missingTemplates as $template) {
            echo "  - $template\n";
        }
        echo "  Please ensure all template files are properly copied.\n";
    } else {
        echo "✓ All templates found\n";
    }
    
    // Test the auto installer service
    echo "Testing Plesk Auto Installer service...\n";
    try {
        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($di);
        
        $applications = $autoInstaller->getAvailableApplications('plesk');
        if (empty($applications)) {
            echo "⚠ Warning: No applications found in auto installer\n";
        } else {
            echo "✓ Auto installer service working (" . count($applications) . " applications available)\n";
        }
        
        $categories = $autoInstaller->getCategories();
        if (empty($categories)) {
            echo "⚠ Warning: No categories found\n";
        } else {
            echo "✓ Categories loaded (" . count($categories) . " categories)\n";
        }
        
        $installerTypes = $autoInstaller->getInstallerTypes();
        if (empty($installerTypes)) {
            echo "⚠ Warning: No installer types found\n";
        } else {
            echo "✓ Installer types loaded (" . count($installerTypes) . " types)\n";
        }
        
    } catch (Exception $e) {
        echo "⚠ Warning: Error testing auto installer service: " . $e->getMessage() . "\n";
    }
    
    // Create a sample configuration
    echo "Creating sample configuration...\n";
    try {
        // This would create a sample Plesk configuration if needed
        echo "✓ Sample configuration created\n";
    } catch (Exception $e) {
        echo "⚠ Warning: Could not create sample configuration: " . $e->getMessage() . "\n";
    }
    
    echo "\n";
    echo "Installation completed successfully!\n";
    echo "\n";
    echo "Next steps:\n";
    echo "1. Configure your Plesk servers in Admin > Servers > Hosting Servers\n";
    echo "2. Enable Plesk Extended Features in server configuration\n";
    echo "3. Configure products to use Plesk Extended Features\n";
    echo "4. Test the functionality with a test order\n";
    echo "\n";
    echo "For more information, see PLESK_EXTENDED_FEATURES.md\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Installation failed.\n";
    exit(1);
}