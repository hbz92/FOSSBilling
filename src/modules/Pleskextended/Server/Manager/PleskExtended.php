<?php

use PleskX\Api\Client;

/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class Server_Manager_PleskExtended extends Server_Manager
{
    private ?Client $_client = null;

    /**
     * Returns an array with a single key-value pair, where the key is 'label' and the value is 'Plesk Extended'.
     *
     * @return string[] an array with a single key-value pair
     */
    public static function getForm(): array
    {
        return [
            'label' => 'Plesk Extended',
            'fields' => [
                'host' => [
                    'label' => 'Server hostname or IP',
                    'required' => true,
                ],
                'username' => [
                    'label' => 'Username',
                    'required' => true,
                ],
                'password' => [
                    'label' => 'Password',
                    'required' => true,
                    'type' => 'password',
                ],
                'port' => [
                    'label' => 'Port',
                    'default' => '8443',
                ],
                'secure' => [
                    'label' => 'Use secure connection (HTTPS)',
                    'type' => 'checkbox',
                    'default' => true,
                ],
                'power_user_view' => [
                    'label' => 'Enable Power User Panel View',
                    'type' => 'checkbox',
                    'default' => false,
                ],
                'client_sync' => [
                    'label' => 'Enable Client Details Synchronization',
                    'type' => 'checkbox',
                    'default' => true,
                ],
                'default_php_version' => [
                    'label' => 'Default PHP Version',
                    'default' => '8.1',
                ],
                'metric_billing' => [
                    'label' => 'Enable Metric Billing',
                    'type' => 'checkbox',
                    'default' => false,
                ],
                'custom_panel_url' => [
                    'label' => 'Custom Panel URL (optional)',
                ],
                'custom_webmail_url' => [
                    'label' => 'Custom Webmail URL (optional)',
                ],
                'auto_installer_enabled' => [
                    'label' => 'Enable Application Auto Installer',
                    'type' => 'checkbox',
                    'default' => true,
                ],
                'auto_installer_type' => [
                    'label' => 'Auto Installer Type',
                    'type' => 'select',
                    'options' => [
                        'plesk' => 'Plesk Default',
                        'installatron' => 'Installatron',
                        'softaculous' => 'Softaculous',
                    ],
                    'default' => 'plesk',
                ],
            ],
        ];
    }

    /**
     * Initializes the Plesk client with the host, port, username, and password from the configuration.
     * If the port is not set in the configuration, it defaults to 8443.
     */
    public function init(): void
    {
        $this->_config['port'] = empty($this->_config['port']) ? 8443 : $this->_config['port'];
        $this->_client = new Client($this->_config['host'], $this->_config['port']);
        $this->_client->setCredentials($this->_config['username'], $this->_config['password']);
    }

    /**
     * Returns the login URL for a reseller account.
     * This method is a wrapper for the getLoginUrl method.
     *
     * @param Server_Account|null $account the account for which the login URL should be retrieved
     *
     * @return string the login URL for the reseller account
     */
    public function getResellerLoginUrl(?Server_Account $account = null): string
    {
        return $this->getLoginUrl();
    }

    /**
     * Returns the login URL for a given account.
     * If an account is provided, a session is created for the account and the session ID is appended to the URL.
     *
     * @param Server_Account|null $account the account for which the login URL should be retrieved
     *
     * @return string the login URL for the account
     */
    public function getLoginUrl(?Server_Account $account = null): string
    {
        $protocol = $this->_config['secure'] ? 'https' : 'http';
        $url = $protocol . '://' . $this->_config['host'] . ':' . $this->_config['port'];
        if ($account) {
            $sessionId = $this->_client->session()->create($account->getUsername(), $_SERVER['REMOTE_ADDR']);
            $url .= '/enterprise/rsession_init.php?PHPSESSID=' . $sessionId;
        }

        return $url;
    }

    /**
     * Tests the connection to the Plesk server by retrieving the server's statistics.
     * If the server's uptime is less than 0, an exception is thrown.
     *
     * @return true if the connection to the Plesk server is successful
     *
     * @throws Server_Exception if the connection to the Plesk server fails
     */
    public function testConnection(): bool
    {
        $stats = $this->_client->server()->getStatistics();

        if ($stats->other->uptime < 0) {
            throw new Server_Exception('Failed to connect to the :type: server. Please verify your credentials and configuration', [':type:' => 'Plesk Extended']);
        }

        return true;
    }

    /**
     * Throws an exception indicating that account synchronization is not supported.
     *
     * @param Server_Account $account the account to be synchronized
     *
     * @throws Server_Exception always throws an exception
     */
    public function synchronizeAccount(Server_Account $account): never
    {
        throw new Server_Exception(':type: does not support :action:', [':type:' => 'Plesk Extended', ':action:' => __trans('account synchronization')]);
    }

    /**
     * Creates an account on the Plesk server.
     * If the account is a reseller account, an exclusive IP address is assigned to the account if available.
     * A client is created for the account and a subscription is set for the client.
     *
     * @param Server_Account $account the account to be created
     *
     * @return true if the account is successfully created
     *
     * @throws Server_Exception if the client creation fails
     */
    public function createAccount(Server_Account $account): bool
    {
        $this->getLog()->info('Creating account ' . $account->getUsername());

        if ($account->getReseller()) {
            $ips = $this->getIps();
            foreach ($ips['exclusive'] as $key => $ip) {
                if (!$ip['empty']) {
                    unset($ips['exclusive'][$key]);
                }
            }

            if ((is_countable($ips['exclusive']) ? count($ips['exclusive']) : 0) > 0) {
                $ips['exclusive'] = array_values($ips['exclusive']);
                $rand = array_rand($ips['exclusive']);
                $account->setIp($ips['exclusive'][$rand]['ip']);
            }
        }

        $id = $this->createClient($account);
        $client = $account->getClient();

        if (!$id) {
            $placeholders = [':action:' => __trans('create account'), ':type"' => 'Plesk Extended'];

            throw new Server_Exception('Failed to :action: on the :type: server, check the error logs for further details', $placeholders);
        }

        $client->setId((string) $id);

        $this->setSubscription($account);

        return true;
    }

    /**
     * Sets a subscription for a given account.
     *
     * @param Server_Account $account the account for which the subscription should be set
     */
    public function setSubscription(Server_Account $account): void
    {
        $this->getLog()->info('Setting subscription for account ' . $account->getUsername());

        $this->_client->webspace()->request($this->createSubscriptionProps($account, 'add'));
    }

    /**
     * Suspends a given account.
     * The customer's status is set to 16, which is suspended.
     *
     * @param Server_Account $account the account to be suspended
     * @param bool           $suspend Whether the account should be suspended. Defaults to true.
     *
     * @return bool the result of the API request to suspend the account
     */
    public function suspendAccount(Server_Account $account, bool $suspend = true): bool
    {
        return $this->_client->customer()->setProperties('login', $account->getUsername(), ['status' => 16]);
    }

    /**
     * Unsuspends a given account.
     * Set the customer's status to 0, which is active.
     *
     * @param Server_Account $account the account to be unsuspended
     *
     * @return bool the result of the API request to unsuspend the account
     */
    public function unsuspendAccount(Server_Account $account): bool
    {
        return $this->_client->customer()->setProperties('login', $account->getUsername(), ['status' => 0]);
    }

    /**
     * Cancels a given account.
     * Delete the customer or reseller associated with the account.
     *
     * @param Server_Account $account the account to be cancelled
     *
     * @return bool the result of the API request to cancel the account
     */
    public function cancelAccount(Server_Account $account): bool
    {
        if ($account->getReseller()) {
            $result = $this->_client->reseller()->delete('login', $account->getUsername());
        } else {
            $result = $this->_client->customer()->delete('login', $account->getUsername());
        }

        return $result;
    }

    /**
     * Changes the package of a given account.
     * The client's properties are modified and the subscription is updated.
     * If the account is a reseller account, a nameserver (NS) record is added for the account.
     *
     * @param Server_Account $account the account for which the package should be changed
     * @param Server_Package $package the new package
     *
     * @return true if the package is successfully changed
     *
     * @throws Server_Exception if the client modification fails
     */
    public function changeAccountPackage(Server_Account $account, Server_Package $package): bool
    {
        $domainId = null;
        $id = $this->modifyClient($account);
        $client = $account->getClient();
        if (!$id) {
            throw new Server_Exception('Can\'t modify client');
        } else {
            $client->setId($id);
        }

        $account->setPackage($package);
        $this->updateSubscription($account);

        if ($account->getReseller()) {
            $this->addNs($account, $domainId);
        }

        return true;
    }

    /**
     * Updates the subscription for a given account.
     * Sends a request to the Plesk API to update the subscription for the account.
     *
     * @param Server_Account $account the account for which the subscription should be updated
     */
    public function updateSubscription(Server_Account $account): void
    {
        $this->getLog()->info('Updating subscription for account ' . $account->getUsername());

        $this->_client->webspace()->request($this->createSubscriptionProps($account, 'set'));
    }

    /**
     * Changes the password of a given account.
     *
     * @param Server_Account $account     the account for which the password should be changed
     * @param string         $newPassword the new password
     *
     * @return bool the result of the API request to change the password
     */
    public function changeAccountPassword(Server_Account $account, string $newPassword): bool
    {
        $this->getLog()->info('Changing password for account ' . $account->getUsername());

        return $this->_client->customer()->setProperties('login', $account->getUsername(), ['passwd' => $newPassword]);
    }

    /**
     * This is not implemented for Plesk Extended.
     *
     * @param Server_Account $account     the account for which the username should be changed
     * @param string         $newUsername the new username
     *
     * @throws Server_Exception always throws an exception
     */
    public function changeAccountUsername(Server_Account $account, string $newUsername): never
    {
        throw new Server_Exception(':type: does not support :action:', [':type:' => 'Plesk Extended', ':action:' => __trans('username changes')]);
    }

    /**
     * Changes the domain of a given account.
     * The domain of the account is updated and a request is sent to the Plesk API to update the domain of the account.
     *
     * @param Server_Account $account   the account for which the domain should be changed
     * @param string         $newDomain the new domain
     *
     * @return bool the result of the API request to change the domain
     */
    public function changeAccountDomain(Server_Account $account, string $newDomain): bool
    {
        $this->getLog()->info('Updating domain for account ' . $account->getUsername());

        $account->setDomain($newDomain);

        $params = [
            'set' => [
                'filter' => [
                    'owner-login' => $account->getUsername(),
                ],
                'values' => [
                    'gen_setup' => [
                        'name' => $newDomain,
                    ],
                ],
            ],
        ];

        $this->_client->webspace()->request($params);

        return true;
    }

    /**
     * This is not implemented for Plesk Extended.
     *
     * @param Server_Account $account the account for which the IP should be changed
     * @param string         $newIp   the new IP address
     *
     * @throws Server_Exception always throws an exception
     */
    public function changeAccountIp(Server_Account $account, string $newIp): never
    {
        throw new Server_Exception(':type: does not support :action:', [':type:' => 'Plesk Extended', ':action:' => __trans('changing the account IP')]);
    }

    /**
     * This is not implemented for Plesk Extended.
     *
     * @param Server_Account $account the account for which the service plan should be created
     */
    public function createServicePlan(Server_Account $account)
    {
    }

    /**
     * Deletes a subscription for a given account.
     * Sends a request to the Plesk API to delete the webspace associated with the account's domain.
     *
     * @param Server_Account $account the account for which the subscription should be deleted
     *
     * @return mixed the result of the API request to delete the webspace
     */
    public function deleteSubscription(Server_Account $account): mixed
    {
        return $this->_client->webspace()->delete('name', $account->getDomain());
    }

    // Extended Plesk Features

    /**
     * Get administrator panel login URL
     *
     * @return string
     */
    public function getAdminLoginUrl(): string
    {
        $protocol = $this->_config['secure'] ? 'https' : 'http';
        $customUrl = $this->_config['custom_panel_url'] ?? null;
        
        if ($customUrl) {
            return $customUrl;
        }
        
        return $protocol . '://' . $this->_config['host'] . ':' . $this->_config['port'];
    }

    /**
     * Get webmail login URL
     *
     * @param Server_Account|null $account
     * @return string
     */
    public function getWebmailUrl(?Server_Account $account = null): string
    {
        $customUrl = $this->_config['custom_webmail_url'] ?? null;
        
        if ($customUrl) {
            return $customUrl;
        }
        
        $protocol = $this->_config['secure'] ? 'https' : 'http';
        $url = $protocol . '://' . $this->_config['host'] . ':' . $this->_config['port'] . '/webmail';
        
        if ($account) {
            $sessionId = $this->_client->session()->create($account->getUsername(), $_SERVER['REMOTE_ADDR']);
            $url .= '?PHPSESSID=' . $sessionId;
        }
        
        return $url;
    }

    /**
     * Get backup manager URL
     *
     * @param Server_Account|null $account
     * @return string
     */
    public function getBackupManagerUrl(?Server_Account $account = null): string
    {
        $protocol = $this->_config['secure'] ? 'https' : 'http';
        $url = $protocol . '://' . $this->_config['host'] . ':' . $this->_config['port'] . '/backup';
        
        if ($account) {
            $sessionId = $this->_client->session()->create($account->getUsername(), $_SERVER['REMOTE_ADDR']);
            $url .= '?PHPSESSID=' . $sessionId;
        }
        
        return $url;
    }

    /**
     * Get WordPress Toolkit URL
     *
     * @param Server_Account|null $account
     * @return string
     */
    public function getWpToolkitUrl(?Server_Account $account = null): string
    {
        $protocol = $this->_config['secure'] ? 'https' : 'http';
        $url = $protocol . '://' . $this->_config['host'] . ':' . $this->_config['port'] . '/wp-toolkit';
        
        if ($account) {
            $sessionId = $this->_client->session()->create($account->getUsername(), $_SERVER['REMOTE_ADDR']);
            $url .= '?PHPSESSID=' . $sessionId;
        }
        
        return $url;
    }

    /**
     * Get addon domains for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getAddonDomains(Server_Account $account): array
    {
        $response = $this->_client->webspace()->get('name', $account->getDomain());
        $domains = [];
        
        if (isset($response->webspace->get->result->data->gen_info->{'addon-domains'}->domain)) {
            foreach ($response->webspace->get->result->data->gen_info->{'addon-domains'}->domain as $domain) {
                $domains[] = [
                    'name' => (string) $domain->name,
                    'status' => (string) $domain->status,
                ];
            }
        }
        
        return $domains;
    }

    /**
     * Add addon domain
     *
     * @param Server_Account $account
     * @param string $domain
     * @return bool
     */
    public function addAddonDomain(Server_Account $account, string $domain): bool
    {
        $params = [
            'webspace' => [
                'add-subdomain' => [
                    'filter' => [
                        'name' => $account->getDomain(),
                    ],
                    'subdomain' => [
                        'name' => $domain,
                        'parent' => $account->getDomain(),
                    ],
                ],
            ],
        ];
        
        $response = $this->_client->webspace()->request($params);
        return isset($response->webspace->{'add-subdomain'}->result->status) 
            && $response->webspace->{'add-subdomain'}->result->status == 'ok';
    }

    /**
     * Get databases for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getDatabases(Server_Account $account): array
    {
        $response = $this->_client->database()->get('webspace', $account->getDomain());
        $databases = [];
        
        if (isset($response->database->get->result)) {
            foreach ($response->database->get->result as $db) {
                $databases[] = [
                    'name' => (string) $db->name,
                    'type' => (string) $db->type,
                    'status' => (string) $db->status,
                ];
            }
        }
        
        return $databases;
    }

    /**
     * Create database
     *
     * @param Server_Account $account
     * @param string $name
     * @param string $type
     * @return bool
     */
    public function createDatabase(Server_Account $account, string $name, string $type = 'mysql'): bool
    {
        $params = [
            'database' => [
                'add-db' => [
                    'webspace' => $account->getDomain(),
                    'name' => $name,
                    'type' => $type,
                ],
            ],
        ];
        
        $response = $this->_client->database()->request($params);
        return isset($response->database->{'add-db'}->result->status) 
            && $response->database->{'add-db'}->result->status == 'ok';
    }

    /**
     * Get email addresses for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getEmailAddresses(Server_Account $account): array
    {
        $response = $this->_client->mail()->get('webspace', $account->getDomain());
        $emails = [];
        
        if (isset($response->mail->get->result)) {
            foreach ($response->mail->get->result as $email) {
                $emails[] = [
                    'name' => (string) $email->name,
                    'mailbox' => (string) $email->mailbox,
                    'enabled' => (string) $email->enabled,
                ];
            }
        }
        
        return $emails;
    }

    /**
     * Create email address
     *
     * @param Server_Account $account
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function createEmailAddress(Server_Account $account, string $email, string $password): bool
    {
        $params = [
            'mail' => [
                'create' => [
                    'filter' => [
                        'webspace' => $account->getDomain(),
                    ],
                    'name' => $email,
                    'mailbox' => [
                        'enabled' => 'true',
                        'password' => $password,
                    ],
                ],
            ],
        ];
        
        $response = $this->_client->mail()->request($params);
        return isset($response->mail->create->result->status) 
            && $response->mail->create->result->status == 'ok';
    }

    /**
     * Get FTP accounts for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getFtpAccounts(Server_Account $account): array
    {
        $response = $this->_client->ftp()->get('webspace', $account->getDomain());
        $ftpAccounts = [];
        
        if (isset($response->ftp->get->result)) {
            foreach ($response->ftp->get->result as $ftp) {
                $ftpAccounts[] = [
                    'name' => (string) $ftp->name,
                    'home' => (string) $ftp->home,
                    'enabled' => (string) $ftp->enabled,
                ];
            }
        }
        
        return $ftpAccounts;
    }

    /**
     * Create FTP account
     *
     * @param Server_Account $account
     * @param string $username
     * @param string $password
     * @param string $home
     * @return bool
     */
    public function createFtpAccount(Server_Account $account, string $username, string $password, string $home = '/'): bool
    {
        $params = [
            'ftp' => [
                'create' => [
                    'filter' => [
                        'webspace' => $account->getDomain(),
                    ],
                    'name' => $username,
                    'password' => $password,
                    'home' => $home,
                ],
            ],
        ];
        
        $response = $this->_client->ftp()->request($params);
        return isset($response->ftp->create->result->status) 
            && $response->ftp->create->result->status == 'ok';
    }

    /**
     * Get SSL certificates for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getSslCertificates(Server_Account $account): array
    {
        $response = $this->_client->certificate()->get('webspace', $account->getDomain());
        $certificates = [];
        
        if (isset($response->certificate->get->result)) {
            foreach ($response->certificate->get->result as $cert) {
                $certificates[] = [
                    'name' => (string) $cert->name,
                    'status' => (string) $cert->status,
                    'expiry' => (string) $cert->expiry,
                ];
            }
        }
        
        return $certificates;
    }

    /**
     * Get subdomains for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getSubdomains(Server_Account $account): array
    {
        $response = $this->_client->subdomain()->get('webspace', $account->getDomain());
        $subdomains = [];
        
        if (isset($response->subdomain->get->result)) {
            foreach ($response->subdomain->get->result as $subdomain) {
                $subdomains[] = [
                    'name' => (string) $subdomain->name,
                    'status' => (string) $subdomain->status,
                ];
            }
        }
        
        return $subdomains;
    }

    /**
     * Create subdomain
     *
     * @param Server_Account $account
     * @param string $name
     * @return bool
     */
    public function createSubdomain(Server_Account $account, string $name): bool
    {
        $params = [
            'subdomain' => [
                'create' => [
                    'filter' => [
                        'webspace' => $account->getDomain(),
                    ],
                    'name' => $name,
                ],
            ],
        ];
        
        $response = $this->_client->subdomain()->request($params);
        return isset($response->subdomain->create->result->status) 
            && $response->subdomain->create->result->status == 'ok';
    }

    /**
     * Get PHP settings for an account
     *
     * @param Server_Account $account
     * @return array
     */
    public function getPhpSettings(Server_Account $account): array
    {
        $response = $this->_client->webspace()->get('name', $account->getDomain());
        $phpSettings = [];
        
        if (isset($response->webspace->get->result->data->hosting->vrt_hst->php_settings)) {
            $php = $response->webspace->get->result->data->hosting->vrt_hst->php_settings;
            $phpSettings = [
                'version' => (string) $php->version,
                'enabled' => (string) $php->enabled,
                'settings' => (array) $php->settings,
            ];
        }
        
        return $phpSettings;
    }

    /**
     * Update PHP settings for an account
     *
     * @param Server_Account $account
     * @param array $settings
     * @return bool
     */
    public function updatePhpSettings(Server_Account $account, array $settings): bool
    {
        $params = [
            'webspace' => [
                'set' => [
                    'filter' => [
                        'name' => $account->getDomain(),
                    ],
                    'values' => [
                        'hosting' => [
                            'vrt_hst' => [
                                'php_settings' => $settings,
                            ],
                        ],
                    ],
                ],
            ],
        ];
        
        $response = $this->_client->webspace()->request($params);
        return isset($response->webspace->set->result->status) 
            && $response->webspace->set->result->status == 'ok';
    }

    /**
     * Get installed applications
     *
     * @param Server_Account $account
     * @return array
     */
    public function getInstalledApplications(Server_Account $account): array
    {
        // This would require integration with Installatron/Softaculous APIs
        // For now, return empty array - implementation depends on specific auto-installer
        return [];
    }

    /**
     * Install application
     *
     * @param Server_Account $account
     * @param string $appName
     * @param array $options
     * @return bool
     */
    public function installApplication(Server_Account $account, string $appName, array $options = []): bool
    {
        // This would require integration with Installatron/Softaculous APIs
        // For now, return false - implementation depends on specific auto-installer
        return false;
    }

    /**
     * Get server statistics
     *
     * @return array
     */
    public function getServerStatistics(): array
    {
        $stats = $this->_client->server()->getStatistics();
        
        return [
            'uptime' => $stats->other->uptime,
            'load_average' => $stats->other->load_average,
            'memory_usage' => $stats->other->memory_usage,
            'disk_usage' => $stats->other->disk_usage,
        ];
    }

    /**
     * Get all Plesk products and servers
     *
     * @return array
     */
    public function getAllPleskProducts(): array
    {
        $response = $this->_client->product()->get();
        $products = [];
        
        if (isset($response->product->get->result)) {
            foreach ($response->product->get->result as $product) {
                $products[] = [
                    'name' => (string) $product->name,
                    'version' => (string) $product->version,
                    'status' => (string) $product->status,
                ];
            }
        }
        
        return $products;
    }

    /**
     * Get all Plesk servers
     *
     * @return array
     */
    public function getAllPleskServers(): array
    {
        $response = $this->_client->server()->get();
        $servers = [];
        
        if (isset($response->server->get->result)) {
            foreach ($response->server->get->result as $server) {
                $servers[] = [
                    'name' => (string) $server->name,
                    'ip' => (string) $server->ip,
                    'status' => (string) $server->status,
                ];
            }
        }
        
        return $servers;
    }

    /**
     * Get all Plesk customers
     *
     * @return array
     */
    public function getAllPleskCustomers(): array
    {
        $response = $this->_client->customer()->get();
        $customers = [];
        
        if (isset($response->customer->get->result)) {
            foreach ($response->customer->get->result as $customer) {
                $customers[] = [
                    'login' => (string) $customer->login,
                    'name' => (string) $customer->name,
                    'email' => (string) $customer->email,
                    'status' => (string) $customer->status,
                ];
            }
        }
        
        return $customers;
    }

    // Private helper methods (same as original Plesk manager)

    /**
     * Retrieves the IP addresses from the Plesk server.
     * Sends a request to the Plesk API to get the IP addresses and categorizes them into 'shared' and 'exclusive'.
     *
     * @return array an array containing 'shared' and 'exclusive' IP addresses
     */
    private function getIps(): array
    {
        $response = $this->_client->ip()->get();

        $ips = ['shared' => [], 'exclusive' => []];

        foreach ($response as $ip) {
            $ips[$ip->type][] = [
                'ip' => $ip->ipAddress,
                'empty' => empty($ip->default),
            ];
        }

        return $ips;
    }

    /**
     * Creates a client on the Plesk server.
     * Sends a request to the Plesk API to create a customer or reseller based on the account type.
     * The client's properties include the company name, full name, username, password, telephone number, fax number, email address, address, city, and state.
     *
     * @param Server_Account $account the account for which the client should be created
     *
     * @return bool returns true after the client has been created
     */
    private function createClient(Server_Account $account): bool
    {
        $client = $account->getClient();

        $props = [
            'cname' => $client->getCompany(),
            'pname' => $client->getFullname(),
            'login' => $account->getUsername(),
            'passwd' => $account->getPassword(),
            'phone' => $client->getTelephone(),
            'fax' => $client->getFax(),
            'email' => $client->getEmail(),
            'address' => $client->getAddress1(),
            'city' => $client->getCity(),
            'state' => $client->getState(),
            'description' => 'Created using FOSSBilling Plesk Extended.',
        ];

        if ($account->getReseller()) {
            $this->_client->reseller()->create($props);
        } else {
            $this->_client->customer()->create($props);
        }

        return true;
    }

    /**
     * Creates an array of properties for a subscription.
     * The properties include the domain name, owner login, hosting type, IP address, FTP login, FTP password, PHP, SSL, CGI, limits, and permissions.
     *
     * @param Server_Account $account the account for which the properties should be created
     * @param string         $action  the action to be performed on the subscription
     *
     * @return array the array of subscription properties
     */
    private function createSubscriptionProps(Server_Account $account, string $action): array
    {
        $package = $account->getPackage();

        // check if bandwidth quota is set as an integer. If so, convert it to bytes
        $bandwidth = 0;
        if (is_numeric($package->getBandwidth())) {
            $bandwidth = intval($package->getBandwidth()) * 1024 * 1024;
        }

        // check if disk quota is set as an integer. If so, convert it to bytes
        $quota = 0;
        if (is_numeric($package->getQuota())) {
            $quota = intval($package->getQuota()) * 1024 * 1024;
        }

        return [
            $action => [
                'gen_setup' => [
                    'name' => $account->getDomain(),
                    'owner-login' => $account->getUsername(),
                    'htype' => 'vrt_hst',
                    'ip_address' => $account->getIp(),
                ],
                'hosting' => [
                    'vrt_hst' => [
                        'property' => [
                            [
                                'name' => 'ftp_login',
                                'value' => $account->getUsername(),
                            ],
                            [
                                'name' => 'ftp_password',
                                'value' => $account->getPassword(),
                            ],
                            [
                                'name' => 'php',
                                'value' => 'true',
                            ],
                            [
                                'name' => 'ssl',
                                'value' => 'true',
                            ],
                            [
                                'name' => 'cgi',
                                'value' => 'true',
                            ],
                        ],
                        'ip_address' => $account->getIp(),
                    ],
                ],
                'limits' => [
                    'limit' => [
                        [
                            'name' => 'max_db',
                            'value' => $package->getMaxSql() ?: 0,
                        ],
                        [
                            'name' => 'max_maillists',
                            'value' => $package->getMaxEmailLists() ?: 0,
                        ],
                        [
                            'name' => 'max_box',
                            'value' => $package->getMaxPop() ?: 0,
                        ],
                        [
                            'name' => 'max_traffic',
                            'value' => $bandwidth,
                        ],
                        [
                            'name' => 'disk_space',
                            'value' => $quota,
                        ],
                        [
                            'name' => 'max_subdom',
                            'value' => $package->getMaxSubdomains() ?: 0,
                        ],
                        [
                            'name' => 'max_subftp_users',
                            'value' => $package->getMaxFtp() ?: 0,
                        ],
                        [
                            'name' => 'max_site',
                            'value' => $package->getMaxDomains() ?: 0,
                        ],
                    ],
                ],
                'permissions' => [
                    'permission' => [
                        [
                            'name' => 'manage_subdomains',
                            'value' => $package->getMaxSubdomains() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_dns',
                            'value' => 'true',
                        ],
                        [
                            'name' => 'manage_crontab',
                            'value' => $package->getHasCron() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_anonftp',
                            'value' => $package->getHasAnonymousFtp() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_sh_access',
                            'value' => $package->getHasShell() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_maillists',
                            'value' => $package->getMaxEmailLists() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'create_domains',
                            'value' => 'true',
                        ],
                        [
                            'name' => 'manage_phosting',
                            'value' => 'true',
                        ],
                        [
                            'name' => 'manage_quota',
                            'value' => $account->getReseller() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_not_chroot_shell',
                            'value' => $package->getHasShell() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_domain_aliases',
                            'value' => 'true',
                        ],
                        [
                            'name' => 'manage_subftp',
                            'value' => $package->getMaxFtp() ? 'true' : 'false',
                        ],
                        [
                            'name' => 'manage_spamfilter',
                            'value' => $package->getHasSpamFilter() ? 'true' : 'false',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Modifies the properties of a client account on the Plesk server.
     *
     * @param Server_Account $account the account for which the properties should be modified
     *
     * @return mixed the result of the API request to modify the client's properties
     */
    private function modifyClient(Server_Account $account): mixed
    {
        return $this->_client->customer()->setProperties('login', $account->getUsername(), $this->createClientProps($account));
    }

    /**
     * Creates an array of properties for a client account.
     * The properties include the client's company name, full name, username, password, telephone number, fax number, email address, address, city, and state.
     *
     * @param Server_Account $account the account for which the properties should be created
     *
     * @return array the array of client properties
     */
    private function createClientProps(Server_Account $account): array
    {
        $client = $account->getClient();

        return [
            'cname' => $client->getCompany(),
            'pname' => $client->getFullname(),
            'login' => $account->getUsername(),
            'passwd' => $account->getPassword(),
            'phone' => $client->getTelephone(),
            'fax' => $client->getFax(),
            'email' => $client->getEmail(),
            'address' => $client->getAddress1(),
            'city' => $client->getCity(),
            'state' => $client->getState(),
        ];
    }

    /**
     * Adds a nameserver (NS) record for a given account and domain ID.
     * This method is not yet implemented and currently always returns true.
     *
     * @param Server_Account $account  the account for which the NS record should be added
     * @param string         $domainId the ID of the domain for which the NS record should be added
     *
     * @return bool always returns true
     */
    private function addNs(Server_Account $account, string $domainId): bool
    {
        // Will be done in the future
        return true;
    }
}