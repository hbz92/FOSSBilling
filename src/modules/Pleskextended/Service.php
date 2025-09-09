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

namespace Box\Mod\Pleskextended;

use FOSSBilling\Exception;
use FOSSBilling\InjectionAwareInterface;

class Service implements InjectionAwareInterface
{
    protected ?\Pimple\Container $di = null;

    public function setDi(\Pimple\Container $di): void
    {
        $this->di = $di;
    }

    public function getDi(): ?\Pimple\Container
    {
        return $this->di;
    }

    /**
     * Get Plesk server manager for a hosting service
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return \Server_Manager_Plesk
     * @throws Exception
     */
    public function getPleskManager(\Model_ServiceHosting $hostingModel): \Server_Manager_Plesk
    {
        $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $hostingModel->service_hosting_server_id, 'Server not found');
        
        if ($server->manager !== 'Plesk') {
            throw new Exception('Server is not a Plesk server');
        }

        $config = [];
        $config['ip'] = $server->ip;
        $config['host'] = $server->hostname;
        $config['port'] = $server->port;
        $config['config'] = json_decode($server->config ?? '', true) ?? [];
        $config['secure'] = $server->secure;
        $config['username'] = $server->username;
        $config['password'] = $server->password;
        $config['accesshash'] = $server->accesshash;
        $config['passwordLength'] = $server->passwordLength;

        $manager = $this->di['server_manager']($server->manager, $config);

        if (!$manager instanceof \Server_Manager_Plesk) {
            throw new Exception('Server manager is not a Plesk manager');
        }

        return $manager;
    }

    /**
     * Get server account for Plesk operations
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     * @throws Exception
     */
    public function getServerAccount(\Model_ServiceHosting $hostingModel): array
    {
        $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $hostingModel->service_hosting_server_id, 'Server not found');
        $hp = $this->di['db']->getExistingModelById('ServiceHostingHp', $hostingModel->service_hosting_hp_id, 'Hosting plan not found');
        $client = $this->di['db']->getExistingModelById('Client', $hostingModel->client_id, 'Client not found');

        $hp_config = $hp->config;

        $server_client = new \Server_Client();
        $server_client
            ->setEmail($client->email)
            ->setFirstName($client->first_name)
            ->setLastName($client->last_name)
            ->setFullName($client->getFullName())
            ->setCompany($client->company)
            ->setStreet($client->address_1)
            ->setZip($client->postcode)
            ->setCity($client->city)
            ->setState($client->state)
            ->setCountry($client->country)
            ->setTelephone($client->phone);

        $package = $this->getServerPackage($hp);
        $server_account = new \Server_Account();
        $server_account
            ->setClient($server_client)
            ->setPackage($package)
            ->setUsername($hostingModel->username)
            ->setReseller($hostingModel->reseller)
            ->setDomain($hostingModel->sld . $hostingModel->tld)
            ->setPassword($hostingModel->pass)
            ->setNs1($server->ns1)
            ->setNs2($server->ns2)
            ->setNs3($server->ns3)
            ->setNs4($server->ns4)
            ->setIp($hostingModel->ip);

        $manager = $this->getPleskManager($hostingModel);

        return [$manager, $server_account];
    }

    /**
     * Get server package from hosting plan
     *
     * @param \Model_ServiceHostingHp $hp
     * @return \Server_Package
     */
    private function getServerPackage(\Model_ServiceHostingHp $hp): \Server_Package
    {
        $config = json_decode($hp->config ?? '', true);
        if (!is_array($config)) {
            $config = [];
        }

        $p = new \Server_Package();
        $p->setCustomValues($config)
            ->setMaxFtp($hp->max_ftp)
            ->setMaxSql($hp->max_sql)
            ->setMaxPop($hp->max_pop)
            ->setMaxSubdomains($hp->max_sub)
            ->setMaxParkedDomains($hp->max_park)
            ->setMaxDomains($hp->max_addon)
            ->setBandwidth($hp->bandwidth)
            ->setQuota($hp->quota)
            ->setName($hp->name);

        return $p;
    }

    /**
     * Get Plesk-specific URLs for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getPleskUrls(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);

            return [
                'admin_panel' => $manager->getAdminLoginUrl(),
                'webmail' => $manager->getWebmailUrl($account),
                'backup_manager' => $manager->getBackupManagerUrl($account),
                'wp_toolkit' => $manager->getWpToolkitUrl($account),
                'plesk_panel' => $manager->getLoginUrl($account),
            ];
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting Plesk URLs: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get addon domains for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getAddonDomains(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getAddonDomains($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting addon domains: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Add addon domain
     *
     * @param \Model_ServiceHosting $hostingModel
     * @param string $domain
     * @return bool
     */
    public function addAddonDomain(\Model_ServiceHosting $hostingModel, string $domain): bool
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->addAddonDomain($account, $domain);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error adding addon domain: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get databases for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getDatabases(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getDatabases($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting databases: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create database
     *
     * @param \Model_ServiceHosting $hostingModel
     * @param string $name
     * @param string $type
     * @return bool
     */
    public function createDatabase(\Model_ServiceHosting $hostingModel, string $name, string $type = 'mysql'): bool
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->createDatabase($account, $name, $type);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error creating database: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get email addresses for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getEmailAddresses(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getEmailAddresses($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting email addresses: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create email address
     *
     * @param \Model_ServiceHosting $hostingModel
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function createEmailAddress(\Model_ServiceHosting $hostingModel, string $email, string $password): bool
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->createEmailAddress($account, $email, $password);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error creating email address: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get FTP accounts for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getFtpAccounts(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getFtpAccounts($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting FTP accounts: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create FTP account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @param string $username
     * @param string $password
     * @param string $home
     * @return bool
     */
    public function createFtpAccount(\Model_ServiceHosting $hostingModel, string $username, string $password, string $home = '/'): bool
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->createFtpAccount($account, $username, $password, $home);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error creating FTP account: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get SSL certificates for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getSslCertificates(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getSslCertificates($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting SSL certificates: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get subdomains for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getSubdomains(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getSubdomains($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting subdomains: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create subdomain
     *
     * @param \Model_ServiceHosting $hostingModel
     * @param string $name
     * @return bool
     */
    public function createSubdomain(\Model_ServiceHosting $hostingModel, string $name): bool
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->createSubdomain($account, $name);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error creating subdomain: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get PHP settings for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return array
     */
    public function getPhpSettings(\Model_ServiceHosting $hostingModel): array
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->getPhpSettings($account);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting PHP settings: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Update PHP settings for an account
     *
     * @param \Model_ServiceHosting $hostingModel
     * @param array $settings
     * @return bool
     */
    public function updatePhpSettings(\Model_ServiceHosting $hostingModel, array $settings): bool
    {
        try {
            [$manager, $account] = $this->getServerAccount($hostingModel);
            return $manager->updatePhpSettings($account, $settings);
        } catch (\Exception $e) {
            $this->di['logger']->error('Error updating PHP settings: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get all Plesk products and servers
     *
     * @param \Model_ServiceHostingServer $server
     * @return array
     */
    public function getAllPleskProducts(\Model_ServiceHostingServer $server): array
    {
        try {
            $manager = $this->getPleskManagerFromServer($server);
            return $manager->getAllPleskProducts();
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting Plesk products: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get all Plesk servers
     *
     * @param \Model_ServiceHostingServer $server
     * @return array
     */
    public function getAllPleskServers(\Model_ServiceHostingServer $server): array
    {
        try {
            $manager = $this->getPleskManagerFromServer($server);
            return $manager->getAllPleskServers();
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting Plesk servers: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get all Plesk customers
     *
     * @param \Model_ServiceHostingServer $server
     * @return array
     */
    public function getAllPleskCustomers(\Model_ServiceHostingServer $server): array
    {
        try {
            $manager = $this->getPleskManagerFromServer($server);
            return $manager->getAllPleskCustomers();
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting Plesk customers: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get server statistics
     *
     * @param \Model_ServiceHostingServer $server
     * @return array
     */
    public function getServerStatistics(\Model_ServiceHostingServer $server): array
    {
        try {
            $manager = $this->getPleskManagerFromServer($server);
            return $manager->getServerStatistics();
        } catch (\Exception $e) {
            $this->di['logger']->error('Error getting server statistics: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get Plesk manager from server
     *
     * @param \Model_ServiceHostingServer $server
     * @return \Server_Manager_Plesk
     * @throws Exception
     */
    private function getPleskManagerFromServer(\Model_ServiceHostingServer $server): \Server_Manager_Plesk
    {
        if ($server->manager !== 'Plesk') {
            throw new Exception('Server is not a Plesk server');
        }

        $config = [];
        $config['ip'] = $server->ip;
        $config['host'] = $server->hostname;
        $config['port'] = $server->port;
        $config['config'] = json_decode($server->config ?? '', true) ?? [];
        $config['secure'] = $server->secure;
        $config['username'] = $server->username;
        $config['password'] = $server->password;
        $config['accesshash'] = $server->accesshash;
        $config['passwordLength'] = $server->passwordLength;

        $manager = $this->di['server_manager']($server->manager, $config);

        if (!$manager instanceof \Server_Manager_Plesk) {
            throw new Exception('Server manager is not a Plesk manager');
        }

        return $manager;
    }

    /**
     * Check if hosting service is Plesk-based
     *
     * @param \Model_ServiceHosting $hostingModel
     * @return bool
     */
    public function isPleskService(\Model_ServiceHosting $hostingModel): bool
    {
        try {
            $server = $this->di['db']->getExistingModelById('ServiceHostingServer', $hostingModel->service_hosting_server_id, 'Server not found');
            return $server->manager === 'Plesk';
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get hosting service by order ID
     *
     * @param int $orderId
     * @return \Model_ServiceHosting
     * @throws Exception
     */
    public function getHostingServiceByOrderId(int $orderId): \Model_ServiceHosting
    {
        $order = $this->di['db']->getExistingModelById('ClientOrder', $orderId, 'Order not found');
        $orderService = $this->di['mod_service']('order');
        $service = $orderService->getOrderService($order);
        
        if (!$service instanceof \Model_ServiceHosting) {
            throw new Exception('Order is not a hosting service');
        }

        return $service;
    }

    /**
     * Get hosting service by order ID for client
     *
     * @param int $orderId
     * @param int $clientId
     * @return \Model_ServiceHosting
     * @throws Exception
     */
    public function getHostingServiceByOrderIdForClient(int $orderId, int $clientId): \Model_ServiceHosting
    {
        $order = $this->di['db']->findOne('ClientOrder', 'id = ? and client_id = ?', [$orderId, $clientId]);
        if (!$order instanceof \Model_ClientOrder) {
            throw new Exception('Order not found or does not belong to client');
        }

        $orderService = $this->di['mod_service']('order');
        $service = $orderService->getOrderService($order);
        
        if (!$service instanceof \Model_ServiceHosting) {
            throw new Exception('Order is not a hosting service');
        }

        return $service;
    }
}