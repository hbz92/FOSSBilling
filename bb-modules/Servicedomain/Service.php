<?php
/**
 * FOSSBilling CentralNic Domain Management Module
 * Complete domain management with DNS, DNSSEC, and advanced features
 * 
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 */

namespace Box\Mod\Servicedomain;

use Box\InjectionAwareInterface;

class Service implements InjectionAwareInterface
{
    protected $di;

    public function setDi($di)
    {
        $this->di = $di;
    }

    public function getDi()
    {
        return $this->di;
    }

    /**
     * Install module
     */
    public function install()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `service_domain` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `client_id` bigint(20) DEFAULT NULL,
            `tld_registrar_id` bigint(20) DEFAULT NULL,
            `sld` varchar(255) DEFAULT NULL,
            `tld` varchar(100) DEFAULT NULL,
            `period` int(11) DEFAULT NULL,
            `registrar` varchar(100) DEFAULT NULL,
            `registered_at` varchar(35) DEFAULT NULL,
            `expires_at` varchar(35) DEFAULT NULL,
            `transfer_code` varchar(255) DEFAULT NULL,
            `privacy` tinyint(1) DEFAULT 0,
            `locked` tinyint(1) DEFAULT 0,
            `auto_renew` tinyint(1) DEFAULT 0,
            `dnssec_enabled` tinyint(1) DEFAULT 0,
            `dnssec_keys` text DEFAULT NULL,
            `contact_first_name` varchar(255) DEFAULT NULL,
            `contact_last_name` varchar(255) DEFAULT NULL,
            `contact_email` varchar(255) DEFAULT NULL,
            `contact_company` varchar(255) DEFAULT NULL,
            `contact_address1` varchar(255) DEFAULT NULL,
            `contact_address2` varchar(255) DEFAULT NULL,
            `contact_city` varchar(255) DEFAULT NULL,
            `contact_state` varchar(255) DEFAULT NULL,
            `contact_postcode` varchar(255) DEFAULT NULL,
            `contact_country` varchar(255) DEFAULT NULL,
            `contact_phone` varchar(255) DEFAULT NULL,
            `contact_phone_cc` varchar(10) DEFAULT NULL,
            `contact_fax` varchar(255) DEFAULT NULL,
            `contact_fax_cc` varchar(10) DEFAULT NULL,
            `ns1` varchar(255) DEFAULT NULL,
            `ns2` varchar(255) DEFAULT NULL,
            `ns3` varchar(255) DEFAULT NULL,
            `ns4` varchar(255) DEFAULT NULL,
            `notes` text DEFAULT NULL,
            `synced_at` varchar(35) DEFAULT NULL,
            `reseller_id` varchar(255) DEFAULT NULL,
            `status` varchar(50) DEFAULT 'pending',
            `created_at` datetime DEFAULT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `client_id` (`client_id`),
            KEY `tld_registrar_id` (`tld_registrar_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

        CREATE TABLE IF NOT EXISTS `service_domain_dns_record` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `service_domain_id` bigint(20) NOT NULL,
            `type` varchar(10) NOT NULL,
            `name` varchar(255) NOT NULL,
            `value` text NOT NULL,
            `ttl` int(11) DEFAULT 3600,
            `priority` int(11) DEFAULT NULL,
            `weight` int(11) DEFAULT NULL,
            `port` int(11) DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `service_domain_id` (`service_domain_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

        CREATE TABLE IF NOT EXISTS `service_domain_dnssec` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `service_domain_id` bigint(20) NOT NULL,
            `key_tag` int(11) NOT NULL,
            `algorithm` int(11) NOT NULL,
            `digest_type` int(11) NOT NULL,
            `digest` text NOT NULL,
            `flags` int(11) DEFAULT NULL,
            `protocol` int(11) DEFAULT NULL,
            `public_key` text DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `service_domain_id` (`service_domain_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

        CREATE TABLE IF NOT EXISTS `service_domain_transfer` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `service_domain_id` bigint(20) NOT NULL,
            `auth_code` varchar(255) DEFAULT NULL,
            `status` varchar(50) DEFAULT 'pending',
            `initiated_at` datetime DEFAULT NULL,
            `completed_at` datetime DEFAULT NULL,
            `notes` text DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `service_domain_id` (`service_domain_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
        ";
        
        $this->di['db']->exec($sql);
        
        // Create default configuration
        $this->di['mod_config']('Servicedomain', [
            'registrar' => 'centralnic',
            'test_mode' => false,
            'auto_sync' => true,
            'sync_interval' => 3600,
            'enable_dnssec' => true,
            'enable_privacy' => true,
            'enable_transfer_lock' => true,
            'default_nameservers' => [
                'ns1.centralnic-dns.com',
                'ns2.centralnic-dns.com',
                'ns3.centralnic-dns.com',
                'ns4.centralnic-dns.com'
            ]
        ]);
        
        return true;
    }

    /**
     * Uninstall module
     */
    public function uninstall()
    {
        $this->di['db']->exec("DROP TABLE IF EXISTS `service_domain`");
        $this->di['db']->exec("DROP TABLE IF EXISTS `service_domain_dns_record`");
        $this->di['db']->exec("DROP TABLE IF EXISTS `service_domain_dnssec`");
        $this->di['db']->exec("DROP TABLE IF EXISTS `service_domain_transfer`");
        
        return true;
    }

    /**
     * Get domain details
     */
    public function getDomain($id)
    {
        $sql = "SELECT * FROM service_domain WHERE id = :id";
        $domain = $this->di['db']->findOne('service_domain', 'id = ?', [$id]);
        
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get DNS records
        $domain['dns_records'] = $this->getDnsRecords($id);
        
        // Get DNSSEC info
        $domain['dnssec'] = $this->getDnssecInfo($id);
        
        return $domain;
    }

    /**
     * Register a new domain
     */
    public function registerDomain($data)
    {
        $required = ['sld', 'tld', 'period', 'client_id'];
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                throw new \Box_Exception("Field $field is required");
            }
        }

        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Prepare contact info
        $contact = $this->prepareContactInfo($data);
        
        // Register domain with registrar
        $result = $registrar->registerDomain(
            $data['sld'],
            $data['tld'],
            $data['period'],
            $contact,
            $data['ns'] ?? $this->getDefaultNameservers()
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Domain registration failed: ' . $result['error']);
        }
        
        // Save to database
        $domain = $this->di['db']->dispense('service_domain');
        $domain->client_id = $data['client_id'];
        $domain->sld = $data['sld'];
        $domain->tld = $data['tld'];
        $domain->period = $data['period'];
        $domain->registrar = 'centralnic';
        $domain->registered_at = date('Y-m-d H:i:s');
        $domain->expires_at = date('Y-m-d H:i:s', strtotime("+{$data['period']} years"));
        $domain->status = 'active';
        $domain->created_at = date('Y-m-d H:i:s');
        $domain->updated_at = date('Y-m-d H:i:s');
        
        // Save contact info
        foreach ($contact as $key => $value) {
            $field = 'contact_' . $key;
            if (property_exists($domain, $field)) {
                $domain->$field = $value;
            }
        }
        
        // Save nameservers
        if (isset($data['ns'])) {
            for ($i = 1; $i <= 4; $i++) {
                if (isset($data['ns'][$i-1])) {
                    $domain->{"ns$i"} = $data['ns'][$i-1];
                }
            }
        }
        
        $this->di['db']->store($domain);
        
        // Enable privacy if requested
        if (isset($data['privacy']) && $data['privacy']) {
            $this->enablePrivacy($domain->id);
        }
        
        // Enable DNSSEC if requested
        if (isset($data['dnssec']) && $data['dnssec']) {
            $this->enableDnssec($domain->id);
        }
        
        return $domain->id;
    }

    /**
     * Transfer domain
     */
    public function transferDomain($data)
    {
        $required = ['domain', 'auth_code', 'client_id'];
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                throw new \Box_Exception("Field $field is required");
            }
        }
        
        // Parse domain
        $parts = $this->parseDomain($data['domain']);
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Initiate transfer
        $result = $registrar->transferDomain(
            $parts['sld'],
            $parts['tld'],
            $data['auth_code']
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Domain transfer failed: ' . $result['error']);
        }
        
        // Save to database
        $domain = $this->di['db']->dispense('service_domain');
        $domain->client_id = $data['client_id'];
        $domain->sld = $parts['sld'];
        $domain->tld = $parts['tld'];
        $domain->registrar = 'centralnic';
        $domain->status = 'pending_transfer';
        $domain->created_at = date('Y-m-d H:i:s');
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        // Create transfer record
        $transfer = $this->di['db']->dispense('service_domain_transfer');
        $transfer->service_domain_id = $domain->id;
        $transfer->auth_code = $data['auth_code'];
        $transfer->status = 'pending';
        $transfer->initiated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($transfer);
        
        return $domain->id;
    }

    /**
     * Renew domain
     */
    public function renewDomain($id, $period = 1)
    {
        $domain = $this->di['db']->load('service_domain', $id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Renew domain
        $result = $registrar->renewDomain(
            $domain->sld,
            $domain->tld,
            $period
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Domain renewal failed: ' . $result['error']);
        }
        
        // Update expiration date
        $domain->expires_at = date('Y-m-d H:i:s', strtotime($domain->expires_at . " +$period years"));
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Get DNS records
     */
    public function getDnsRecords($domain_id)
    {
        return $this->di['db']->find('service_domain_dns_record', 'service_domain_id = ?', [$domain_id]);
    }

    /**
     * Add DNS record
     */
    public function addDnsRecord($domain_id, $data)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        $required = ['type', 'name', 'value'];
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                throw new \Box_Exception("Field $field is required");
            }
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Add DNS record via API
        $result = $registrar->addDnsRecord(
            $domain->sld . '.' . $domain->tld,
            $data['type'],
            $data['name'],
            $data['value'],
            $data['ttl'] ?? 3600,
            $data['priority'] ?? null
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to add DNS record: ' . $result['error']);
        }
        
        // Save to database
        $record = $this->di['db']->dispense('service_domain_dns_record');
        $record->service_domain_id = $domain_id;
        $record->type = $data['type'];
        $record->name = $data['name'];
        $record->value = $data['value'];
        $record->ttl = $data['ttl'] ?? 3600;
        $record->priority = $data['priority'] ?? null;
        $record->weight = $data['weight'] ?? null;
        $record->port = $data['port'] ?? null;
        $record->created_at = date('Y-m-d H:i:s');
        $record->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($record);
        
        return $record->id;
    }

    /**
     * Update DNS record
     */
    public function updateDnsRecord($record_id, $data)
    {
        $record = $this->di['db']->load('service_domain_dns_record', $record_id);
        if (!$record) {
            throw new \Box_Exception('DNS record not found');
        }
        
        $domain = $this->di['db']->load('service_domain', $record->service_domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Update DNS record via API
        $result = $registrar->updateDnsRecord(
            $domain->sld . '.' . $domain->tld,
            $record_id,
            $data['type'] ?? $record->type,
            $data['name'] ?? $record->name,
            $data['value'] ?? $record->value,
            $data['ttl'] ?? $record->ttl,
            $data['priority'] ?? $record->priority
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to update DNS record: ' . $result['error']);
        }
        
        // Update database
        foreach (['type', 'name', 'value', 'ttl', 'priority', 'weight', 'port'] as $field) {
            if (isset($data[$field])) {
                $record->$field = $data[$field];
            }
        }
        $record->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($record);
        
        return true;
    }

    /**
     * Delete DNS record
     */
    public function deleteDnsRecord($record_id)
    {
        $record = $this->di['db']->load('service_domain_dns_record', $record_id);
        if (!$record) {
            throw new \Box_Exception('DNS record not found');
        }
        
        $domain = $this->di['db']->load('service_domain', $record->service_domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Delete DNS record via API
        $result = $registrar->deleteDnsRecord(
            $domain->sld . '.' . $domain->tld,
            $record_id
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to delete DNS record: ' . $result['error']);
        }
        
        // Delete from database
        $this->di['db']->trash($record);
        
        return true;
    }

    /**
     * Enable DNSSEC
     */
    public function enableDnssec($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Enable DNSSEC via API
        $result = $registrar->enableDnssec(
            $domain->sld,
            $domain->tld
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to enable DNSSEC: ' . $result['error']);
        }
        
        // Update domain
        $domain->dnssec_enabled = 1;
        $domain->dnssec_keys = json_encode($result['keys'] ?? []);
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        // Save DNSSEC records
        if (isset($result['keys']) && is_array($result['keys'])) {
            foreach ($result['keys'] as $key) {
                $dnssec = $this->di['db']->dispense('service_domain_dnssec');
                $dnssec->service_domain_id = $domain_id;
                $dnssec->key_tag = $key['key_tag'] ?? 0;
                $dnssec->algorithm = $key['algorithm'] ?? 0;
                $dnssec->digest_type = $key['digest_type'] ?? 0;
                $dnssec->digest = $key['digest'] ?? '';
                $dnssec->flags = $key['flags'] ?? null;
                $dnssec->protocol = $key['protocol'] ?? null;
                $dnssec->public_key = $key['public_key'] ?? null;
                $dnssec->created_at = date('Y-m-d H:i:s');
                $dnssec->updated_at = date('Y-m-d H:i:s');
                
                $this->di['db']->store($dnssec);
            }
        }
        
        return true;
    }

    /**
     * Disable DNSSEC
     */
    public function disableDnssec($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Disable DNSSEC via API
        $result = $registrar->disableDnssec(
            $domain->sld,
            $domain->tld
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to disable DNSSEC: ' . $result['error']);
        }
        
        // Update domain
        $domain->dnssec_enabled = 0;
        $domain->dnssec_keys = null;
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        // Delete DNSSEC records
        $records = $this->di['db']->find('service_domain_dnssec', 'service_domain_id = ?', [$domain_id]);
        foreach ($records as $record) {
            $this->di['db']->trash($record);
        }
        
        return true;
    }

    /**
     * Get DNSSEC info
     */
    public function getDnssecInfo($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        return [
            'enabled' => (bool)$domain->dnssec_enabled,
            'keys' => $this->di['db']->find('service_domain_dnssec', 'service_domain_id = ?', [$domain_id])
        ];
    }

    /**
     * Lock domain
     */
    public function lockDomain($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Lock domain via API
        $result = $registrar->setTransferLock(
            $domain->sld,
            $domain->tld,
            true
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to lock domain: ' . $result['error']);
        }
        
        // Update domain
        $domain->locked = 1;
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Unlock domain
     */
    public function unlockDomain($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Unlock domain via API
        $result = $registrar->setTransferLock(
            $domain->sld,
            $domain->tld,
            false
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to unlock domain: ' . $result['error']);
        }
        
        // Update domain
        $domain->locked = 0;
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Enable privacy protection
     */
    public function enablePrivacy($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Enable privacy via API
        $result = $registrar->setPrivacy(
            $domain->sld,
            $domain->tld,
            true
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to enable privacy: ' . $result['error']);
        }
        
        // Update domain
        $domain->privacy = 1;
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Disable privacy protection
     */
    public function disablePrivacy($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Disable privacy via API
        $result = $registrar->setPrivacy(
            $domain->sld,
            $domain->tld,
            false
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to disable privacy: ' . $result['error']);
        }
        
        // Update domain
        $domain->privacy = 0;
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Get transfer code (EPP code)
     */
    public function getTransferCode($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Get transfer code via API
        $result = $registrar->getTransferCode(
            $domain->sld,
            $domain->tld
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to get transfer code: ' . $result['error']);
        }
        
        // Update domain
        $domain->transfer_code = $result['code'];
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return $result['code'];
    }

    /**
     * Update nameservers
     */
    public function updateNameservers($domain_id, $nameservers)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        if (!is_array($nameservers) || count($nameservers) < 2) {
            throw new \Box_Exception('At least 2 nameservers are required');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Update nameservers via API
        $result = $registrar->updateNameservers(
            $domain->sld,
            $domain->tld,
            $nameservers
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to update nameservers: ' . $result['error']);
        }
        
        // Update domain
        for ($i = 1; $i <= 4; $i++) {
            $field = "ns$i";
            $domain->$field = isset($nameservers[$i-1]) ? $nameservers[$i-1] : null;
        }
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Update contact information
     */
    public function updateContact($domain_id, $contact)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Update contact via API
        $result = $registrar->updateContact(
            $domain->sld,
            $domain->tld,
            $contact
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to update contact: ' . $result['error']);
        }
        
        // Update domain
        foreach ($contact as $key => $value) {
            $field = 'contact_' . $key;
            if (property_exists($domain, $field)) {
                $domain->$field = $value;
            }
        }
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Sync domain with registrar
     */
    public function syncDomain($domain_id)
    {
        $domain = $this->di['db']->load('service_domain', $domain_id);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Get domain info from registrar
        $result = $registrar->getDomainInfo(
            $domain->sld,
            $domain->tld
        );
        
        if (!$result['success']) {
            throw new \Box_Exception('Failed to sync domain: ' . $result['error']);
        }
        
        // Update domain with latest info
        $info = $result['data'];
        
        if (isset($info['status'])) {
            $domain->status = $info['status'];
        }
        if (isset($info['expires_at'])) {
            $domain->expires_at = $info['expires_at'];
        }
        if (isset($info['locked'])) {
            $domain->locked = $info['locked'] ? 1 : 0;
        }
        if (isset($info['privacy'])) {
            $domain->privacy = $info['privacy'] ? 1 : 0;
        }
        if (isset($info['nameservers'])) {
            for ($i = 1; $i <= 4; $i++) {
                $field = "ns$i";
                $domain->$field = isset($info['nameservers'][$i-1]) ? $info['nameservers'][$i-1] : null;
            }
        }
        
        $domain->synced_at = date('Y-m-d H:i:s');
        $domain->updated_at = date('Y-m-d H:i:s');
        
        $this->di['db']->store($domain);
        
        return true;
    }

    /**
     * Get registrar adapter
     */
    protected function getRegistrarAdapter()
    {
        $config = $this->di['mod_config']('Servicedomain');
        
        if ($config['registrar'] !== 'centralnic') {
            throw new \Box_Exception('Invalid registrar configured');
        }
        
        require_once __DIR__ . '/Registrar/Centralnic.php';
        
        $adapter = new \Box\Mod\Servicedomain\Registrar\Centralnic($config);
        $adapter->setDi($this->di);
        
        return $adapter;
    }

    /**
     * Parse domain name
     */
    protected function parseDomain($domain)
    {
        $parts = explode('.', $domain);
        if (count($parts) < 2) {
            throw new \Box_Exception('Invalid domain format');
        }
        
        $tld = array_pop($parts);
        $sld = implode('.', $parts);
        
        return [
            'sld' => $sld,
            'tld' => $tld
        ];
    }

    /**
     * Prepare contact information
     */
    protected function prepareContactInfo($data)
    {
        $contact = [];
        $fields = [
            'first_name', 'last_name', 'email', 'company',
            'address1', 'address2', 'city', 'state',
            'postcode', 'country', 'phone', 'phone_cc',
            'fax', 'fax_cc'
        ];
        
        foreach ($fields as $field) {
            if (isset($data['contact_' . $field])) {
                $contact[$field] = $data['contact_' . $field];
            } elseif (isset($data[$field])) {
                $contact[$field] = $data[$field];
            }
        }
        
        // Validate required contact fields
        $required = ['first_name', 'last_name', 'email', 'address1', 'city', 'country', 'phone'];
        foreach ($required as $field) {
            if (!isset($contact[$field]) || empty($contact[$field])) {
                throw new \Box_Exception("Contact field $field is required");
            }
        }
        
        return $contact;
    }

    /**
     * Get default nameservers
     */
    protected function getDefaultNameservers()
    {
        $config = $this->di['mod_config']('Servicedomain');
        return $config['default_nameservers'] ?? [
            'ns1.centralnic-dns.com',
            'ns2.centralnic-dns.com'
        ];
    }

    /**
     * Check domain availability
     */
    public function checkAvailability($sld, $tld)
    {
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Check availability via API
        $result = $registrar->checkAvailability($sld, $tld);
        
        return $result;
    }

    /**
     * Get domain suggestions
     */
    public function getDomainSuggestions($keyword, $tlds = [])
    {
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Get suggestions via API
        $result = $registrar->getDomainSuggestions($keyword, $tlds);
        
        return $result;
    }

    /**
     * Get TLD prices
     */
    public function getTldPrices()
    {
        // Get registrar adapter
        $registrar = $this->getRegistrarAdapter();
        
        // Get prices via API
        $result = $registrar->getTldPrices();
        
        return $result;
    }
}