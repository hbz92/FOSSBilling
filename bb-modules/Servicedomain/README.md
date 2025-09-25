# FOSSBilling Domain Management Module

A comprehensive domain management module for FOSSBilling with CentralNic Reseller integration.

## Features

### Domain Management
- Domain registration with real-time availability checking
- Domain transfer with auth code validation
- Domain renewal (manual and automatic)
- Bulk domain management
- Domain suggestions and alternative TLD recommendations

### DNS Management
- Complete DNS record management (A, AAAA, CNAME, MX, TXT, NS, SRV, CAA)
- DNS templates for quick setup
- Real-time DNS record editing
- TTL and priority configuration

### Security Features
- **DNSSEC Support**: Enable/disable DNSSEC with key management
- **Domain Locking**: Prevent unauthorized transfers
- **Privacy Protection**: Hide WHOIS information
- **Transfer Lock**: Additional security layer

### Advanced Features
- Custom nameserver management
- Contact information management
- Email and URL forwarding configuration
- Auto-renewal settings
- Expiration notifications

## Installation

1. Copy the module to your FOSSBilling installation:
```bash
cp -r bb-modules/Servicedomain /path/to/fossbilling/bb-modules/
```

2. Login to your FOSSBilling admin panel

3. Navigate to **Extensions** > **Overview**

4. Find "Domain Management" and click **Install**

5. Configure the module with your CentralNic Reseller API credentials

## Configuration

### API Settings

Navigate to **System** > **Domain Management** > **Settings** and configure:

- **API Username**: Your CentralNic Reseller username
- **API Password**: Your CentralNic Reseller password
- **Test Mode**: Enable for testing (uses OT&E environment)
- **Test API Username**: OT&E environment username
- **Test API Password**: OT&E environment password

### Additional Settings

- **Auto Sync**: Enable automatic synchronization with registrar
- **Sync Interval**: How often to sync (in seconds)
- **Enable DNSSEC**: Allow DNSSEC management
- **Enable Privacy**: Allow privacy protection
- **Enable Transfer Lock**: Allow domain locking
- **Default Nameservers**: Set default nameservers for new domains

### Available TLDs

Configure which TLDs are available for registration:

```json
{
    "available_tlds": ["com", "net", "org", "info", "biz", "co", "io", "me", "tv", "xyz"]
}
```

## API Endpoints

### Client API

- `servicedomain_get_list` - Get list of client's domains
- `servicedomain_get` - Get domain details
- `servicedomain_register` - Register new domain
- `servicedomain_transfer` - Transfer domain
- `servicedomain_renew` - Renew domain
- `servicedomain_dns_get_records` - Get DNS records
- `servicedomain_dns_add_record` - Add DNS record
- `servicedomain_dns_update_record` - Update DNS record
- `servicedomain_dns_delete_record` - Delete DNS record
- `servicedomain_dnssec_enable` - Enable DNSSEC
- `servicedomain_dnssec_disable` - Disable DNSSEC
- `servicedomain_lock` - Lock domain
- `servicedomain_unlock` - Unlock domain
- `servicedomain_privacy_enable` - Enable privacy
- `servicedomain_privacy_disable` - Disable privacy
- `servicedomain_get_transfer_code` - Get EPP code
- `servicedomain_update_nameservers` - Update nameservers
- `servicedomain_update_contact` - Update contact info
- `servicedomain_check_availability` - Check domain availability
- `servicedomain_get_suggestions` - Get domain suggestions

### Admin API

All client endpoints plus:

- `servicedomain_get_config` - Get module configuration
- `servicedomain_update_config` - Update module configuration
- `servicedomain_domain_list` - List all domains
- `servicedomain_domain_create` - Create domain manually
- `servicedomain_domain_update` - Update domain
- `servicedomain_domain_delete` - Delete domain
- `servicedomain_domain_sync` - Sync single domain
- `servicedomain_sync_all` - Sync all domains
- `servicedomain_get_expiring_domains` - Get expiring domains
- `servicedomain_process_auto_renewals` - Process auto-renewals

## Cron Jobs

Add the following cron jobs for automatic operations:

### Daily sync (recommended at 2 AM)
```bash
0 2 * * * curl -s "https://your-fossbilling.com/api/admin/servicedomain/sync_all" -H "Authorization: Bearer YOUR_API_KEY"
```

### Auto-renewal check (daily at 3 AM)
```bash
0 3 * * * curl -s "https://your-fossbilling.com/api/admin/servicedomain/process_auto_renewals" -H "Authorization: Bearer YOUR_API_KEY"
```

## DNS Record Types

### A Record
IPv4 address mapping
```
example.com -> 192.168.1.1
```

### AAAA Record
IPv6 address mapping
```
example.com -> 2001:db8::1
```

### CNAME Record
Canonical name (alias)
```
www.example.com -> example.com
```

### MX Record
Mail exchange with priority
```
example.com -> mail.example.com (priority: 10)
```

### TXT Record
Text records for SPF, DKIM, etc.
```
example.com -> "v=spf1 mx ~all"
```

### NS Record
Nameserver delegation
```
sub.example.com -> ns1.example.com
```

### SRV Record
Service records with priority, weight, and port
```
_service._proto.example.com -> target.example.com
```

### CAA Record
Certificate Authority Authorization
```
example.com -> 0 issue "ca.example.com"
```

## DNSSEC

When DNSSEC is enabled, the module:

1. Generates DNSSEC keys
2. Signs the zone
3. Provides DS records for parent zone
4. Manages key rotation

### DNSSEC Key Information

- **Key Tag**: Unique identifier
- **Algorithm**: Cryptographic algorithm (usually 8 for RSA/SHA-256)
- **Digest Type**: Hash algorithm (usually 2 for SHA-256)
- **Digest**: Hash of the DNSKEY record

## Troubleshooting

### Common Issues

1. **API Connection Failed**
   - Verify API credentials
   - Check if IP is whitelisted
   - Ensure API endpoint is accessible

2. **Domain Registration Failed**
   - Check domain availability
   - Verify contact information
   - Ensure sufficient balance

3. **DNS Records Not Updating**
   - Allow propagation time (up to 48 hours)
   - Clear DNS cache
   - Verify nameserver settings

4. **DNSSEC Validation Failed**
   - Check DS records at parent zone
   - Verify key configuration
   - Wait for propagation

### Debug Mode

Enable debug logging in configuration:
```json
{
    "debug": true,
    "log_api_calls": true
}
```

## Security Recommendations

1. **Use strong API passwords**
2. **Enable IP whitelisting** for API access
3. **Regular backups** of domain configurations
4. **Monitor expiration dates** actively
5. **Enable 2FA** on registrar account
6. **Use DNSSEC** for critical domains
7. **Enable domain locking** by default

## Support

For issues or questions:

1. Check the [FOSSBilling documentation](https://fossbilling.org/docs)
2. Visit [FOSSBilling community forum](https://forum.fossbilling.org)
3. Report bugs on [GitHub](https://github.com/FOSSBilling/FOSSBilling/issues)

## License

This module is licensed under the Apache License 2.0. See LICENSE file for details.

## Credits

- FOSSBilling Team
- CentralNic Reseller for API documentation
- Namingo for inspiration on domain management features

## Changelog

### Version 1.0.0
- Initial release
- Full domain management capabilities
- DNS management with all record types
- DNSSEC support
- Domain security features
- Auto-renewal system
- Comprehensive admin and client interfaces