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

namespace Box\Mod\Pleskextended;

/**
 * Plesk Extended Module Configuration
 */
class Config
{
    /**
     * Default configuration values
     */
    public const DEFAULT_CONFIG = [
        'default_php_version' => '8.1',
        'power_user_view_default' => false,
        'client_sync_default' => true,
        'metric_billing_default' => false,
        'auto_installer_enabled_default' => true,
        'auto_installer_type_default' => 'plesk',
        'custom_panel_url' => null,
        'custom_webmail_url' => null,
    ];

    /**
     * Supported PHP versions
     */
    public const SUPPORTED_PHP_VERSIONS = [
        '8.1' => 'PHP 8.1',
        '8.2' => 'PHP 8.2',
        '8.3' => 'PHP 8.3',
    ];

    /**
     * Supported installer types
     */
    public const SUPPORTED_INSTALLER_TYPES = [
        'plesk' => 'Plesk Default App Installer',
        'installatron' => 'Installatron',
        'softaculous' => 'Softaculous',
    ];

    /**
     * Supported application categories
     */
    public const APPLICATION_CATEGORIES = [
        'CMS' => 'Content Management Systems',
        'E-commerce' => 'E-commerce Platforms',
        'Forum' => 'Forum Software',
        'Blog' => 'Blogging Platforms',
        'Wiki' => 'Wiki Software',
        'Gallery' => 'Photo Galleries',
        'Social' => 'Social Networking',
        'Other' => 'Other Applications',
    ];

    /**
     * Default applications
     */
    public const DEFAULT_APPLICATIONS = [
        'wordpress' => [
            'name' => 'WordPress',
            'category' => 'CMS',
            'description' => 'The most popular content management system',
            'version' => '6.4',
            'icon' => 'wordpress.png',
        ],
        'joomla' => [
            'name' => 'Joomla',
            'category' => 'CMS',
            'description' => 'Open source content management system',
            'version' => '5.0',
            'icon' => 'joomla.png',
        ],
        'drupal' => [
            'name' => 'Drupal',
            'category' => 'CMS',
            'description' => 'Flexible content management platform',
            'version' => '10.1',
            'icon' => 'drupal.png',
        ],
        'phpbb' => [
            'name' => 'phpBB',
            'category' => 'Forum',
            'description' => 'Open source forum software',
            'version' => '3.3',
            'icon' => 'phpbb.png',
        ],
        'prestashop' => [
            'name' => 'PrestaShop',
            'category' => 'E-commerce',
            'description' => 'Open source e-commerce platform',
            'version' => '8.1',
            'icon' => 'prestashop.png',
        ],
    ];

    /**
     * Plesk API endpoints
     */
    public const PLESK_API_ENDPOINTS = [
        'webspace' => '/api/v2/webspace',
        'database' => '/api/v2/database',
        'mail' => '/api/v2/mail',
        'ftp' => '/api/v2/ftp',
        'subdomain' => '/api/v2/subdomain',
        'certificate' => '/api/v2/certificate',
        'customer' => '/api/v2/customer',
        'reseller' => '/api/v2/reseller',
        'server' => '/api/v2/server',
        'product' => '/api/v2/product',
    ];

    /**
     * Installation statuses
     */
    public const INSTALLATION_STATUSES = [
        'installing' => 'Installing',
        'installed' => 'Installed',
        'failed' => 'Failed',
        'updating' => 'Updating',
        'deleting' => 'Deleting',
    ];

    /**
     * Backup statuses
     */
    public const BACKUP_STATUSES = [
        'creating' => 'Creating',
        'completed' => 'Completed',
        'failed' => 'Failed',
        'restoring' => 'Restoring',
        'deleting' => 'Deleting',
    ];

    /**
     * Configuration types
     */
    public const CONFIG_TYPES = [
        'global' => 'Global',
        'server' => 'Server',
        'product' => 'Product',
    ];

    /**
     * Feature flags
     */
    public const FEATURES = [
        'auto_installer' => 'Application Auto Installer',
        'remote_management' => 'Remote Management',
        'power_user_view' => 'Power User Panel View',
        'client_sync' => 'Client Details Synchronization',
        'metric_billing' => 'Metric Billing',
    ];

    /**
     * Get default configuration
     *
     * @return array
     */
    public static function getDefaultConfig(): array
    {
        return self::DEFAULT_CONFIG;
    }

    /**
     * Get supported PHP versions
     *
     * @return array
     */
    public static function getSupportedPhpVersions(): array
    {
        return self::SUPPORTED_PHP_VERSIONS;
    }

    /**
     * Get supported installer types
     *
     * @return array
     */
    public static function getSupportedInstallerTypes(): array
    {
        return self::SUPPORTED_INSTALLER_TYPES;
    }

    /**
     * Get application categories
     *
     * @return array
     */
    public static function getApplicationCategories(): array
    {
        return self::APPLICATION_CATEGORIES;
    }

    /**
     * Get default applications
     *
     * @return array
     */
    public static function getDefaultApplications(): array
    {
        return self::DEFAULT_APPLICATIONS;
    }

    /**
     * Get Plesk API endpoints
     *
     * @return array
     */
    public static function getPleskApiEndpoints(): array
    {
        return self::PLESK_API_ENDPOINTS;
    }

    /**
     * Get installation statuses
     *
     * @return array
     */
    public static function getInstallationStatuses(): array
    {
        return self::INSTALLATION_STATUSES;
    }

    /**
     * Get backup statuses
     *
     * @return array
     */
    public static function getBackupStatuses(): array
    {
        return self::BACKUP_STATUSES;
    }

    /**
     * Get configuration types
     *
     * @return array
     */
    public static function getConfigTypes(): array
    {
        return self::CONFIG_TYPES;
    }

    /**
     * Get features
     *
     * @return array
     */
    public static function getFeatures(): array
    {
        return self::FEATURES;
    }

    /**
     * Validate PHP version
     *
     * @param string $version
     * @return bool
     */
    public static function isValidPhpVersion(string $version): bool
    {
        return array_key_exists($version, self::SUPPORTED_PHP_VERSIONS);
    }

    /**
     * Validate installer type
     *
     * @param string $type
     * @return bool
     */
    public static function isValidInstallerType(string $type): bool
    {
        return array_key_exists($type, self::SUPPORTED_INSTALLER_TYPES);
    }

    /**
     * Validate application category
     *
     * @param string $category
     * @return bool
     */
    public static function isValidApplicationCategory(string $category): bool
    {
        return array_key_exists($category, self::APPLICATION_CATEGORIES);
    }

    /**
     * Validate installation status
     *
     * @param string $status
     * @return bool
     */
    public static function isValidInstallationStatus(string $status): bool
    {
        return array_key_exists($status, self::INSTALLATION_STATUSES);
    }

    /**
     * Validate backup status
     *
     * @param string $status
     * @return bool
     */
    public static function isValidBackupStatus(string $status): bool
    {
        return array_key_exists($status, self::BACKUP_STATUSES);
    }

    /**
     * Validate configuration type
     *
     * @param string $type
     * @return bool
     */
    public static function isValidConfigType(string $type): bool
    {
        return array_key_exists($type, self::CONFIG_TYPES);
    }

    /**
     * Get application by ID
     *
     * @param string $appId
     * @return array|null
     */
    public static function getApplicationById(string $appId): ?array
    {
        return self::DEFAULT_APPLICATIONS[$appId] ?? null;
    }

    /**
     * Get applications by category
     *
     * @param string $category
     * @return array
     */
    public static function getApplicationsByCategory(string $category): array
    {
        return array_filter(
            self::DEFAULT_APPLICATIONS,
            function ($app) use ($category) {
                return $app['category'] === $category;
            }
        );
    }

    /**
     * Get Plesk API endpoint
     *
     * @param string $endpoint
     * @return string|null
     */
    public static function getPleskApiEndpoint(string $endpoint): ?string
    {
        return self::PLESK_API_ENDPOINTS[$endpoint] ?? null;
    }
}