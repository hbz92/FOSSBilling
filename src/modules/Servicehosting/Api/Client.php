<?php

/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Servicehosting\Api;

/**
 * Hosting service management.
 */
class Client extends \Api_Abstract
{
    /**
     * Change hosting account username.
     *
     * @return bool
     */
    public function change_username($data)
    {
        [$order, $s] = $this->_getService($data);

        return $this->getService()->changeAccountUsername($order, $s, $data);
    }

    /**
     * Change hosting account domain.
     *
     * @return bool
     */
    public function change_domain($data)
    {
        [$order, $s] = $this->_getService($data);

        return $this->getService()->changeAccountDomain($order, $s, $data);
    }

    /**
     * Change hosting account password.
     *
     * @return bool
     */
    public function change_password($data)
    {
        [$order, $s] = $this->_getService($data);

        return $this->getService()->changeAccountPassword($order, $s, $data);
    }

    /**
     * Get hosting plans pairs. Usually for select box.
     *
     * @return array
     */
    public function hp_get_pairs($data)
    {
        return $this->getService()->getHpPairs();
    }

    /**
     * Returns the login URL for a given order ID.
     * If the associated server manager supports SSO, an SSO link will be given.
     * Will automatically return either a reseller URL or a standard URL depending on the order config.
     *
     * @param array $data An array containing the API request data. Should have a key named `order_id` containing the order's ID.
     */
    public function get_login_url(array $data): string
    {
        [$order, $s] = $this->_getService($data);

        return $this->getService()->generateLoginUrl($s);
    }

    /**
     * Get Plesk-specific URLs for an account
     *
     * @return array
     */
    public function get_plesk_urls($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getPleskUrls($s);
    }

    /**
     * Get addon domains for an account
     *
     * @return array
     */
    public function get_addon_domains($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getAddonDomains($s);
    }

    /**
     * Add addon domain
     *
     * @return bool
     */
    public function add_addon_domain($data)
    {
        $required = [
            'domain' => 'Domain name is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->addAddonDomain($s, $data['domain']);
    }

    /**
     * Get databases for an account
     *
     * @return array
     */
    public function get_databases($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getDatabases($s);
    }

    /**
     * Create database
     *
     * @return bool
     */
    public function create_database($data)
    {
        $required = [
            'name' => 'Database name is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        $type = $data['type'] ?? 'mysql';
        return $service->createDatabase($s, $data['name'], $type);
    }

    /**
     * Get email addresses for an account
     *
     * @return array
     */
    public function get_email_addresses($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getEmailAddresses($s);
    }

    /**
     * Create email address
     *
     * @return bool
     */
    public function create_email_address($data)
    {
        $required = [
            'email' => 'Email address is missing',
            'password' => 'Password is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->createEmailAddress($s, $data['email'], $data['password']);
    }

    /**
     * Get FTP accounts for an account
     *
     * @return array
     */
    public function get_ftp_accounts($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getFtpAccounts($s);
    }

    /**
     * Create FTP account
     *
     * @return bool
     */
    public function create_ftp_account($data)
    {
        $required = [
            'username' => 'Username is missing',
            'password' => 'Password is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        $home = $data['home'] ?? '/';
        return $service->createFtpAccount($s, $data['username'], $data['password'], $home);
    }

    /**
     * Get SSL certificates for an account
     *
     * @return array
     */
    public function get_ssl_certificates($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getSslCertificates($s);
    }

    /**
     * Get subdomains for an account
     *
     * @return array
     */
    public function get_subdomains($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getSubdomains($s);
    }

    /**
     * Create subdomain
     *
     * @return bool
     */
    public function create_subdomain($data)
    {
        $required = [
            'name' => 'Subdomain name is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->createSubdomain($s, $data['name']);
    }

    /**
     * Get PHP settings for an account
     *
     * @return array
     */
    public function get_php_settings($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getPhpSettings($s);
    }

    /**
     * Update PHP settings for an account
     *
     * @return bool
     */
    public function update_php_settings($data)
    {
        $required = [
            'settings' => 'PHP settings are missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->updatePhpSettings($s, $data['settings']);
    }

    /**
     * Get installed applications for an account
     *
     * @return array
     */
    public function get_installed_applications($data)
    {
        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        return $service->getInstalledApplications($s);
    }

    /**
     * Install application
     *
     * @return bool
     */
    public function install_application($data)
    {
        $required = [
            'app_name' => 'Application name is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $service = $this->getService();

        $options = $data['options'] ?? [];
        return $service->installApplication($s, $data['app_name'], $options);
    }

    /**
     * Get available applications for auto installer
     *
     * @return array
     */
    public function get_available_applications($data)
    {
        $installerType = $data['installer_type'] ?? 'plesk';
        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getAvailableApplications($installerType);
    }

    /**
     * Get application categories
     *
     * @return array
     */
    public function get_application_categories($data)
    {
        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getCategories();
    }

    /**
     * Get installer types
     *
     * @return array
     */
    public function get_installer_types($data)
    {
        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getInstallerTypes();
    }

    /**
     * Install application via auto installer
     *
     * @return bool
     */
    public function install_application_auto($data)
    {
        $required = [
            'app_name' => 'Application name is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        [$order, $s] = $this->_getService($data);
        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        $options = $data['options'] ?? [];
        $installerType = $data['installer_type'] ?? 'plesk';

        return $autoInstaller->installApplication($s, $data['app_name'], $options, $installerType);
    }

    /**
     * Get installed applications for account
     *
     * @return array
     */
    public function get_installed_applications_auto($data)
    {
        [$order, $s] = $this->_getService($data);
        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getInstalledApplications($s);
    }

    /**
     * Create backup for application
     *
     * @return bool
     */
    public function create_application_backup($data)
    {
        $required = [
            'installation_id' => 'Installation ID is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->createBackup($data['installation_id']);
    }

    /**
     * Get backups for application
     *
     * @return array
     */
    public function get_application_backups($data)
    {
        $required = [
            'installation_id' => 'Installation ID is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->getBackups($data['installation_id']);
    }

    /**
     * Restore application from backup
     *
     * @return bool
     */
    public function restore_application_backup($data)
    {
        $required = [
            'backup_id' => 'Backup ID is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->restoreFromBackup($data['backup_id']);
    }

    /**
     * Delete application and its backups
     *
     * @return bool
     */
    public function delete_application($data)
    {
        $required = [
            'installation_id' => 'Installation ID is missing',
        ];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);

        $autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
        $autoInstaller->setDi($this->di);

        return $autoInstaller->deleteApplication($data['installation_id']);
    }

    public function _getService($data)
    {
        if (!isset($data['order_id'])) {
            throw new \FOSSBilling\Exception('Order ID is required');
        }
        $identity = $this->getIdentity();
        $order = $this->di['db']->findOne('ClientOrder', 'id = ? and client_id = ?', [$data['order_id'], $identity->id]);
        if (!$order instanceof \Model_ClientOrder) {
            throw new \FOSSBilling\Exception('Order not found');
        }

        $orderService = $this->di['mod_service']('order');
        $s = $orderService->getOrderService($order);
        if (!$s instanceof \Model_ServiceHosting) {
            throw new \FOSSBilling\Exception('Order is not activated');
        }

        return [$order, $s];
    }
}
