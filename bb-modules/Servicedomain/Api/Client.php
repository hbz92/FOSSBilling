<?php
/**
 * Client API for Domain Management Module
 * 
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 */

namespace Box\Mod\Servicedomain\Api;

class Client extends \Api_Abstract
{
    /**
     * Get list of client's domains
     */
    public function get_list($data)
    {
        $client_id = $this->getIdentity()->id;
        
        $per_page = $data['per_page'] ?? 30;
        $page = $data['page'] ?? 1;
        
        $pager = $this->di['pager'];
        $q = $this->di['table']('service_domain');
        $q->where('client_id = ?', $client_id);
        
        // Apply filters
        if (isset($data['status'])) {
            $q->where('status = ?', $data['status']);
        }
        
        if (isset($data['search'])) {
            $search = '%' . $data['search'] . '%';
            $q->where('(sld LIKE ? OR tld LIKE ? OR CONCAT(sld, ".", tld) LIKE ?)', 
                     $search, $search, $search);
        }
        
        $q->order('created_at DESC');
        
        return $pager->getPaginatedQuery($q, $per_page, $page);
    }

    /**
     * Get domain details
     */
    public function get($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $domain = $this->_getDomain($data['id']);
        
        $service = $this->getService();
        return $service->getDomain($domain->id);
    }

    /**
     * Register new domain
     */
    public function register($data)
    {
        $required = ['sld', 'tld', 'period'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $data['client_id'] = $this->getIdentity()->id;
        
        // Get client info for contact details if not provided
        $client = $this->getIdentity();
        if (!isset($data['contact_first_name'])) {
            $data['contact_first_name'] = $client->first_name;
            $data['contact_last_name'] = $client->last_name;
            $data['contact_email'] = $client->email;
            $data['contact_company'] = $client->company;
            $data['contact_address1'] = $client->address_1;
            $data['contact_address2'] = $client->address_2;
            $data['contact_city'] = $client->city;
            $data['contact_state'] = $client->state;
            $data['contact_postcode'] = $client->postcode;
            $data['contact_country'] = $client->country;
            $data['contact_phone'] = $client->phone;
            $data['contact_phone_cc'] = $client->phone_cc;
        }
        
        $service = $this->getService();
        $domain_id = $service->registerDomain($data);
        
        return [
            'success' => true,
            'domain_id' => $domain_id,
            'message' => 'Domain registered successfully'
        ];
    }

    /**
     * Transfer domain
     */
    public function transfer($data)
    {
        $required = ['domain', 'auth_code'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $data['client_id'] = $this->getIdentity()->id;
        
        $service = $this->getService();
        $domain_id = $service->transferDomain($data);
        
        return [
            'success' => true,
            'domain_id' => $domain_id,
            'message' => 'Domain transfer initiated successfully'
        ];
    }

    /**
     * Renew domain
     */
    public function renew($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $domain = $this->_getDomain($data['id']);
        $period = $data['period'] ?? 1;
        
        $service = $this->getService();
        $service->renewDomain($domain->id, $period);
        
        return [
            'success' => true,
            'message' => "Domain renewed for $period year(s)"
        ];
    }

    /**
     * Get DNS records
     */
    public function dns_get_records($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        return $service->getDnsRecords($domain->id);
    }

    /**
     * Add DNS record
     */
    public function dns_add_record($data)
    {
        $required = ['domain_id', 'type', 'name', 'value'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        // Validate DNS record type
        $valid_types = ['A', 'AAAA', 'CNAME', 'MX', 'TXT', 'NS', 'SRV', 'CAA'];
        if (!in_array($data['type'], $valid_types)) {
            throw new \Box_Exception('Invalid DNS record type');
        }
        
        $service = $this->getService();
        $record_id = $service->addDnsRecord($domain->id, $data);
        
        return [
            'success' => true,
            'record_id' => $record_id,
            'message' => 'DNS record added successfully'
        ];
    }

    /**
     * Update DNS record
     */
    public function dns_update_record($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        // Verify ownership
        $record = $this->di['db']->load('service_domain_dns_record', $data['id']);
        if (!$record) {
            throw new \Box_Exception('DNS record not found');
        }
        
        $domain = $this->_getDomain($record->service_domain_id);
        
        $service = $this->getService();
        $service->updateDnsRecord($data['id'], $data);
        
        return [
            'success' => true,
            'message' => 'DNS record updated successfully'
        ];
    }

    /**
     * Delete DNS record
     */
    public function dns_delete_record($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        // Verify ownership
        $record = $this->di['db']->load('service_domain_dns_record', $data['id']);
        if (!$record) {
            throw new \Box_Exception('DNS record not found');
        }
        
        $domain = $this->_getDomain($record->service_domain_id);
        
        $service = $this->getService();
        $service->deleteDnsRecord($data['id']);
        
        return [
            'success' => true,
            'message' => 'DNS record deleted successfully'
        ];
    }

    /**
     * Enable DNSSEC
     */
    public function dnssec_enable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $service->enableDnssec($domain->id);
        
        return [
            'success' => true,
            'message' => 'DNSSEC enabled successfully'
        ];
    }

    /**
     * Disable DNSSEC
     */
    public function dnssec_disable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $service->disableDnssec($domain->id);
        
        return [
            'success' => true,
            'message' => 'DNSSEC disabled successfully'
        ];
    }

    /**
     * Get DNSSEC info
     */
    public function dnssec_get_info($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        return $service->getDnssecInfo($domain->id);
    }

    /**
     * Lock domain
     */
    public function lock($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $service->lockDomain($domain->id);
        
        return [
            'success' => true,
            'message' => 'Domain locked successfully'
        ];
    }

    /**
     * Unlock domain
     */
    public function unlock($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $service->unlockDomain($domain->id);
        
        return [
            'success' => true,
            'message' => 'Domain unlocked successfully'
        ];
    }

    /**
     * Enable privacy protection
     */
    public function privacy_enable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $service->enablePrivacy($domain->id);
        
        return [
            'success' => true,
            'message' => 'Privacy protection enabled successfully'
        ];
    }

    /**
     * Disable privacy protection
     */
    public function privacy_disable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $service->disablePrivacy($domain->id);
        
        return [
            'success' => true,
            'message' => 'Privacy protection disabled successfully'
        ];
    }

    /**
     * Get transfer code
     */
    public function get_transfer_code($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $service = $this->getService();
        $code = $service->getTransferCode($domain->id);
        
        return [
            'success' => true,
            'transfer_code' => $code
        ];
    }

    /**
     * Update nameservers
     */
    public function update_nameservers($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id', 'nameservers' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        if (!is_array($data['nameservers']) || count($data['nameservers']) < 2) {
            throw new \Box_Exception('At least 2 nameservers are required');
        }
        
        // Validate nameserver format
        foreach ($data['nameservers'] as $ns) {
            if (!filter_var($ns, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)) {
                throw new \Box_Exception("Invalid nameserver format: $ns");
            }
        }
        
        $service = $this->getService();
        $service->updateNameservers($domain->id, $data['nameservers']);
        
        return [
            'success' => true,
            'message' => 'Nameservers updated successfully'
        ];
    }

    /**
     * Update contact information
     */
    public function update_contact($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        // Validate email if provided
        if (isset($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Box_Exception('Invalid email address');
        }
        
        $service = $this->getService();
        $service->updateContact($domain->id, $data);
        
        return [
            'success' => true,
            'message' => 'Contact information updated successfully'
        ];
    }

    /**
     * Enable auto-renewal
     */
    public function enable_auto_renew($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $domain->auto_renew = 1;
        $domain->updated_at = date('Y-m-d H:i:s');
        $this->di['db']->store($domain);
        
        return [
            'success' => true,
            'message' => 'Auto-renewal enabled successfully'
        ];
    }

    /**
     * Disable auto-renewal
     */
    public function disable_auto_renew($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $domain = $this->_getDomain($data['domain_id']);
        
        $domain->auto_renew = 0;
        $domain->updated_at = date('Y-m-d H:i:s');
        $this->di['db']->store($domain);
        
        return [
            'success' => true,
            'message' => 'Auto-renewal disabled successfully'
        ];
    }

    /**
     * Check domain availability
     */
    public function check_availability($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain' => $data]);
        
        // Parse domain
        $parts = explode('.', $data['domain']);
        if (count($parts) < 2) {
            throw new \Box_Exception('Invalid domain format');
        }
        
        $tld = array_pop($parts);
        $sld = implode('.', $parts);
        
        $service = $this->getService();
        return $service->checkAvailability($sld, $tld);
    }

    /**
     * Get domain suggestions
     */
    public function get_suggestions($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['keyword' => $data]);
        
        $tlds = $data['tlds'] ?? ['com', 'net', 'org', 'info', 'biz'];
        
        $service = $this->getService();
        return $service->getDomainSuggestions($data['keyword'], $tlds);
    }

    /**
     * Get TLD prices
     */
    public function get_tld_prices()
    {
        $service = $this->getService();
        $prices = $service->getTldPrices();
        
        // Filter to show only available TLDs
        $config = $this->di['mod_config']('Servicedomain');
        if (isset($config['available_tlds']) && is_array($config['available_tlds'])) {
            $prices['prices'] = array_intersect_key(
                $prices['prices'], 
                array_flip($config['available_tlds'])
            );
        }
        
        return $prices;
    }

    /**
     * Get domain by ID and verify ownership
     */
    protected function _getDomain($id)
    {
        $domain = $this->di['db']->load('service_domain', $id);
        
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        if ($domain->client_id != $this->getIdentity()->id) {
            throw new \Box_Exception('You do not have permission to access this domain');
        }
        
        return $domain;
    }

    /**
     * Get service instance
     */
    protected function getService()
    {
        return $this->di['mod_service']('Servicedomain');
    }
}