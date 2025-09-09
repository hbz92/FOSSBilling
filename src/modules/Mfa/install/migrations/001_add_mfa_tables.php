<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Mfa\Install\Migrations;

class Migration001AddMfaTables
{
    public function up(\Box_App $app): void
    {
        $db = $app->getDi()['db'];
        
        // Create mfa_settings table
        $db->exec("
            CREATE TABLE IF NOT EXISTS `mfa_settings` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `client_id` int(11) NOT NULL,
                `enabled` tinyint(1) DEFAULT 0,
                `secret` varchar(255) NOT NULL,
                `backup_codes` text,
                `remember_device` tinyint(1) DEFAULT 0,
                `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
                `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                UNIQUE KEY `client_id` (`client_id`),
                KEY `idx_enabled` (`enabled`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
        
        // Create mfa_logs table
        $db->exec("
            CREATE TABLE IF NOT EXISTS `mfa_logs` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `client_id` int(11) NOT NULL,
                `ip_address` varchar(45) NOT NULL,
                `user_agent` text,
                `success` tinyint(1) NOT NULL,
                `method` varchar(50) DEFAULT 'totp',
                `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                KEY `idx_client_id` (`client_id`),
                KEY `idx_created_at` (`created_at`),
                KEY `idx_success` (`success`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
        
        // Create mfa_sessions table
        $db->exec("
            CREATE TABLE IF NOT EXISTS `mfa_sessions` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `client_id` int(11) NOT NULL,
                `session_token` varchar(255) NOT NULL,
                `device_fingerprint` varchar(255) NOT NULL,
                `expires_at` datetime NOT NULL,
                `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                UNIQUE KEY `session_token` (`session_token`),
                KEY `idx_client_id` (`client_id`),
                KEY `idx_expires_at` (`expires_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
    }
    
    public function down(\Box_App $app): void
    {
        $db = $app->getDi()['db'];
        
        // Drop tables in reverse order
        $db->exec("DROP TABLE IF EXISTS `mfa_sessions`");
        $db->exec("DROP TABLE IF EXISTS `mfa_logs`");
        $db->exec("DROP TABLE IF EXISTS `mfa_settings`");
    }
}