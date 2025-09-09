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
 * Plesk Extended Client API.
 */
class Client extends \Api_Abstract
{
    /**
     * Get Plesk URLs for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_plesk_urls($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getPleskUrls($s);
    }

    /**
     * Get addon domains for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_addon_domains($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getAddonDomains($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->addAddonDomain($s, $data['domain']);
    }

    /**
     * Get databases for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_databases($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getDatabases($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $type = $data['type'] ?? 'mysql';
        return $service->createDatabase($s, $data['name'], $type);
    }

    /**
     * Get email addresses for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_email_addresses($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getEmailAddresses($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->createEmailAddress($s, $data['email'], $data['password']);
    }

    /**
     * Get FTP accounts for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_ftp_accounts($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getFtpAccounts($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $home = $data['home'] ?? '/';
        return $service->createFtpAccount($s, $data['username'], $data['password'], $home);
    }

    /**
     * Get SSL certificates for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_ssl_certificates($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getSslCertificates($s);
    }

    /**
     * Get subdomains for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_subdomains($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getSubdomains($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->createSubdomain($s, $data['name']);
    }

    /**
     * Get PHP settings for a hosting service
     *
     * @param array $data
     * @return array
     */
    public function get_php_settings($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->getPhpSettings($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        return $service->updatePhpSettings($s, $data['settings']);
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
    public function install_application_auto($data)
    {
        $required = ['order_id', 'app_name'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        $options = $data['options'] ?? [];
        $installerType = $data['installer_type'] ?? 'plesk';

        return $autoInstaller->installApplication($s, $data['app_name'], $options, $installerType);
    }

    /**
     * Get installed applications
     *
     * @param array $data
     * @return array
     */
    public function get_installed_applications_auto($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getInstalledApplications($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->createApplicationBackup($s, $data['app_id']);
    }

    /**
     * Get application backups
     *
     * @param array $data
     * @return array
     */
    public function get_application_backups($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getApplicationBackups($s);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->restoreApplicationBackup($s, $data['backup_id']);
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

        [$order, $s] = $this->_getService($data);
        $service = $this->di['mod_service']('pleskextended');

        if (!$service->isPleskService($s)) {
            throw new \FOSSBilling\Exception('Service is not a Plesk service');
        }

        $autoInstaller = new \Box\Mod\Pleskextended\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->deleteApplication($s, $data['app_id']);
    }

    /**
     * Get service for client
     *
     * @param array $data
     * @return array
     * @throws \FOSSBilling\Exception
     */
    private function _getService($data)
    {
        if (!isset($data['order_id'])) {
            throw new \FOSSBilling\Exception('Order ID is required');
        }

        $order = $this->di['db']->getExistingModelById('ClientOrder', $data['order_id'], 'Order not found');
        $orderService = $this->di['mod_service']('order');
        $s = $orderService->getOrderService($order);

        if (!$s instanceof \Model_ServiceHosting) {
            throw new \FOSSBilling\Exception('Order is not a hosting service');
        }

        return [$order, $s];
    }
}