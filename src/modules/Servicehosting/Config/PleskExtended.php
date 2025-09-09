<?php

declare(strict_types=1);
/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Servicehosting\Config;

class PleskExtended
{
    /**
     * Default configuration for Plesk Extended Features
     */
    public static function getDefaultConfig(): array
    {
        return [
            'power_user_view' => false,
            'client_sync' => true,
            'default_php_version' => '8.1',
            'metric_billing' => false,
            'auto_installer_enabled' => true,
            'auto_installer_type' => 'plesk',
            'custom_panel_url' => null,
            'custom_webmail_url' => null,
            'client_area_features' => [
                'addon_domains' => true,
                'subdomains' => true,
                'databases' => true,
                'email_addresses' => true,
                'ftp_accounts' => true,
                'ssl_certificates' => true,
                'php_settings' => true,
                'applications' => true,
                'backups' => true,
            ],
            'supported_php_versions' => [
                '7.4' => 'PHP 7.4',
                '8.0' => 'PHP 8.0',
                '8.1' => 'PHP 8.1',
                '8.2' => 'PHP 8.2',
                '8.3' => 'PHP 8.3',
            ],
            'supported_installer_types' => [
                'plesk' => 'Plesk Default Installer',
                'installatron' => 'Installatron',
                'softaculous' => 'Softaculous',
            ],
            'application_categories' => [
                'CMS' => 'Content Management Systems',
                'Forum' => 'Forum Software',
                'E-commerce' => 'E-commerce Platforms',
                'Blog' => 'Blog Software',
                'Wiki' => 'Wiki Software',
                'Gallery' => 'Photo Gallery Software',
                'Social' => 'Social Networking Software',
                'Other' => 'Other Applications',
            ],
            'default_applications' => [
                'wordpress' => [
                    'name' => 'WordPress',
                    'category' => 'CMS',
                    'enabled' => true,
                    'auto_install' => false,
                ],
                'joomla' => [
                    'name' => 'Joomla',
                    'category' => 'CMS',
                    'enabled' => true,
                    'auto_install' => false,
                ],
                'drupal' => [
                    'name' => 'Drupal',
                    'category' => 'CMS',
                    'enabled' => true,
                    'auto_install' => false,
                ],
                'phpbb' => [
                    'name' => 'phpBB',
                    'category' => 'Forum',
                    'enabled' => true,
                    'auto_install' => false,
                ],
                'prestashop' => [
                    'name' => 'PrestaShop',
                    'category' => 'E-commerce',
                    'enabled' => true,
                    'auto_install' => false,
                ],
            ],
            'api_endpoints' => [
                'admin' => [
                    'get_plesk_urls',
                    'get_addon_domains',
                    'add_addon_domain',
                    'get_databases',
                    'create_database',
                    'get_email_addresses',
                    'create_email_address',
                    'get_ftp_accounts',
                    'create_ftp_account',
                    'get_ssl_certificates',
                    'get_subdomains',
                    'create_subdomain',
                    'get_php_settings',
                    'update_php_settings',
                    'get_installed_applications',
                    'install_application',
                    'get_all_plesk_products',
                    'get_all_plesk_servers',
                    'get_all_plesk_customers',
                    'get_server_statistics',
                    'get_available_applications',
                    'get_application_categories',
                    'get_installer_types',
                    'install_application',
                    'get_installed_applications',
                    'create_application_backup',
                    'get_application_backups',
                    'restore_application_backup',
                    'delete_application',
                ],
                'client' => [
                    'get_plesk_urls',
                    'get_addon_domains',
                    'add_addon_domain',
                    'get_databases',
                    'create_database',
                    'get_email_addresses',
                    'create_email_address',
                    'get_ftp_accounts',
                    'create_ftp_account',
                    'get_ssl_certificates',
                    'get_subdomains',
                    'create_subdomain',
                    'get_php_settings',
                    'update_php_settings',
                    'get_installed_applications',
                    'install_application',
                    'get_available_applications',
                    'get_application_categories',
                    'get_installer_types',
                    'install_application_auto',
                    'get_installed_applications_auto',
                    'create_application_backup',
                    'get_application_backups',
                    'restore_application_backup',
                    'delete_application',
                ],
            ],
            'templates' => [
                'client' => [
                    'mod_servicehosting_plesk_manage.html.twig',
                    'mod_servicehosting_plesk_apps.html.twig',
                ],
                'admin' => [
                    'mod_servicehosting_plesk_extended.html.twig',
                ],
            ],
            'database_tables' => [
                'service_hosting_app_installation',
                'service_hosting_app_backup',
                'service_hosting_plesk_config',
                'service_hosting_plesk_product_config',
            ],
            'required_permissions' => [
                'admin' => [
                    'servicehosting' => 'full',
                ],
                'client' => [
                    'servicehosting' => 'manage',
                ],
            ],
        ];
    }

    /**
     * Get configuration for a specific server
     */
    public static function getServerConfig(int $serverId): array
    {
        // This would load configuration from database
        // For now, return default config
        return self::getDefaultConfig();
    }

    /**
     * Get configuration for a specific product
     */
    public static function getProductConfig(int $productId): array
    {
        // This would load configuration from database
        // For now, return default config
        return self::getDefaultConfig();
    }

    /**
     * Validate configuration
     */
    public static function validateConfig(array $config): array
    {
        $errors = [];

        // Validate PHP version
        if (isset($config['default_php_version'])) {
            $supportedVersions = self::getDefaultConfig()['supported_php_versions'];
            if (!array_key_exists($config['default_php_version'], $supportedVersions)) {
                $errors[] = 'Invalid PHP version: ' . $config['default_php_version'];
            }
        }

        // Validate installer type
        if (isset($config['auto_installer_type'])) {
            $supportedTypes = self::getDefaultConfig()['supported_installer_types'];
            if (!array_key_exists($config['auto_installer_type'], $supportedTypes)) {
                $errors[] = 'Invalid installer type: ' . $config['auto_installer_type'];
            }
        }

        // Validate client area features
        if (isset($config['client_area_features'])) {
            $defaultFeatures = self::getDefaultConfig()['client_area_features'];
            foreach ($config['client_area_features'] as $feature => $enabled) {
                if (!array_key_exists($feature, $defaultFeatures)) {
                    $errors[] = 'Invalid client area feature: ' . $feature;
                }
                if (!is_bool($enabled)) {
                    $errors[] = 'Client area feature ' . $feature . ' must be boolean';
                }
            }
        }

        return $errors;
    }

    /**
     * Get available features for client area
     */
    public static function getClientAreaFeatures(): array
    {
        return [
            'addon_domains' => [
                'name' => 'Addon Domains',
                'description' => 'Manage additional domains for your hosting account',
                'icon' => 'fas fa-globe',
            ],
            'subdomains' => [
                'name' => 'Subdomains',
                'description' => 'Create and manage subdomains',
                'icon' => 'fas fa-sitemap',
            ],
            'databases' => [
                'name' => 'Databases',
                'description' => 'Manage MySQL and PostgreSQL databases',
                'icon' => 'fas fa-database',
            ],
            'email_addresses' => [
                'name' => 'Email Addresses',
                'description' => 'Create and manage email accounts',
                'icon' => 'fas fa-envelope',
            ],
            'ftp_accounts' => [
                'name' => 'FTP Accounts',
                'description' => 'Manage FTP access accounts',
                'icon' => 'fas fa-upload',
            ],
            'ssl_certificates' => [
                'name' => 'SSL Certificates',
                'description' => 'View and manage SSL certificates',
                'icon' => 'fas fa-lock',
            ],
            'php_settings' => [
                'name' => 'PHP Settings',
                'description' => 'Configure PHP settings for your account',
                'icon' => 'fab fa-php',
            ],
            'applications' => [
                'name' => 'Applications',
                'description' => 'Install and manage web applications',
                'icon' => 'fas fa-cube',
            ],
            'backups' => [
                'name' => 'Backups',
                'description' => 'Manage account backups',
                'icon' => 'fas fa-download',
            ],
        ];
    }

    /**
     * Get system requirements
     */
    public static function getSystemRequirements(): array
    {
        return [
            'php_version' => '8.1.0',
            'plesk_version' => '18.0.0',
            'required_extensions' => [
                'curl',
                'json',
                'xml',
                'openssl',
            ],
            'required_permissions' => [
                'src/modules/Servicehosting/html_client/',
                'src/modules/Servicehosting/html_admin/',
                'src/library/Model/',
            ],
            'database_requirements' => [
                'mysql_version' => '5.7.0',
                'required_tables' => [
                    'service_hosting_app_installation',
                    'service_hosting_app_backup',
                    'service_hosting_plesk_config',
                    'service_hosting_plesk_product_config',
                ],
            ],
        ];
    }

    /**
     * Check if system meets requirements
     */
    public static function checkSystemRequirements(): array
    {
        $requirements = self::getSystemRequirements();
        $results = [
            'php_version' => version_compare(PHP_VERSION, $requirements['php_version'], '>='),
            'extensions' => [],
            'permissions' => [],
            'database' => true, // This would check database requirements
        ];

        // Check PHP extensions
        foreach ($requirements['required_extensions'] as $extension) {
            $results['extensions'][$extension] = extension_loaded($extension);
        }

        // Check file permissions
        foreach ($requirements['required_permissions'] as $path) {
            $results['permissions'][$path] = is_writable($path);
        }

        return $results;
    }
}