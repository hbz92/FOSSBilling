<?php
/**
 * CentralNic Reseller API Adapter for FOSSBilling
 * 
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 */

namespace Box\Mod\Servicedomain\Registrar;

class Centralnic
{
    protected $config;
    protected $di;
    protected $api_url;
    protected $api_user;
    protected $api_password;
    protected $test_mode;
    protected $session_id;

    public function __construct($config)
    {
        $this->config = $config;
        $this->test_mode = $config['test_mode'] ?? false;
        
        if ($this->test_mode) {
            $this->api_url = 'https://api-ote.rrpproxy.net/api/call.cgi';
            $this->api_user = $config['test_api_user'] ?? '';
            $this->api_password = $config['test_api_password'] ?? '';
        } else {
            $this->api_url = 'https://api.rrpproxy.net/api/call.cgi';
            $this->api_user = $config['api_user'] ?? '';
            $this->api_password = $config['api_password'] ?? '';
        }
    }

    public function setDi($di)
    {
        $this->di = $di;
    }

    /**
     * Execute API command
     */
    protected function executeCommand($command, $params = [])
    {
        // Login if no session
        if (!$this->session_id) {
            $this->login();
        }
        
        // Prepare request
        $data = [
            's_login' => $this->api_user,
            's_pw' => $this->api_password,
            'command' => $command
        ];
        
        if ($this->session_id) {
            $data['s_session'] = $this->session_id;
        }
        
        // Add command parameters
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $i => $v) {
                    $data[$key . $i] = $v;
                }
            } else {
                $data[$key] = $value;
            }
        }
        
        // Execute request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($error) {
            throw new \Exception('API request failed: ' . $error);
        }
        
        // Parse response
        $result = $this->parseResponse($response);
        
        // Check for errors
        if ($result['code'] !== 200 && $result['code'] !== 218) {
            throw new \Exception('API error: ' . ($result['description'] ?? 'Unknown error'));
        }
        
        return $result;
    }

    /**
     * Parse API response
     */
    protected function parseResponse($response)
    {
        $lines = explode("\n", $response);
        $result = [
            'code' => 0,
            'description' => '',
            'properties' => []
        ];
        
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || $line === '[EOF]') {
                continue;
            }
            
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                if ($key === 'CODE') {
                    $result['code'] = (int)$value;
                } elseif ($key === 'DESCRIPTION') {
                    $result['description'] = $value;
                } else {
                    // Handle array properties
                    if (preg_match('/^PROPERTY\[([^\]]+)\]\[(\d+)\]$/', $key, $matches)) {
                        $prop_name = $matches[1];
                        $prop_index = (int)$matches[2];
                        
                        if (!isset($result['properties'][$prop_name])) {
                            $result['properties'][$prop_name] = [];
                        }
                        $result['properties'][$prop_name][$prop_index] = $value;
                    } else {
                        $result['properties'][$key] = $value;
                    }
                }
            }
        }
        
        return $result;
    }

    /**
     * Login to API
     */
    protected function login()
    {
        $result = $this->executeCommand('StartSession');
        
        if (isset($result['properties']['SESSION'])) {
            $this->session_id = $result['properties']['SESSION'];
        }
        
        return true;
    }

    /**
     * Check domain availability
     */
    public function checkAvailability($sld, $tld)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $result = $this->executeCommand('CheckDomain', [
                'DOMAIN' => $domain
            ]);
            
            $available = isset($result['properties']['DOMAINCHECK']) 
                && $result['properties']['DOMAINCHECK'] === '210 Domain name available';
            
            return [
                'success' => true,
                'available' => $available,
                'domain' => $domain,
                'price' => $this->getDomainPrice($tld)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Register domain
     */
    public function registerDomain($sld, $tld, $period, $contact, $nameservers)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            // Prepare contact handles
            $contact_handle = $this->createContact($contact);
            
            // Prepare parameters
            $params = [
                'DOMAIN' => $domain,
                'PERIOD' => $period,
                'OWNERCONTACT0' => $contact_handle,
                'ADMINCONTACT0' => $contact_handle,
                'TECHCONTACT0' => $contact_handle,
                'BILLINGCONTACT0' => $contact_handle
            ];
            
            // Add nameservers
            foreach ($nameservers as $i => $ns) {
                $params['NAMESERVER' . $i] = $ns;
            }
            
            // Add X-CLASS for specific TLDs if needed
            if (in_array($tld, ['de', 'eu', 'be', 'uk'])) {
                $params['X-' . strtoupper($tld) . '-ACCEPT-TRUSTEE'] = 1;
            }
            
            // Execute registration
            $result = $this->executeCommand('AddDomain', $params);
            
            return [
                'success' => true,
                'domain' => $domain,
                'expires' => date('Y-m-d', strtotime("+$period years"))
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Transfer domain
     */
    public function transferDomain($sld, $tld, $auth_code)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $params = [
                'DOMAIN' => $domain,
                'AUTH' => $auth_code,
                'ACTION' => 'REQUEST'
            ];
            
            $result = $this->executeCommand('TransferDomain', $params);
            
            return [
                'success' => true,
                'domain' => $domain,
                'transfer_id' => $result['properties']['TRANSFERID'] ?? null
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Renew domain
     */
    public function renewDomain($sld, $tld, $period)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $params = [
                'DOMAIN' => $domain,
                'PERIOD' => $period,
                'EXPIRATION' => 'DEFAULT'
            ];
            
            $result = $this->executeCommand('RenewDomain', $params);
            
            return [
                'success' => true,
                'domain' => $domain,
                'expires' => $result['properties']['EXPIRATIONDATE'] ?? null
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get domain info
     */
    public function getDomainInfo($sld, $tld)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $result = $this->executeCommand('StatusDomain', [
                'DOMAIN' => $domain
            ]);
            
            $props = $result['properties'];
            
            // Parse status
            $status = 'active';
            if (isset($props['STATUS'])) {
                if (strpos($props['STATUS'], 'LOCK') !== false) {
                    $locked = true;
                }
                if (strpos($props['STATUS'], 'HOLD') !== false) {
                    $status = 'suspended';
                }
            }
            
            return [
                'success' => true,
                'data' => [
                    'domain' => $domain,
                    'status' => $status,
                    'created_at' => $props['CREATEDDATE'] ?? null,
                    'expires_at' => $props['EXPIRATIONDATE'] ?? null,
                    'updated_at' => $props['UPDATEDDATE'] ?? null,
                    'locked' => $locked ?? false,
                    'privacy' => isset($props['X-WHOIS-PRIVACY']) && $props['X-WHOIS-PRIVACY'] === '1',
                    'nameservers' => $this->extractNameservers($props),
                    'auth_code' => $props['AUTH'] ?? null
                ]
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Update nameservers
     */
    public function updateNameservers($sld, $tld, $nameservers)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $params = ['DOMAIN' => $domain];
            
            // Add new nameservers
            foreach ($nameservers as $i => $ns) {
                $params['NAMESERVER' . $i] = $ns;
            }
            
            // Clear old nameservers
            for ($i = count($nameservers); $i < 6; $i++) {
                $params['NAMESERVER' . $i] = '';
            }
            
            $result = $this->executeCommand('ModifyDomain', $params);
            
            return [
                'success' => true,
                'nameservers' => $nameservers
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Set transfer lock
     */
    public function setTransferLock($sld, $tld, $lock)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $command = $lock ? 'SetDomainTransferLock' : 'UnsetDomainTransferLock';
            
            $result = $this->executeCommand($command, [
                'DOMAIN' => $domain
            ]);
            
            return [
                'success' => true,
                'locked' => $lock
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Set privacy protection
     */
    public function setPrivacy($sld, $tld, $enable)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            $params = [
                'DOMAIN' => $domain,
                'X-WHOIS-PRIVACY' => $enable ? '1' : '0'
            ];
            
            $result = $this->executeCommand('ModifyDomain', $params);
            
            return [
                'success' => true,
                'privacy' => $enable
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get transfer code
     */
    public function getTransferCode($sld, $tld)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            // First, unlock the domain if needed
            $this->setTransferLock($sld, $tld, false);
            
            // Get domain info with auth code
            $result = $this->executeCommand('StatusDomain', [
                'DOMAIN' => $domain
            ]);
            
            $auth_code = $result['properties']['AUTH'] ?? null;
            
            if (!$auth_code) {
                // Try to request new auth code
                $result = $this->executeCommand('RequestDomainAuthInfo', [
                    'DOMAIN' => $domain
                ]);
                
                $auth_code = $result['properties']['AUTH'] ?? 'Contact support for auth code';
            }
            
            return [
                'success' => true,
                'code' => $auth_code
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * DNS Management Functions
     */
    
    /**
     * Get DNS zone
     */
    public function getDnsZone($domain)
    {
        try {
            $result = $this->executeCommand('QueryDNSZone', [
                'DOMAIN' => $domain
            ]);
            
            $records = [];
            if (isset($result['properties']['RR'])) {
                foreach ($result['properties']['RR'] as $rr) {
                    $parts = explode(' ', $rr);
                    $records[] = [
                        'name' => $parts[0] ?? '',
                        'ttl' => $parts[1] ?? 3600,
                        'type' => $parts[3] ?? '',
                        'value' => implode(' ', array_slice($parts, 4))
                    ];
                }
            }
            
            return [
                'success' => true,
                'records' => $records
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Add DNS record
     */
    public function addDnsRecord($domain, $type, $name, $value, $ttl = 3600, $priority = null)
    {
        try {
            // Format record
            $record = $this->formatDnsRecord($name, $ttl, $type, $value, $priority);
            
            $result = $this->executeCommand('UpdateDNSZone', [
                'DOMAIN' => $domain,
                'ADDRR0' => $record
            ]);
            
            return [
                'success' => true,
                'record' => $record
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Update DNS record
     */
    public function updateDnsRecord($domain, $record_id, $type, $name, $value, $ttl = 3600, $priority = null)
    {
        try {
            // Get current zone
            $zone = $this->getDnsZone($domain);
            
            if (!$zone['success']) {
                throw new \Exception('Failed to get DNS zone');
            }
            
            // Find and update record
            $records = $zone['records'];
            if (isset($records[$record_id])) {
                $old_record = $this->formatDnsRecord(
                    $records[$record_id]['name'],
                    $records[$record_id]['ttl'],
                    $records[$record_id]['type'],
                    $records[$record_id]['value'],
                    $records[$record_id]['priority'] ?? null
                );
                
                $new_record = $this->formatDnsRecord($name, $ttl, $type, $value, $priority);
                
                $result = $this->executeCommand('UpdateDNSZone', [
                    'DOMAIN' => $domain,
                    'DELRR0' => $old_record,
                    'ADDRR0' => $new_record
                ]);
                
                return [
                    'success' => true,
                    'record' => $new_record
                ];
            }
            
            throw new \Exception('Record not found');
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Delete DNS record
     */
    public function deleteDnsRecord($domain, $record_id)
    {
        try {
            // Get current zone
            $zone = $this->getDnsZone($domain);
            
            if (!$zone['success']) {
                throw new \Exception('Failed to get DNS zone');
            }
            
            // Find and delete record
            $records = $zone['records'];
            if (isset($records[$record_id])) {
                $record = $this->formatDnsRecord(
                    $records[$record_id]['name'],
                    $records[$record_id]['ttl'],
                    $records[$record_id]['type'],
                    $records[$record_id]['value'],
                    $records[$record_id]['priority'] ?? null
                );
                
                $result = $this->executeCommand('UpdateDNSZone', [
                    'DOMAIN' => $domain,
                    'DELRR0' => $record
                ]);
                
                return ['success' => true];
            }
            
            throw new \Exception('Record not found');
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * DNSSEC Management
     */
    
    /**
     * Enable DNSSEC
     */
    public function enableDnssec($sld, $tld)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            // Generate DNSSEC keys
            $result = $this->executeCommand('CreateDNSSECKey', [
                'DOMAIN' => $domain
            ]);
            
            // Get generated keys
            $keys = [];
            if (isset($result['properties']['KEYTAG'])) {
                $keys[] = [
                    'key_tag' => $result['properties']['KEYTAG'],
                    'algorithm' => $result['properties']['ALGORITHM'] ?? 8,
                    'digest_type' => $result['properties']['DIGESTTYPE'] ?? 2,
                    'digest' => $result['properties']['DIGEST'] ?? '',
                    'flags' => $result['properties']['FLAGS'] ?? 257,
                    'protocol' => $result['properties']['PROTOCOL'] ?? 3,
                    'public_key' => $result['properties']['PUBKEY'] ?? ''
                ];
            }
            
            // Add DNSSEC records to parent zone
            $params = [
                'DOMAIN' => $domain,
                'SECDNS-MAXSIGLIFE' => 1209600
            ];
            
            foreach ($keys as $i => $key) {
                $params['SECDNS-DS' . $i] = sprintf(
                    '%d %d %d %s',
                    $key['key_tag'],
                    $key['algorithm'],
                    $key['digest_type'],
                    $key['digest']
                );
            }
            
            $result = $this->executeCommand('ModifyDomain', $params);
            
            return [
                'success' => true,
                'keys' => $keys
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Disable DNSSEC
     */
    public function disableDnssec($sld, $tld)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            // Remove all DNSSEC records
            $result = $this->executeCommand('ModifyDomain', [
                'DOMAIN' => $domain,
                'SECDNS-DS0' => ''
            ]);
            
            return ['success' => true];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Contact Management
     */
    
    /**
     * Create contact
     */
    protected function createContact($contact)
    {
        try {
            $params = [
                'FIRSTNAME' => $contact['first_name'],
                'LASTNAME' => $contact['last_name'],
                'ORGANIZATION' => $contact['company'] ?? '',
                'STREET' => $contact['address1'],
                'CITY' => $contact['city'],
                'STATE' => $contact['state'] ?? '',
                'ZIP' => $contact['postcode'] ?? '',
                'COUNTRY' => $contact['country'],
                'PHONE' => $this->formatPhone($contact['phone'], $contact['phone_cc'] ?? ''),
                'FAX' => $this->formatPhone($contact['fax'] ?? '', $contact['fax_cc'] ?? ''),
                'EMAIL' => $contact['email']
            ];
            
            if (!empty($contact['address2'])) {
                $params['STREET1'] = $contact['address2'];
            }
            
            $result = $this->executeCommand('AddContact', $params);
            
            return $result['properties']['CONTACT'] ?? null;
        } catch (\Exception $e) {
            // If contact creation fails, use default contact
            return 'DEFAULT';
        }
    }

    /**
     * Update contact
     */
    public function updateContact($sld, $tld, $contact)
    {
        $domain = $sld . '.' . $tld;
        
        try {
            // Get current domain info
            $info = $this->getDomainInfo($sld, $tld);
            
            if (!$info['success']) {
                throw new \Exception('Failed to get domain info');
            }
            
            // Create new contact
            $contact_handle = $this->createContact($contact);
            
            // Update domain contacts
            $result = $this->executeCommand('ModifyDomain', [
                'DOMAIN' => $domain,
                'OWNERCONTACT0' => $contact_handle,
                'ADMINCONTACT0' => $contact_handle,
                'TECHCONTACT0' => $contact_handle,
                'BILLINGCONTACT0' => $contact_handle
            ]);
            
            return ['success' => true];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Utility Functions
     */
    
    /**
     * Format DNS record
     */
    protected function formatDnsRecord($name, $ttl, $type, $value, $priority = null)
    {
        $record = "$name $ttl IN $type";
        
        if ($type === 'MX' && $priority !== null) {
            $record .= " $priority";
        }
        
        $record .= " $value";
        
        return $record;
    }

    /**
     * Format phone number
     */
    protected function formatPhone($phone, $cc = '')
    {
        if (empty($phone)) {
            return '';
        }
        
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Add country code if provided
        if (!empty($cc)) {
            $phone = '+' . $cc . '.' . $phone;
        } elseif (substr($phone, 0, 1) !== '+') {
            $phone = '+1.' . $phone; // Default to US
        }
        
        return $phone;
    }

    /**
     * Extract nameservers from properties
     */
    protected function extractNameservers($properties)
    {
        $nameservers = [];
        
        for ($i = 0; $i < 6; $i++) {
            if (isset($properties['NAMESERVER' . $i])) {
                $nameservers[] = $properties['NAMESERVER' . $i];
            }
        }
        
        return $nameservers;
    }

    /**
     * Get domain price
     */
    protected function getDomainPrice($tld)
    {
        try {
            $result = $this->executeCommand('QueryPriceList', [
                'TLD' => $tld
            ]);
            
            if (isset($result['properties']['PRICE'])) {
                return [
                    'register' => $result['properties']['PRICE']['REGISTER'] ?? 0,
                    'renew' => $result['properties']['PRICE']['RENEW'] ?? 0,
                    'transfer' => $result['properties']['PRICE']['TRANSFER'] ?? 0
                ];
            }
        } catch (\Exception $e) {
            // Return default prices if API fails
        }
        
        return [
            'register' => 15.00,
            'renew' => 15.00,
            'transfer' => 15.00
        ];
    }

    /**
     * Get domain suggestions
     */
    public function getDomainSuggestions($keyword, $tlds = [])
    {
        try {
            $params = [
                'KEYWORD' => $keyword,
                'SOURCE' => 'ISPAPI-SUGGESTIONS'
            ];
            
            if (!empty($tlds)) {
                foreach ($tlds as $i => $tld) {
                    $params['TLD' . $i] = $tld;
                }
            }
            
            $result = $this->executeCommand('QueryDomainSuggestionList', $params);
            
            $suggestions = [];
            if (isset($result['properties']['DOMAIN'])) {
                foreach ($result['properties']['DOMAIN'] as $domain) {
                    $suggestions[] = [
                        'domain' => $domain,
                        'available' => true,
                        'price' => $this->getDomainPrice(substr($domain, strrpos($domain, '.') + 1))
                    ];
                }
            }
            
            return [
                'success' => true,
                'suggestions' => $suggestions
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get TLD prices
     */
    public function getTldPrices()
    {
        try {
            $result = $this->executeCommand('QueryTLDList');
            
            $prices = [];
            if (isset($result['properties']['TLD'])) {
                foreach ($result['properties']['TLD'] as $tld) {
                    $price_info = $this->getDomainPrice($tld);
                    $prices[$tld] = $price_info;
                }
            }
            
            return [
                'success' => true,
                'prices' => $prices
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}