# Multi-Factor Authentication (MFA) Module for FOSSBilling

This module adds Time-based One-Time Password (TOTP) multi-factor authentication to FOSSBilling without modifying any core files.

## Features

- **TOTP Support**: Compatible with Google Authenticator, Microsoft Authenticator, Authy, and other TOTP apps
- **Backup Codes**: Generate and manage backup codes for account recovery
- **Remember Device**: Optional 30-day device remembering to reduce MFA prompts
- **Admin Dashboard**: Complete admin interface for managing MFA settings and monitoring
- **Security Logging**: Comprehensive logging of all MFA activities
- **Rate Limiting**: Built-in protection against brute force attacks
- **Mobile-Friendly**: Responsive design that works on all devices

## Installation

### 1. Install Dependencies

```bash
composer require robthree/twofactorauth
```

### 2. Install the Module

1. Copy the `Mfa` folder to `/src/modules/`
2. Run the database installation script
3. Activate the module in FOSSBilling admin panel

### 3. Database Setup

The module will automatically create the following tables:
- `mfa_settings` - Stores MFA configuration per client
- `mfa_logs` - Logs all MFA activities
- `mfa_sessions` - Manages remembered devices

## Configuration

The module can be configured via the admin panel or by editing `/src/modules/Mfa/install/config.php`:

```php
return [
    'enabled' => true,
    'require_mfa' => false, // Make MFA mandatory for all clients
    'remember_device_days' => 30,
    'backup_codes_count' => 10,
    'rate_limit_attempts' => 5,
    'rate_limit_window' => 300, // 5 minutes
    'qr_code_size' => 200,
    'issuer' => 'FOSSBilling',
    'algorithm' => 'sha1',
    'digits' => 6,
    'period' => 30
];
```

## Usage

### For Clients

1. **Setup MFA**: Go to `/client/mfa/setup`
2. **Scan QR Code**: Use your authenticator app to scan the QR code
3. **Verify Setup**: Enter the 6-digit code to confirm
4. **Save Backup Codes**: Store your backup codes in a safe place

### For Administrators

1. **Dashboard**: Access `/admin/mfa` for overview and statistics
2. **Monitor Activity**: View client MFA logs and activity
3. **Manage Clients**: Force disable MFA or view client status
4. **Clean Sessions**: Remove expired device sessions

## API Endpoints

### Client API

- `GET /api/client/mfa/status` - Get MFA status
- `GET /api/client/mfa/generate-secret` - Generate new MFA secret
- `POST /api/client/mfa/enable` - Enable MFA
- `POST /api/client/mfa/disable` - Disable MFA
- `POST /api/client/mfa/verify` - Verify MFA code
- `POST /api/client/mfa/regenerate-backup-codes` - Regenerate backup codes
- `GET /api/client/mfa/logs` - Get MFA logs

### Admin API

- `GET /api/admin/mfa/client-status` - Get client MFA status
- `GET /api/admin/mfa/client-logs` - Get client MFA logs
- `GET /api/admin/mfa/enabled-clients` - List all clients with MFA enabled
- `GET /api/admin/mfa/statistics` - Get MFA statistics
- `POST /api/admin/mfa/clean-sessions` - Clean expired sessions
- `POST /api/admin/mfa/force-disable` - Force disable MFA for client

## Security Features

- **Encrypted Storage**: All MFA secrets are encrypted before storage
- **Rate Limiting**: Prevents brute force attacks on MFA codes
- **Session Management**: Secure device remembering with expiration
- **Audit Logging**: Complete audit trail of all MFA activities
- **Backup Codes**: Secure recovery mechanism for lost devices

## Integration with FOSSBilling

The module integrates seamlessly with FOSSBilling using:

- **Event Hooks**: Intercepts login process without modifying core files
- **Module System**: Follows FOSSBilling module architecture
- **Database Integration**: Uses FOSSBilling's database abstraction
- **Template System**: Uses FOSSBilling's Twig templating
- **API System**: Integrates with FOSSBilling's API framework

## Troubleshooting

### Common Issues

1. **QR Code Not Displaying**: Ensure GD extension is enabled in PHP
2. **MFA Not Working**: Check that the module is properly installed and activated
3. **Database Errors**: Verify that all required tables are created
4. **Permission Issues**: Ensure proper file permissions on module directory

### Debug Mode

Enable debug logging by setting the log level to debug in FOSSBilling configuration.

## Support

For support and bug reports, please use the FOSSBilling issue tracker or community forum.

## License

This module is licensed under the Apache 2.0 License, same as FOSSBilling.

## Changelog

### Version 1.0.0
- Initial release
- TOTP support with Google Authenticator compatibility
- Backup codes system
- Admin dashboard
- Device remembering
- Comprehensive logging
- Rate limiting
- Mobile-responsive design