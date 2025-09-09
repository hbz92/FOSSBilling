<?php

declare(strict_types=1);
/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

/**
 * Installation script for Plesk Extended Module
 * 
 * This script installs the Plesk Extended module for FOSSBilling.
 * It creates the necessary database tables and initializes the module.
 */

// Check if running from command line
if (php_sapi_name() !== 'cli') {
    die('This script must be run from the command line.');
}

// Check PHP version
if (version_compare(PHP_VERSION, '8.1.0', '<')) {
    die('PHP 8.1.0 or higher is required. Current version: ' . PHP_VERSION . PHP_EOL);
}

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define paths
$rootPath = dirname(__FILE__);
$sqlFile = $rootPath . '/src/install/sql/plesk_extended.sql';
$configFile = $rootPath . '/src/bb-config.php';

// Check if FOSSBilling is installed
if (!file_exists($configFile)) {
    die('FOSSBilling configuration file not found. Please run this script from the FOSSBilling root directory.' . PHP_EOL);
}

// Load FOSSBilling configuration
$config = require $configFile;

// Check if SQL file exists
if (!file_exists($sqlFile)) {
    die('SQL file not found: ' . $sqlFile . PHP_EOL);
}

// Database connection
try {
    $dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['name'] . ';charset=utf8mb4';
    $pdo = new PDO($dsn, $config['database']['user'], $config['database']['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    
    echo "✓ Connected to database successfully" . PHP_EOL;
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage() . PHP_EOL);
}

// Read and execute SQL file
try {
    $sql = file_get_contents($sqlFile);
    
    // Split SQL into individual statements
    $statements = array_filter(array_map('trim', explode(';', $sql)));
    
    $pdo->beginTransaction();
    
    foreach ($statements as $statement) {
        if (!empty($statement)) {
            $pdo->exec($statement);
        }
    }
    
    $pdo->commit();
    
    echo "✓ Database tables created successfully" . PHP_EOL;
} catch (PDOException $e) {
    $pdo->rollBack();
    die('Database setup failed: ' . $e->getMessage() . PHP_EOL);
}

// Check if module directory exists
$modulePath = $rootPath . '/src/modules/Pleskextended';
if (!is_dir($modulePath)) {
    die('Module directory not found: ' . $modulePath . PHP_EOL);
}

// Check if module files exist
$requiredFiles = [
    'manifest.json',
    'Service.php',
    'Api/Admin.php',
    'Api/Client.php',
    'Server/Manager/PleskExtended.php',
    'ServicePleskAutoInstaller.php',
];

foreach ($requiredFiles as $file) {
    $filePath = $modulePath . '/' . $file;
    if (!file_exists($filePath)) {
        die('Required file not found: ' . $filePath . PHP_EOL);
    }
}

echo "✓ Module files verified" . PHP_EOL;

// Check if model files exist
$modelPath = $rootPath . '/src/library/Model';
$requiredModels = [
    'ServiceHostingAppInstallation.php',
    'ServiceHostingAppBackup.php',
    'ServiceHostingPleskConfig.php',
    'ServiceHostingPleskProductConfig.php',
];

foreach ($requiredModels as $model) {
    $modelPath = $rootPath . '/src/library/Model/' . $model;
    if (!file_exists($modelPath)) {
        die('Required model file not found: ' . $modelPath . PHP_EOL);
    }
}

echo "✓ Model files verified" . PHP_EOL;

// Check if templates exist
$templatePath = $modulePath . '/html_client';
if (!is_dir($templatePath)) {
    die('Client template directory not found: ' . $templatePath . PHP_EOL);
}

$adminTemplatePath = $modulePath . '/html_admin';
if (!is_dir($adminTemplatePath)) {
    die('Admin template directory not found: ' . $adminTemplatePath . PHP_EOL);
}

echo "✓ Template files verified" . PHP_EOL;

// Create module configuration
try {
    $configData = [
        'enabled' => true,
        'version' => '1.0.0',
        'installed_at' => date('Y-m-d H:i:s'),
        'settings' => [
            'default_php_version' => '8.1',
            'power_user_view_default' => false,
            'client_sync_default' => true,
            'metric_billing_default' => false,
            'auto_installer_enabled_default' => true,
            'auto_installer_type_default' => 'plesk',
        ]
    ];
    
    $configJson = json_encode($configData, JSON_PRETTY_PRINT);
    $configFile = $modulePath . '/config.json';
    
    if (file_put_contents($configFile, $configJson) === false) {
        throw new Exception('Failed to write configuration file');
    }
    
    echo "✓ Module configuration created" . PHP_EOL;
} catch (Exception $e) {
    die('Failed to create module configuration: ' . $e->getMessage() . PHP_EOL);
}

// Set proper permissions
try {
    $directories = [
        $modulePath,
        $modulePath . '/html_client',
        $modulePath . '/html_admin',
        $rootPath . '/src/library/Model',
    ];
    
    foreach ($directories as $dir) {
        if (is_dir($dir)) {
            chmod($dir, 0755);
        }
    }
    
    $files = [
        $modulePath . '/Service.php',
        $modulePath . '/Api/Admin.php',
        $modulePath . '/Api/Client.php',
        $modulePath . '/Server/Manager/PleskExtended.php',
        $modulePath . '/ServicePleskAutoInstaller.php',
    ];
    
    foreach ($files as $file) {
        if (file_exists($file)) {
            chmod($file, 0644);
        }
    }
    
    echo "✓ File permissions set" . PHP_EOL;
} catch (Exception $e) {
    echo "⚠ Warning: Failed to set file permissions: " . $e->getMessage() . PHP_EOL;
}

// Create log directory
$logDir = $rootPath . '/var/log/plesk_extended';
if (!is_dir($logDir)) {
    if (!mkdir($logDir, 0755, true)) {
        echo "⚠ Warning: Failed to create log directory: " . $logDir . PHP_EOL;
    } else {
        echo "✓ Log directory created" . PHP_EOL;
    }
}

// Verify installation
try {
    // Check if tables exist
    $tables = [
        'service_hosting_app_installation',
        'service_hosting_app_backup',
        'service_hosting_plesk_config',
        'service_hosting_plesk_product_config',
    ];
    
    foreach ($tables as $table) {
        $stmt = $pdo->prepare("SHOW TABLES LIKE ?");
        $stmt->execute([$table]);
        
        if (!$stmt->fetch()) {
            throw new Exception("Table $table was not created");
        }
    }
    
    echo "✓ Database tables verified" . PHP_EOL;
} catch (Exception $e) {
    die('Installation verification failed: ' . $e->getMessage() . PHP_EOL);
}

// Display success message
echo PHP_EOL;
echo "🎉 Plesk Extended Module installed successfully!" . PHP_EOL;
echo PHP_EOL;
echo "Next steps:" . PHP_EOL;
echo "1. Activate the module in FOSSBilling admin panel" . PHP_EOL;
echo "2. Configure your Plesk servers with extended options" . PHP_EOL;
echo "3. Set up product configurations for Plesk Extended features" . PHP_EOL;
echo "4. Test the module functionality" . PHP_EOL;
echo PHP_EOL;
echo "For more information, see: PLESK_EXTENDED_MODULE.md" . PHP_EOL;
echo PHP_EOL;

// Display system information
echo "System Information:" . PHP_EOL;
echo "- PHP Version: " . PHP_VERSION . PHP_EOL;
echo "- FOSSBilling Path: " . $rootPath . PHP_EOL;
echo "- Module Path: " . $modulePath . PHP_EOL;
echo "- Database: " . $config['database']['name'] . '@' . $config['database']['host'] . PHP_EOL;
echo "- Installation Date: " . date('Y-m-d H:i:s') . PHP_EOL;
echo PHP_EOL;