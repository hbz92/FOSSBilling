<?php
/**
 * Admin API for Domain Management Module
 * 
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 */

namespace Box\Mod\Servicedomain\Api;

class Admin extends \Api_Abstract
{
    /**
     * Get module configuration
     */
    public function get_config()
    {
        return $this->di['mod_config']('Servicedomain');
    }

    /**
     * Update module configuration
     */
    public function update_config($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['config' => $data]);
        
        $config = $data['config'];
        
        // Validate required fields
        if (!isset($config['api_user']) || empty($config['api_user'])) {
            throw new \Box_Exception('API username is required');
        }
        
        if (!isset($config['api_password']) || empty($config['api_password'])) {
            throw new \Box_Exception('API password is required');
        }
        
        $this->di['mod_config']('Servicedomain', $config);
        
        $this->di['logger']->info('Updated Servicedomain configuration');
        
        return true;
    }

    /**
     * Get list of all domains
     */
    public function domain_list($data)
    {
        $per_page = $data['per_page'] ?? 30;
        $page = $data['page'] ?? 1;
        
        $pager = $this->di['pager'];
        $q = $this->di['table']('service_domain');
        
        // Apply filters
        if (isset($data['client_id'])) {
            $q->where('client_id = ?', $data['client_id']);
        }
        
        if (isset($data['status'])) {
            $q->where('status = ?', $data['status']);
        }
        
        if (isset($data['search'])) {
            $search = '%' . $data['search'] . '%';
            $q->where('(sld LIKE ? OR tld LIKE ? OR CONCAT(sld, ".", tld) LIKE ?)', 
                     $search, $search, $search);
        }
        
        if (isset($data['expiring_days'])) {
            $days = (int)$data['expiring_days'];
            $date = date('Y-m-d', strtotime("+$days days"));
            $q->where('expires_at <= ? AND expires_at >= ?', $date, date('Y-m-d'));
        }
        
        $q->order('created_at DESC');
        
        return $pager->getPaginatedQuery($q, $per_page, $page);
    }

    /**
     * Get domain details
     */
    public function domain_get($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $service = $this->getService();
        return $service->getDomain($data['id']);
    }

    /**
     * Create new domain
     */
    public function domain_create($data)
    {
        $required = ['sld', 'tld', 'period', 'client_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $service = $this->getService();
        return $service->registerDomain($data);
    }

    /**
     * Update domain
     */
    public function domain_update($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $domain = $this->di['db']->load('service_domain', $data['id']);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Update allowed fields
        $fields = [
            'auto_renew', 'notes', 'status',
            'contact_first_name', 'contact_last_name', 'contact_email',
            'contact_company', 'contact_address1', 'contact_address2',
            'contact_city', 'contact_state', 'contact_postcode',
            'contact_country', 'contact_phone', 'contact_phone_cc'
        ];
        
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $domain->$field = $data[$field];
            }
        }
        
        $domain->updated_at = date('Y-m-d H:i:s');
        $this->di['db']->store($domain);
        
        $this->di['logger']->info('Updated domain #%s', $data['id']);
        
        return true;
    }

    /**
     * Delete domain
     */
    public function domain_delete($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $domain = $this->di['db']->load('service_domain', $data['id']);
        if (!$domain) {
            throw new \Box_Exception('Domain not found');
        }
        
        // Delete related records
        $this->di['db']->exec('DELETE FROM service_domain_dns_record WHERE service_domain_id = ?', [$data['id']]);
        $this->di['db']->exec('DELETE FROM service_domain_dnssec WHERE service_domain_id = ?', [$data['id']]);
        $this->di['db']->exec('DELETE FROM service_domain_transfer WHERE service_domain_id = ?', [$data['id']]);
        
        // Delete domain
        $this->di['db']->trash($domain);
        
        $this->di['logger']->info('Deleted domain #%s', $data['id']);
        
        return true;
    }

    /**
     * Sync domain with registrar
     */
    public function domain_sync($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $service = $this->getService();
        return $service->syncDomain($data['id']);
    }

    /**
     * Sync all domains
     */
    public function sync_all()
    {
        $domains = $this->di['db']->find('service_domain', 'status = ?', ['active']);
        
        $service = $this->getService();
        $synced = 0;
        $failed = 0;
        
        foreach ($domains as $domain) {
            try {
                $service->syncDomain($domain->id);
                $synced++;
            } catch (\Exception $e) {
                $failed++;
                $this->di['logger']->error('Failed to sync domain #%s: %s', $domain->id, $e->getMessage());
            }
        }
        
        return [
            'synced' => $synced,
            'failed' => $failed,
            'total' => count($domains)
        ];
    }

    /**
     * Transfer domain
     */
    public function domain_transfer($data)
    {
        $required = ['domain', 'auth_code', 'client_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $service = $this->getService();
        return $service->transferDomain($data);
    }

    /**
     * Renew domain
     */
    public function domain_renew($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $period = $data['period'] ?? 1;
        
        $service = $this->getService();
        return $service->renewDomain($data['id'], $period);
    }

    /**
     * Get DNS records
     */
    public function dns_list($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->getDnsRecords($data['domain_id']);
    }

    /**
     * Add DNS record
     */
    public function dns_add($data)
    {
        $required = ['domain_id', 'type', 'name', 'value'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $service = $this->getService();
        return $service->addDnsRecord($data['domain_id'], $data);
    }

    /**
     * Update DNS record
     */
    public function dns_update($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $service = $this->getService();
        return $service->updateDnsRecord($data['id'], $data);
    }

    /**
     * Delete DNS record
     */
    public function dns_delete($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['id' => $data]);
        
        $service = $this->getService();
        return $service->deleteDnsRecord($data['id']);
    }

    /**
     * Enable DNSSEC
     */
    public function dnssec_enable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->enableDnssec($data['domain_id']);
    }

    /**
     * Disable DNSSEC
     */
    public function dnssec_disable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->disableDnssec($data['domain_id']);
    }

    /**
     * Get DNSSEC info
     */
    public function dnssec_info($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->getDnssecInfo($data['domain_id']);
    }

    /**
     * Lock domain
     */
    public function domain_lock($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->lockDomain($data['domain_id']);
    }

    /**
     * Unlock domain
     */
    public function domain_unlock($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->unlockDomain($data['domain_id']);
    }

    /**
     * Enable privacy protection
     */
    public function privacy_enable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->enablePrivacy($data['domain_id']);
    }

    /**
     * Disable privacy protection
     */
    public function privacy_disable($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->disablePrivacy($data['domain_id']);
    }

    /**
     * Get transfer code
     */
    public function get_transfer_code($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->getTransferCode($data['domain_id']);
    }

    /**
     * Update nameservers
     */
    public function nameservers_update($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id', 'nameservers' => $data]);
        
        if (!is_array($data['nameservers']) || count($data['nameservers']) < 2) {
            throw new \Box_Exception('At least 2 nameservers are required');
        }
        
        $service = $this->getService();
        return $service->updateNameservers($data['domain_id'], $data['nameservers']);
    }

    /**
     * Update contact information
     */
    public function contact_update($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['domain_id' => $data]);
        
        $service = $this->getService();
        return $service->updateContact($data['domain_id'], $data);
    }

    /**
     * Check domain availability
     */
    public function check_availability($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['sld', 'tld' => $data]);
        
        $service = $this->getService();
        return $service->checkAvailability($data['sld'], $data['tld']);
    }

    /**
     * Get domain suggestions
     */
    public function get_suggestions($data)
    {
        $this->di['validator']->checkRequiredParamsForArray(['keyword' => $data]);
        
        $tlds = $data['tlds'] ?? [];
        
        $service = $this->getService();
        return $service->getDomainSuggestions($data['keyword'], $tlds);
    }

    /**
     * Get TLD prices
     */
    public function get_tld_prices()
    {
        $service = $this->getService();
        return $service->getTldPrices();
    }

    /**
     * Get expiring domains
     */
    public function get_expiring_domains($data)
    {
        $days = $data['days'] ?? 30;
        $date = date('Y-m-d', strtotime("+$days days"));
        
        $domains = $this->di['db']->find('service_domain', 
            'expires_at <= ? AND expires_at >= ? AND status = ?', 
            [$date, date('Y-m-d'), 'active']
        );
        
        $result = [];
        foreach ($domains as $domain) {
            $client = $this->di['db']->load('client', $domain->client_id);
            $result[] = [
                'id' => $domain->id,
                'domain' => $domain->sld . '.' . $domain->tld,
                'expires_at' => $domain->expires_at,
                'days_until_expiry' => floor((strtotime($domain->expires_at) - time()) / 86400),
                'client' => $client ? $client->first_name . ' ' . $client->last_name : 'Unknown',
                'auto_renew' => (bool)$domain->auto_renew
            ];
        }
        
        return $result;
    }

    /**
     * Process auto renewals
     */
    public function process_auto_renewals()
    {
        $days_before = 30; // Renew 30 days before expiration
        $date = date('Y-m-d', strtotime("+$days_before days"));
        
        $domains = $this->di['db']->find('service_domain', 
            'expires_at <= ? AND auto_renew = 1 AND status = ?', 
            [$date, 'active']
        );
        
        $service = $this->getService();
        $renewed = 0;
        $failed = 0;
        
        foreach ($domains as $domain) {
            try {
                $service->renewDomain($domain->id, 1);
                $renewed++;
                $this->di['logger']->info('Auto-renewed domain #%s', $domain->id);
            } catch (\Exception $e) {
                $failed++;
                $this->di['logger']->error('Failed to auto-renew domain #%s: %s', 
                    $domain->id, $e->getMessage());
            }
        }
        
        return [
            'renewed' => $renewed,
            'failed' => $failed,
            'total' => count($domains)
        ];
    }

    /**
     * Get service instance
     */
    protected function getService()
    {
        return $this->di['mod_service']('Servicedomain');
    }
}