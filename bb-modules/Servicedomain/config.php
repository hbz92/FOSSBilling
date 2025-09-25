<?php
/**
 * Domain Management Module Configuration
 * 
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 */

return [
    /**
     * Module information
     */
    'module' => [
        'name' => 'Domain Management',
        'description' => 'Complete domain management with CentralNic Reseller',
        'version' => '1.0.0',
        'author' => 'FOSSBilling',
        'website' => 'https://fossbilling.org'
    ],
    
    /**
     * Default configuration
     */
    'defaults' => [
        // API Settings
        'registrar' => 'centralnic',
        'test_mode' => false,
        'api_user' => '',
        'api_password' => '',
        'test_api_user' => '',
        'test_api_password' => '',
        
        // Sync Settings
        'auto_sync' => true,
        'sync_interval' => 3600, // 1 hour
        'sync_batch_size' => 50,
        
        // Feature Settings
        'enable_dnssec' => true,
        'enable_privacy' => true,
        'enable_transfer_lock' => true,
        'enable_auto_renew' => true,
        
        // DNS Settings
        'enable_dns_management' => true,
        'default_ttl' => 3600,
        'min_ttl' => 300,
        'max_ttl' => 86400,
        
        // Default Nameservers
        'default_nameservers' => [
            'ns1.centralnic-dns.com',
            'ns2.centralnic-dns.com',
            'ns3.centralnic-dns.com',
            'ns4.centralnic-dns.com'
        ],
        
        // Available TLDs
        'available_tlds' => [
            'com', 'net', 'org', 'info', 'biz', 'co', 'io', 
            'me', 'tv', 'xyz', 'online', 'store', 'site',
            'tech', 'app', 'dev', 'cloud', 'digital'
        ],
        
        // Pricing markup (percentage)
        'price_markup' => 20,
        
        // Auto-renewal Settings
        'auto_renew_days_before' => 30,
        'auto_renew_min_days' => 7,
        
        // Notification Settings
        'notify_expiring_days' => [60, 30, 14, 7, 1],
        'notify_transfer_status' => true,
        'notify_dns_changes' => false,
        
        // Security Settings
        'require_transfer_lock' => true,
        'auto_lock_after_transfer' => true,
        'enable_whois_privacy_by_default' => true,
        
        // Limits
        'max_domains_per_client' => 0, // 0 = unlimited
        'max_dns_records_per_domain' => 100,
        'max_nameservers' => 4,
        
        // Cache Settings
        'cache_ttl' => 300, // 5 minutes
        'cache_availability_checks' => true,
        'cache_tld_prices' => true,
        
        // Debug Settings
        'debug' => false,
        'log_api_calls' => false,
        'log_file' => '/var/log/fossbilling/servicedomain.log'
    ],
    
    /**
     * DNS Record Types Configuration
     */
    'dns_record_types' => [
        'A' => [
            'name' => 'A Record',
            'description' => 'IPv4 Address',
            'validation' => 'ipv4',
            'example' => '192.168.1.1'
        ],
        'AAAA' => [
            'name' => 'AAAA Record',
            'description' => 'IPv6 Address',
            'validation' => 'ipv6',
            'example' => '2001:db8::1'
        ],
        'CNAME' => [
            'name' => 'CNAME Record',
            'description' => 'Canonical Name',
            'validation' => 'domain',
            'example' => 'example.com'
        ],
        'MX' => [
            'name' => 'MX Record',
            'description' => 'Mail Exchange',
            'validation' => 'domain',
            'has_priority' => true,
            'example' => 'mail.example.com'
        ],
        'TXT' => [
            'name' => 'TXT Record',
            'description' => 'Text Record',
            'validation' => 'text',
            'max_length' => 255,
            'example' => 'v=spf1 mx ~all'
        ],
        'NS' => [
            'name' => 'NS Record',
            'description' => 'Name Server',
            'validation' => 'domain',
            'example' => 'ns1.example.com'
        ],
        'SRV' => [
            'name' => 'SRV Record',
            'description' => 'Service Record',
            'validation' => 'srv',
            'has_priority' => true,
            'has_weight' => true,
            'has_port' => true,
            'example' => '_service._proto.name'
        ],
        'CAA' => [
            'name' => 'CAA Record',
            'description' => 'Certificate Authority Authorization',
            'validation' => 'caa',
            'example' => '0 issue "ca.example.com"'
        ]
    ],
    
    /**
     * DNSSEC Configuration
     */
    'dnssec' => [
        'algorithms' => [
            8 => 'RSA/SHA-256',
            10 => 'RSA/SHA-512',
            13 => 'ECDSA Curve P-256 with SHA-256',
            14 => 'ECDSA Curve P-384 with SHA-384'
        ],
        'digest_types' => [
            1 => 'SHA-1',
            2 => 'SHA-256',
            3 => 'GOST R 34.11-94',
            4 => 'SHA-384'
        ],
        'default_algorithm' => 8,
        'default_digest_type' => 2,
        'key_size' => 2048,
        'signature_lifetime' => 1209600 // 14 days
    ],
    
    /**
     * Email Templates
     */
    'email_templates' => [
        'domain_registered' => [
            'subject' => 'Domain Registration Successful',
            'template' => 'domain_registered'
        ],
        'domain_transferred' => [
            'subject' => 'Domain Transfer Completed',
            'template' => 'domain_transferred'
        ],
        'domain_renewed' => [
            'subject' => 'Domain Renewal Successful',
            'template' => 'domain_renewed'
        ],
        'domain_expiring' => [
            'subject' => 'Domain Expiring Soon',
            'template' => 'domain_expiring'
        ],
        'transfer_approved' => [
            'subject' => 'Domain Transfer Approved',
            'template' => 'transfer_approved'
        ],
        'dns_updated' => [
            'subject' => 'DNS Records Updated',
            'template' => 'dns_updated'
        ]
    ],
    
    /**
     * Hooks Configuration
     */
    'hooks' => [
        'after_domain_register' => [],
        'after_domain_transfer' => [],
        'after_domain_renew' => [],
        'before_domain_expire' => [],
        'after_dns_update' => [],
        'after_dnssec_enable' => []
    ],
    
    /**
     * API Rate Limiting
     */
    'rate_limits' => [
        'availability_checks' => [
            'requests' => 100,
            'period' => 60 // seconds
        ],
        'dns_updates' => [
            'requests' => 50,
            'period' => 60
        ],
        'domain_operations' => [
            'requests' => 20,
            'period' => 60
        ]
    ],
    
    /**
     * Validation Rules
     */
    'validation' => [
        'domain_name' => '/^[a-zA-Z0-9][a-zA-Z0-9-]{0,61}[a-zA-Z0-9]?$/',
        'nameserver' => '/^[a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(\.[a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/',
        'auth_code' => '/^[a-zA-Z0-9\-\_\!\@\#\$\%\^\&\*\(\)]{6,32}$/',
        'ipv4' => '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/',
        'ipv6' => '/^(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))$/'
    ]
];