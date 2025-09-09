-- Plesk Extended Features Database Schema

-- Table for application installations
CREATE TABLE IF NOT EXISTS `service_hosting_app_installation` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `service_hosting_id` int(11) NOT NULL,
    `app_name` varchar(255) NOT NULL,
    `installer_type` enum('plesk','installatron','softaculous') NOT NULL DEFAULT 'plesk',
    `options` text,
    `status` enum('installing','completed','failed','updating') NOT NULL DEFAULT 'installing',
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `service_hosting_id` (`service_hosting_id`),
    KEY `app_name` (`app_name`),
    KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table for application backups
CREATE TABLE IF NOT EXISTS `service_hosting_app_backup` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `installation_id` int(11) NOT NULL,
    `status` enum('creating','completed','failed','restoring') NOT NULL DEFAULT 'creating',
    `size` bigint(20) DEFAULT NULL,
    `file_path` varchar(500) DEFAULT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `installation_id` (`installation_id`),
    KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table for Plesk server configurations
CREATE TABLE IF NOT EXISTS `service_hosting_plesk_config` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `server_id` int(11) NOT NULL,
    `power_user_view` tinyint(1) NOT NULL DEFAULT 0,
    `client_sync` tinyint(1) NOT NULL DEFAULT 1,
    `default_php_version` varchar(10) NOT NULL DEFAULT '8.1',
    `metric_billing` tinyint(1) NOT NULL DEFAULT 0,
    `custom_panel_url` varchar(500) DEFAULT NULL,
    `custom_webmail_url` varchar(500) DEFAULT NULL,
    `auto_installer_enabled` tinyint(1) NOT NULL DEFAULT 1,
    `auto_installer_type` enum('plesk','installatron','softaculous') NOT NULL DEFAULT 'plesk',
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `server_id` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table for product-specific Plesk configurations
CREATE TABLE IF NOT EXISTS `service_hosting_plesk_product_config` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `product_id` int(11) NOT NULL,
    `auto_install_enabled` tinyint(1) NOT NULL DEFAULT 0,
    `auto_install_apps` text,
    `client_area_features` text,
    `php_version` varchar(10) DEFAULT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Add foreign key constraints
ALTER TABLE `service_hosting_app_installation`
    ADD CONSTRAINT `fk_app_installation_service_hosting` 
    FOREIGN KEY (`service_hosting_id`) 
    REFERENCES `service_hosting` (`id`) 
    ON DELETE CASCADE;

ALTER TABLE `service_hosting_app_backup`
    ADD CONSTRAINT `fk_app_backup_installation` 
    FOREIGN KEY (`installation_id`) 
    REFERENCES `service_hosting_app_installation` (`id`) 
    ON DELETE CASCADE;

ALTER TABLE `service_hosting_plesk_config`
    ADD CONSTRAINT `fk_plesk_config_server` 
    FOREIGN KEY (`server_id`) 
    REFERENCES `service_hosting_server` (`id`) 
    ON DELETE CASCADE;

ALTER TABLE `service_hosting_plesk_product_config`
    ADD CONSTRAINT `fk_plesk_product_config_product` 
    FOREIGN KEY (`product_id`) 
    REFERENCES `product` (`id`) 
    ON DELETE CASCADE;