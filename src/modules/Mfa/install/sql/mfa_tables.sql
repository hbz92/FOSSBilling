-- MFA Settings table
CREATE TABLE IF NOT EXISTS `mfa_settings` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `client_id` int(11) NOT NULL,
    `enabled` tinyint(1) DEFAULT 0,
    `secret` varchar(255) NOT NULL,
    `backup_codes` text,
    `remember_device` tinyint(1) DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `client_id` (`client_id`),
    KEY `idx_enabled` (`enabled`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- MFA Logs table
CREATE TABLE IF NOT EXISTS `mfa_logs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `client_id` int(11) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `user_agent` text,
    `success` tinyint(1) NOT NULL,
    `method` varchar(50) DEFAULT 'totp',
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_client_id` (`client_id`),
    KEY `idx_created_at` (`created_at`),
    KEY `idx_success` (`success`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- MFA Sessions table (for remember device functionality)
CREATE TABLE IF NOT EXISTS `mfa_sessions` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `client_id` int(11) NOT NULL,
    `session_token` varchar(255) NOT NULL,
    `device_fingerprint` varchar(255) NOT NULL,
    `expires_at` datetime NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `session_token` (`session_token`),
    KEY `idx_client_id` (`client_id`),
    KEY `idx_expires_at` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;