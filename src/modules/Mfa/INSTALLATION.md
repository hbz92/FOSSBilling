# Installation Guide - MFA Module for FOSSBilling

## Prerequisites

- FOSSBilling installation (version 0.2.0 or higher)
- PHP 8.2 or higher
- Composer
- MySQL/MariaDB database
- GD extension enabled (for QR code generation)

## Installation Steps

### 1. Install Dependencies

First, install the required PHP library:

```bash
cd /path/to/fossbilling
composer require robthree/twofactorauth
```

### 2. Copy Module Files

Copy the entire `Mfa` folder to your FOSSBilling modules directory:

```bash
cp -r Mfa /path/to/fossbilling/src/modules/
```

### 3. Set Permissions

Ensure the module directory has proper permissions:

```bash
chmod -R 755 /path/to/fossbilling/src/modules/Mfa
chown -R www-data:www-data /path/to/fossbilling/src/modules/Mfa
```

### 4. Database Setup

Import the database schema:

```bash
mysql -u your_username -p your_database < /path/to/fossbilling/src/modules/Mfa/install/sql/mfa_tables.sql
```

Or manually execute the SQL commands from `install/sql/mfa_tables.sql` in your database.

### 5. Activate Module

1. Log in to your FOSSBilling admin panel
2. Go to **Extensions** → **Modules**
3. Find **Multi-Factor Authentication** in the list
4. Click **Activate**

### 6. Configure Module

1. Go to **Extensions** → **Modules** → **Multi-Factor Authentication**
2. Configure the following settings:
   - **Enable MFA**: Set to `true`
   - **Require MFA**: Set to `false` (optional, makes MFA mandatory)
   - **Remember Device Days**: Number of days to remember devices (default: 30)
   - **Backup Codes Count**: Number of backup codes to generate (default: 10)
   - **Rate Limit Attempts**: Maximum failed attempts before lockout (default: 5)
   - **Rate Limit Window**: Time window for rate limiting in seconds (default: 300)

## Verification

### 1. Check Module Status

Visit `/admin/mfa` in your admin panel. You should see the MFA dashboard with statistics.

### 2. Test Client Setup

1. Log in as a client
2. Go to `/client/mfa/setup`
3. Follow the setup process
4. Test MFA verification

### 3. Check Database

Verify that the following tables were created:
- `mfa_settings`
- `mfa_logs`
- `mfa_sessions`

## Troubleshooting

### Common Issues

#### 1. QR Code Not Displaying

**Problem**: QR code appears as broken image or doesn't display.

**Solution**: 
- Ensure GD extension is installed: `php -m | grep gd`
- Check PHP error logs for GD-related errors
- Verify file permissions on the module directory

#### 2. Module Not Appearing in Admin

**Problem**: MFA module doesn't show up in the modules list.

**Solution**:
- Check file permissions on the module directory
- Verify the module is in the correct location: `/src/modules/Mfa/`
- Check FOSSBilling error logs
- Ensure `manifest.json` is properly formatted

#### 3. Database Errors

**Problem**: Database-related errors when using MFA.

**Solution**:
- Verify all tables were created successfully
- Check database user permissions
- Ensure proper character set (utf8mb4) is used
- Check FOSSBilling database configuration

#### 4. Composer Dependencies

**Problem**: Class not found errors related to TwoFactorAuth.

**Solution**:
- Run `composer install` to ensure dependencies are installed
- Check `composer.json` for the robthree/twofactorauth dependency
- Verify autoloader is working: `composer dump-autoload`

### Debug Mode

Enable debug logging in FOSSBilling to get more detailed error information:

1. Edit your FOSSBilling configuration file
2. Set `debug` to `true`
3. Check logs in `/src/data/log/`

### Log Files

Check these log files for errors:
- `/src/data/log/` - FOSSBilling application logs
- `/var/log/apache2/error.log` - Web server error logs
- `/var/log/mysql/error.log` - Database error logs

## Security Considerations

### 1. Backup Codes

- Store backup codes securely
- Regenerate them if compromised
- Limit access to backup codes

### 2. Database Security

- Use strong database passwords
- Limit database user permissions
- Enable SSL for database connections

### 3. Server Security

- Keep PHP and web server updated
- Use HTTPS for all MFA-related pages
- Implement proper firewall rules

## Uninstallation

To remove the MFA module:

1. **Deactivate Module**: Go to admin panel and deactivate the module
2. **Remove Database Tables** (optional):
   ```sql
   DROP TABLE IF EXISTS mfa_sessions;
   DROP TABLE IF EXISTS mfa_logs;
   DROP TABLE IF EXISTS mfa_settings;
   ```
3. **Remove Files**: Delete the module directory
4. **Remove Dependencies** (optional):
   ```bash
   composer remove robthree/twofactorauth
   ```

## Support

For additional support:

1. Check the module README: `/src/modules/Mfa/README.md`
2. Review FOSSBilling documentation
3. Check the module's GitHub repository
4. Contact FOSSBilling community support

## Version Compatibility

| FOSSBilling Version | MFA Module Version | Status |
|-------------------|-------------------|---------|
| 0.2.0+ | 1.0.0 | ✅ Compatible |
| 0.1.x | 1.0.0 | ❌ Not tested |
| Future versions | 1.0.0 | ✅ Should work |

## Changelog

### Version 1.0.0
- Initial release
- TOTP support
- Backup codes
- Admin dashboard
- Device remembering
- Comprehensive logging