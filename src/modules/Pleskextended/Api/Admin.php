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

namespace Box\Mod\Pleskextended\Api;

/**
 * Plesk Extended Admin API.
 */
class Admin extends \Api_Abstract
{
    /**
     * Get Plesk URLs for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_plesk_urls($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getPleskUrls($hostingService);
    }

    /**
     * Get addon domains for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_addon_domains($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getAddonDomains($hostingService);
    }

    /**
     * Add addon domain
     *
     * @param array $data
     * @return bool
     */
    public function add_addon_domain($data)
    {
        $required = ['order_id', 'domain'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->addAddonDomain($hostingService, $data['domain']);
    }

    /**
     * Get databases for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_databases($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getDatabases($hostingService);
    }

    /**
     * Create database
     *
     * @param array $data
     * @return bool
     */
    public function create_database($data)
    {
        $required = ['order_id', 'name'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $type = $data['type'] ?? 'mysql';
        return $service->createDatabase($hostingService, $data['name'], $type);
    }

    /**
     * Get email addresses for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_email_addresses($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getEmailAddresses($hostingService);
    }

    /**
     * Create email address
     *
     * @param array $data
     * @return bool
     */
    public function create_email_address($data)
    {
        $required = ['order_id', 'email', 'password'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->createEmailAddress($hostingService, $data['email'], $data['password']);
    }

    /**
     * Get FTP accounts for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_ftp_accounts($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getFtpAccounts($hostingService);
    }

    /**
     * Create FTP account
     *
     * @param array $data
     * @return bool
     */
    public function create_ftp_account($data)
    {
        $required = ['order_id', 'username', 'password'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $home = $data['home'] ?? '/';
        return $service->createFtpAccount($hostingService, $data['username'], $data['password'], $home);
    }

    /**
     * Get SSL certificates for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_ssl_certificates($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getSslCertificates($hostingService);
    }

    /**
     * Get subdomains for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_subdomains($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getSubdomains($hostingService);
    }

    /**
     * Create subdomain
     *
     * @param array $data
     * @return bool
     */
    public function create_subdomain($data)
    {
        $required = ['order_id', 'name'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->createSubdomain($hostingService, $data['name']);
    }

    /**
     * Get PHP settings for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_php_settings($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getPhpSettings($hostingService);
    }

    /**
     * Update PHP settings for a hosting service
     *
     * @param array $data
     * @return bool
     */
    public function update_php_settings($data)
    {
        $required = ['order_id', 'settings'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->updatePhpSettings($hostingService, $data['settings']);
    }

    /**
     * Get all Plesk products for a server
     *
     * @param array $data
     * @return array
     */
    public function get_all_plesk_products($data)
    {
        $required = ['server_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $data['server_id'], 'Server not found');

        return $service->getAllPleskProducts($server);
    }

    /**
     * Get all Plesk servers
     *
     * @param array $data
     * @return array
     */
    public function get_all_plesk_servers($data)
    {
        $required = ['server_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $data['server_id'], 'Server not found');

        return $service->getAllPleskServers($server);
    }

    /**
     * Get all Plesk customers
     *
     * @param array $data
     * @return array
     */
    public function get_all_plesk_customers($data)
    {
        $required = ['server_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $data['server_id'], 'Server not found');

        return $service->getAllPleskCustomers($server);
    }

    /**
     * Get server statistics
     *
     * @param array $data
     * @return array
     */
    public function get_server_statistics($data)
    {
        $required = ['server_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $data['server_id'], 'Server not found');

        return $service->getServerStatistics($server);
    }

    // Application Auto Installer API endpoints

    /**
     * Get available applications
     *
     * @param array $data
     * @return array
     */
    public function get_available_applications($data)
    {
        $installerType = $data['installer_type'] ?? 'plesk';
        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getAvailableApplications($installerType);
    }

    /**
     * Get application categories
     *
     * @param array $data
     * @return array
     */
    public function get_application_categories($data)
    {
        $installerType = $data['installer_type'] ?? 'plesk';
        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getApplicationCategories($installerType);
    }

    /**
     * Get installer types
     *
     * @return array
     */
    public function get_installer_types()
    {
        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getInstallerTypes();
    }

    /**
     * Install application
     *
     * @param array $data
     * @return bool
     */
    public function install_application($data)
    {
        $required = ['order_id', 'app_name'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        $options = $data['options'] ?? [];
        $installerType = $data['installer_type'] ?? 'plesk';

        return $autoInstaller->installApplication($hostingService, $data['app_name'], $options, $installerType);
    }

    /**
     * Get installed applications
     *
     * @param array $data
     * @return array
     */
    public function get_installed_applications($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getInstalledApplications($hostingService);
    }

    /**
     * Create application backup
     *
     * @param array $data
     * @return bool
     */
    public function create_application_backup($data)
    {
        $required = ['order_id', 'app_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->createApplicationBackup($hostingService, $data['app_id']);
    }

    /**
     * Get application backups
     *
     * @param array $data
     * @return array
     */
    public function get_application_backups($data)
    {
        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getApplicationBackups($hostingService);
    }

    /**
     * Restore application backup
     *
     * @param array $data
     * @return bool
     */
    public function restore_application_backup($data)
    {
        $required = ['order_id', 'backup_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->restoreApplicationBackup($hostingService, $data['backup_id']);
    }

    /**
     * Delete application
     *
     * @param array $data
     * @return bool
     */
    public function delete_application($data)
    {
        $required = ['order_id', 'app_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $service = $this->di['mod_service']('pleskextended');
        $hostingService = $service->getHostingServiceByOrderId($data['order_id']);

        if (!$service->isPleskService($hostingService)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->deleteApplication($hostingService, $data['app_id']);
    }
}