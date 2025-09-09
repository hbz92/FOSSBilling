<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

/**
 * Advanced MFA Configuration
 * 
 * This file contains advanced configuration options for the MFA module.
 * Copy the settings you want to customize to your main config.php file.
 */

return [
    // Basic Settings
    'enabled' => true,
    'require_mfa' => false, // Set to true to make MFA mandatory for all clients
    
    // Device Remembering
    'remember_device_days' => 30,
    'remember_device_max_devices' => 5, // Maximum number of devices to remember per client
    
    // Backup Codes
    'backup_codes_count' => 10,
    'backup_codes_length' => 8,
    'backup_codes_charset' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
    
    // Rate Limiting
    'rate_limit_attempts' => 5,
    'rate_limit_window' => 300, // 5 minutes in seconds
    'rate_limit_ban_duration' => 900, // 15 minutes ban after exceeding rate limit
    
    // TOTP Settings
    'qr_code_size' => 200,
    'qr_code_margin' => 4,
    'issuer' => 'FOSSBilling',
    'algorithm' => 'sha1', // sha1, sha256, sha512
    'digits' => 6,
    'period' => 30, // Time window in seconds
    
    // Security Settings
    'encrypt_secrets' => true, // Encrypt MFA secrets in database
    'log_all_attempts' => true, // Log all MFA attempts (successful and failed)
    'log_ip_addresses' => true, // Log IP addresses in MFA logs
    'log_user_agents' => true, // Log user agents in MFA logs
    
    // Session Settings
    'session_timeout' => 1800, // 30 minutes
    'max_concurrent_sessions' => 3, // Maximum concurrent MFA sessions per client
    
    // Notification Settings
    'notify_on_enable' => true, // Send email when MFA is enabled
    'notify_on_disable' => true, // Send email when MFA is disabled
    'notify_on_failed_attempts' => true, // Send email on multiple failed attempts
    'failed_attempts_threshold' => 3, // Number of failed attempts before notification
    
    // UI Settings
    'show_qr_code' => true, // Show QR code during setup
    'show_manual_entry' => true, // Show manual entry key during setup
    'auto_submit_on_complete' => true, // Auto-submit form when 6 digits are entered
    'remember_device_default' => false, // Default state of "remember device" checkbox
    
    // Admin Settings
    'admin_can_force_disable' => true, // Allow admins to force disable MFA for clients
    'admin_can_view_logs' => true, // Allow admins to view MFA logs
    'admin_can_clean_sessions' => true, // Allow admins to clean expired sessions
    
    // Database Settings
    'cleanup_interval' => 86400, // 24 hours - how often to clean expired sessions
    'log_retention_days' => 90, // How long to keep MFA logs
    'max_log_entries_per_client' => 1000, // Maximum log entries per client
    
    // Integration Settings
    'hook_priority' => 100, // Priority for MFA hooks (higher = later execution)
    'api_rate_limit' => 60, // API requests per minute per IP
    'api_require_https' => true, // Require HTTPS for API calls
    
    // Custom Settings
    'custom_issuer_name' => null, // Override issuer name (null = use 'issuer' setting)
    'custom_qr_code_provider' => null, // Custom QR code provider class
    'custom_time_provider' => null, // Custom time provider class
    'custom_rng_provider' => null, // Custom random number generator class
    
    // Feature Flags
    'enable_backup_codes' => true,
    'enable_device_remembering' => true,
    'enable_admin_dashboard' => true,
    'enable_client_logs' => true,
    'enable_statistics' => true,
    'enable_force_disable' => true,
    
    // Debug Settings (for development only)
    'debug_mode' => false,
    'debug_log_verification' => false, // Log verification attempts in debug mode
    'debug_show_secrets' => false, // Show secrets in debug output (DANGEROUS!)
    
    // Migration Settings
    'migrate_existing_clients' => false, // Migrate existing clients to MFA (if require_mfa is true)
    'migration_batch_size' => 100, // Number of clients to process per migration batch
    
    // Performance Settings
    'cache_qr_codes' => true, // Cache generated QR codes
    'cache_ttl' => 3600, // Cache time-to-live in seconds
    'use_redis_cache' => false, // Use Redis for caching (requires Redis extension)
    
    // Compliance Settings
    'gdpr_compliant' => true, // Enable GDPR compliance features
    'anonymize_old_logs' => true, // Anonymize old log entries
    'anonymize_after_days' => 30, // Anonymize logs after this many days
    
    // Custom Validation Rules
    'custom_validation_rules' => [
        // Add custom validation rules here
        // Example: 'min_password_length' => 8,
    ],
    
    // Custom Event Handlers
    'custom_event_handlers' => [
        // Add custom event handlers here
        // Example: 'on_mfa_enabled' => 'CustomClass::onMfaEnabled',
    ],
];