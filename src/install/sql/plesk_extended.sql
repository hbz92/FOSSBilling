-- Plesk Extended Module Database Schema
-- This file contains the database schema for the Plesk Extended module

-- Table for storing application installations
CREATE TABLE IF NOT EXISTS `service_hosting_app_installation` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `service_hosting_id` int(11) NOT NULL,
    `app_name` varchar(255) NOT NULL,
    `installer_type` enum('plesk','installatron','softaculous') NOT NULL DEFAULT 'plesk',
    `status` enum('installing','installed','failed','updating','deleting') NOT NULL DEFAULT 'installing',
    `options` text,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `service_hosting_id` (`service_hosting_id`),
    KEY `app_name` (`app_name`),
    KEY `installer_type` (`installer_type`),
    KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table for storing application backups
CREATE TABLE IF NOT EXISTS `service_hosting_app_backup` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `app_installation_id` int(11) NOT NULL,
    `backup_name` varchar(255) NOT NULL,
    `backup_path` varchar(500),
    `backup_size` bigint(20) DEFAULT 0,
    `status` enum('creating','completed','failed','restoring','deleting') NOT NULL DEFAULT 'creating',
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `app_installation_id` (`app_installation_id`),
    KEY `status` (`status`),
    FOREIGN KEY (`app_installation_id`) REFERENCES `service_hosting_app_installation` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table for storing Plesk configurations
CREATE TABLE IF NOT EXISTS `service_hosting_plesk_config` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `config_type` enum('global','server','product') NOT NULL DEFAULT 'global',
    `reference_id` int(11) DEFAULT NULL,
    `config_key` varchar(255) NOT NULL,
    `config_value` text,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `config_type` (`config_type`),
    KEY `reference_id` (`reference_id`),
    KEY `config_key` (`config_key`),
    UNIQUE KEY `unique_config` (`config_type`, `reference_id`, `config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table for storing Plesk product configurations
CREATE TABLE IF NOT EXISTS `service_hosting_plesk_product_config` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `product_id` int(11) NOT NULL,
    `server_id` int(11) NOT NULL,
    `service_plan_name` varchar(255),
    `reseller_plan_name` varchar(255),
    `ip_address_type` enum('shared','exclusive') DEFAULT 'shared',
    `power_user_view` tinyint(1) DEFAULT 0,
    `client_sync` tinyint(1) DEFAULT 1,
    `default_php_version` varchar(10) DEFAULT '8.1',
    `metric_billing` tinyint(1) DEFAULT 0,
    `auto_installer_enabled` tinyint(1) DEFAULT 1,
    `auto_installer_type` enum('plesk','installatron','softaculous') DEFAULT 'plesk',
    `client_area_features` text,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `product_id` (`product_id`),
    KEY `server_id` (`server_id`),
    UNIQUE KEY `unique_product_server` (`product_id`, `server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default global configurations
INSERT INTO `service_hosting_plesk_config` (`config_type`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
('global', 'default_php_version', '8.1', NOW(), NOW()),
('global', 'power_user_view_default', '0', NOW(), NOW()),
('global', 'client_sync_default', '1', NOW(), NOW()),
('global', 'metric_billing_default', '0', NOW(), NOW()),
('global', 'auto_installer_enabled_default', '1', NOW(), NOW()),
('global', 'auto_installer_type_default', 'plesk', NOW(), NOW());

-- Add indexes for better performance
CREATE INDEX idx_service_hosting_app_installation_service_hosting_id ON service_hosting_app_installation(service_hosting_id);
CREATE INDEX idx_service_hosting_app_installation_status ON service_hosting_app_installation(status);
CREATE INDEX idx_service_hosting_app_backup_app_installation_id ON service_hosting_app_backup(app_installation_id);
CREATE INDEX idx_service_hosting_app_backup_status ON service_hosting_app_backup(status);
CREATE INDEX idx_service_hosting_plesk_config_type_reference ON service_hosting_plesk_config(config_type, reference_id);
CREATE INDEX idx_service_hosting_plesk_product_config_product_server ON service_hosting_plesk_product_config(product_id, server_id);