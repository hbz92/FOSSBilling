<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Mfa\Install;

class Install
{
    public function install(\Box_App $app): void
    {
        // Install database tables
        $this->installDatabase();
        
        // Install configuration
        $this->installConfiguration();
        
        // Register hooks
        $this->registerHooks();
    }

    public function uninstall(\Box_App $app): void
    {
        // Unregister hooks
        $this->unregisterHooks();
        
        // Drop database tables (optional - you might want to keep data)
        // $this->dropDatabase();
    }

    private function installDatabase(): void
    {
        $db = $app->getDi()['db'];
        
        // Read and execute SQL file
        $sqlFile = __DIR__ . '/sql/mfa_tables.sql';
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $statements = explode(';', $sql);
            
            foreach ($statements as $statement) {
                $statement = trim($statement);
                if (!empty($statement)) {
                    $db->exec($statement);
                }
            }
        }
    }

    private function installConfiguration(): void
    {
        $configFile = __DIR__ . '/config.php';
        if (file_exists($configFile)) {
            $config = include $configFile;
            $app->getDi()['mod_config']('mfa', $config);
        }
    }

    private function registerHooks(): void
    {
        $hookService = $app->getDi()['mod_service']('hook');
        
        // Register MFA hooks
        $hookService->connect([
            'event' => 'onBeforeClientLogin',
            'mod' => 'mfa'
        ]);
        
        $hookService->connect([
            'event' => 'onAfterClientLogin', 
            'mod' => 'mfa'
        ]);
    }

    private function unregisterHooks(): void
    {
        $db = $app->getDi()['db'];
        
        // Remove MFA hooks
        $db->exec(
            "DELETE FROM extension_meta 
             WHERE extension = 'mod_hook' 
             AND rel_type = 'mod' 
             AND rel_id = 'mfa'"
        );
    }

    private function dropDatabase(): void
    {
        $db = $app->getDi()['db'];
        
        // Drop MFA tables
        $tables = ['mfa_sessions', 'mfa_logs', 'mfa_settings'];
        
        foreach ($tables as $table) {
            $db->exec("DROP TABLE IF EXISTS `{$table}`");
        }
    }
}