<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Mfa;

use FOSSBilling\InjectionAwareInterface;
use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\Providers\Qr\GoogleQRCodeProvider;
use RobThree\Auth\Providers\Rng\CSRNGProvider;
use RobThree\Auth\Providers\Time\NTPTimeProvider;

class Service implements InjectionAwareInterface
{
    protected ?\Pimple\Container $di = null;
    private ?TwoFactorAuth $tfa = null;

    public function setDi(\Pimple\Container $di): void
    {
        $this->di = $di;
    }

    public function getDi(): ?\Pimple\Container
    {
        return $this->di;
    }

    public function getModulePermissions(): array
    {
        return [
            'can_always_access' => true,
            'manage_mfa' => [
                'type' => 'bool',
                'display_name' => __trans('Manage MFA settings'),
                'description' => __trans('Allows the staff member to manage MFA settings for clients.'),
            ],
        ];
    }

    /**
     * Get TwoFactorAuth instance
     */
    private function getTFA(): TwoFactorAuth
    {
        if ($this->tfa === null) {
            $this->tfa = new TwoFactorAuth(
                'FOSSBilling',
                6, // Code length
                30, // Period
                'sha1', // Algorithm
                new GoogleQRCodeProvider(),
                new CSRNGProvider(),
                new NTPTimeProvider()
            );
        }
        return $this->tfa;
    }

    /**
     * Check if MFA is enabled for a client
     */
    public function isMfaEnabled(int $clientId): bool
    {
        $db = $this->di['db'];
        $result = $db->getRow(
            'SELECT enabled FROM mfa_settings WHERE client_id = :client_id',
            [':client_id' => $clientId]
        );
        
        return $result ? (bool) $result['enabled'] : false;
    }

    /**
     * Get MFA settings for a client
     */
    public function getMfaSettings(int $clientId): ?array
    {
        $db = $this->di['db'];
        $result = $db->getRow(
            'SELECT * FROM mfa_settings WHERE client_id = :client_id',
            [':client_id' => $clientId]
        );
        
        if (!$result) {
            return null;
        }

        // Decrypt the secret
        $result['secret'] = $this->di['tools']->decrypt($result['secret']);
        $result['backup_codes'] = $result['backup_codes'] ? json_decode($result['backup_codes'], true) : [];

        return $result;
    }

    /**
     * Generate MFA secret and QR code
     */
    public function generateMfaSecret(int $clientId, string $email): array
    {
        $tfa = $this->getTFA();
        $secret = $tfa->createSecret();
        
        // Get client info for QR code label
        $client = $this->di['db']->load('client', $clientId);
        $label = $client->first_name . ' ' . $client->last_name . ' (' . $email . ')';
        
        $qrCodeUrl = $tfa->getQRCodeImageAsDataUri($label, $secret);
        
        return [
            'secret' => $secret,
            'qr_code' => $qrCodeUrl,
            'manual_entry_key' => $secret
        ];
    }

    /**
     * Enable MFA for a client
     */
    public function enableMfa(int $clientId, string $secret, string $verificationCode): bool
    {
        $tfa = $this->getTFA();
        
        // Verify the code before enabling
        if (!$tfa->verifyCode($secret, $verificationCode)) {
            throw new \FOSSBilling\InformationException('Invalid verification code');
        }

        $db = $this->di['db'];
        
        // Generate backup codes
        $backupCodes = $this->generateBackupCodes();
        
        // Encrypt the secret
        $encryptedSecret = $this->di['tools']->encrypt($secret);
        
        // Check if settings already exist
        $existing = $db->getRow(
            'SELECT id FROM mfa_settings WHERE client_id = :client_id',
            [':client_id' => $clientId]
        );
        
        if ($existing) {
            // Update existing settings
            $db->exec(
                'UPDATE mfa_settings SET enabled = 1, secret = :secret, backup_codes = :backup_codes, updated_at = NOW() WHERE client_id = :client_id',
                [
                    ':secret' => $encryptedSecret,
                    ':backup_codes' => json_encode($backupCodes),
                    ':client_id' => $clientId
                ]
            );
        } else {
            // Insert new settings
            $db->exec(
                'INSERT INTO mfa_settings (client_id, enabled, secret, backup_codes) VALUES (:client_id, 1, :secret, :backup_codes)',
                [
                    ':client_id' => $clientId,
                    ':secret' => $encryptedSecret,
                    ':backup_codes' => json_encode($backupCodes)
                ]
            );
        }

        $this->logMfaAction($clientId, 'enabled', true);
        
        return true;
    }

    /**
     * Disable MFA for a client
     */
    public function disableMfa(int $clientId, string $verificationCode): bool
    {
        $settings = $this->getMfaSettings($clientId);
        if (!$settings) {
            throw new \FOSSBilling\InformationException('MFA is not enabled for this client');
        }

        $tfa = $this->getTFA();
        
        // Verify the code before disabling
        if (!$tfa->verifyCode($settings['secret'], $verificationCode)) {
            throw new \FOSSBilling\InformationException('Invalid verification code');
        }

        $db = $this->di['db'];
        $db->exec(
            'UPDATE mfa_settings SET enabled = 0, updated_at = NOW() WHERE client_id = :client_id',
            [':client_id' => $clientId]
        );

        $this->logMfaAction($clientId, 'disabled', true);
        
        return true;
    }

    /**
     * Verify MFA code
     */
    public function verifyMfaCode(int $clientId, string $code): bool
    {
        $settings = $this->getMfaSettings($clientId);
        if (!$settings || !$settings['enabled']) {
            return false;
        }

        $tfa = $this->getTFA();
        
        // Try TOTP code first
        if ($tfa->verifyCode($settings['secret'], $code)) {
            $this->logMfaAction($clientId, 'totp_verified', true);
            return true;
        }

        // Try backup codes
        if (in_array($code, $settings['backup_codes'])) {
            $this->useBackupCode($clientId, $code);
            $this->logMfaAction($clientId, 'backup_code_used', true);
            return true;
        }

        $this->logMfaAction($clientId, 'verification_failed', false);
        return false;
    }

    /**
     * Generate backup codes
     */
    private function generateBackupCodes(int $count = 10): array
    {
        $codes = [];
        for ($i = 0; $i < $count; $i++) {
            $codes[] = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        }
        return $codes;
    }

    /**
     * Use a backup code (remove it from the list)
     */
    private function useBackupCode(int $clientId, string $code): void
    {
        $settings = $this->getMfaSettings($clientId);
        $backupCodes = $settings['backup_codes'];
        
        // Remove the used code
        $backupCodes = array_values(array_filter($backupCodes, function($c) use ($code) {
            return $c !== $code;
        }));
        
        $db = $this->di['db'];
        $db->exec(
            'UPDATE mfa_settings SET backup_codes = :backup_codes, updated_at = NOW() WHERE client_id = :client_id',
            [
                ':backup_codes' => json_encode($backupCodes),
                ':client_id' => $clientId
            ]
        );
    }

    /**
     * Regenerate backup codes
     */
    public function regenerateBackupCodes(int $clientId, string $verificationCode): array
    {
        $settings = $this->getMfaSettings($clientId);
        if (!$settings || !$settings['enabled']) {
            throw new \FOSSBilling\InformationException('MFA is not enabled for this client');
        }

        $tfa = $this->getTFA();
        
        // Verify the code before regenerating
        if (!$tfa->verifyCode($settings['secret'], $verificationCode)) {
            throw new \FOSSBilling\InformationException('Invalid verification code');
        }

        $backupCodes = $this->generateBackupCodes();
        
        $db = $this->di['db'];
        $db->exec(
            'UPDATE mfa_settings SET backup_codes = :backup_codes, updated_at = NOW() WHERE client_id = :client_id',
            [
                ':backup_codes' => json_encode($backupCodes),
                ':client_id' => $clientId
            ]
        );

        $this->logMfaAction($clientId, 'backup_codes_regenerated', true);
        
        return $backupCodes;
    }

    /**
     * Check if device is remembered
     */
    public function isDeviceRemembered(int $clientId, string $deviceFingerprint): bool
    {
        $db = $this->di['db'];
        $result = $db->getRow(
            'SELECT id FROM mfa_sessions WHERE client_id = :client_id AND device_fingerprint = :fingerprint AND expires_at > NOW()',
            [
                ':client_id' => $clientId,
                ':fingerprint' => $deviceFingerprint
            ]
        );
        
        return $result !== null;
    }

    /**
     * Remember device
     */
    public function rememberDevice(int $clientId, string $deviceFingerprint, int $days = 30): string
    {
        $db = $this->di['db'];
        $sessionToken = $this->di['tools']->generatePassword(64);
        $expiresAt = date('Y-m-d H:i:s', time() + ($days * 24 * 60 * 60));
        
        $db->exec(
            'INSERT INTO mfa_sessions (client_id, session_token, device_fingerprint, expires_at) VALUES (:client_id, :token, :fingerprint, :expires)',
            [
                ':client_id' => $clientId,
                ':token' => $sessionToken,
                ':fingerprint' => $deviceFingerprint,
                ':expires' => $expiresAt
            ]
        );
        
        return $sessionToken;
    }

    /**
     * Log MFA action
     */
    public function logMfaAction(int $clientId, string $action, bool $success): void
    {
        $db = $this->di['db'];
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        
        $db->exec(
            'INSERT INTO mfa_logs (client_id, ip_address, user_agent, success, method, created_at) VALUES (:client_id, :ip, :ua, :success, :method, NOW())',
            [
                ':client_id' => $clientId,
                ':ip' => $ipAddress,
                ':ua' => $userAgent,
                ':success' => $success ? 1 : 0,
                ':method' => $action
            ]
        );
    }

    /**
     * Get MFA logs for a client
     */
    public function getMfaLogs(int $clientId, int $limit = 50): array
    {
        $db = $this->di['db'];
        return $db->getAll(
            'SELECT * FROM mfa_logs WHERE client_id = :client_id ORDER BY created_at DESC LIMIT :limit',
            [
                ':client_id' => $clientId,
                ':limit' => $limit
            ]
        );
    }

    /**
     * Clean expired MFA sessions
     */
    public function cleanExpiredSessions(): int
    {
        $db = $this->di['db'];
        return $db->exec('DELETE FROM mfa_sessions WHERE expires_at < NOW()');
    }

    /**
     * Get MFA statistics
     */
    public function getStatistics(): array
    {
        $db = $this->di['db'];
        
        // Total clients with MFA enabled
        $totalEnabled = $db->getOne('SELECT COUNT(*) FROM mfa_settings WHERE enabled = 1');
        
        // Total clients
        $totalClients = $db->getOne('SELECT COUNT(*) FROM client');
        
        // Recent MFA logins (last 24 hours)
        $recentLogins = $db->getOne(
            'SELECT COUNT(*) FROM mfa_logs WHERE success = 1 AND created_at >= DATE_SUB(NOW(), INTERVAL 24 HOUR)'
        );
        
        // Failed attempts (last 24 hours)
        $failedAttempts = $db->getOne(
            'SELECT COUNT(*) FROM mfa_logs WHERE success = 0 AND created_at >= DATE_SUB(NOW(), INTERVAL 24 HOUR)'
        );
        
        // Active remembered devices
        $activeDevices = $db->getOne(
            'SELECT COUNT(*) FROM mfa_sessions WHERE expires_at > NOW()'
        );
        
        return [
            'total_enabled' => (int) $totalEnabled,
            'total_clients' => (int) $totalClients,
            'enabled_percentage' => $totalClients > 0 ? round(($totalEnabled / $totalClients) * 100, 2) : 0,
            'recent_logins' => (int) $recentLogins,
            'failed_attempts' => (int) $failedAttempts,
            'active_devices' => (int) $activeDevices
        ];
    }

    /**
     * Get clients with MFA enabled
     */
    public function getEnabledClients(int $limit = 50, int $offset = 0): array
    {
        $db = $this->di['db'];
        
        $clients = $db->getAll(
            'SELECT 
                c.id, 
                c.first_name, 
                c.last_name, 
                c.email, 
                c.created_at as client_created,
                m.enabled,
                m.created_at as mfa_enabled_at,
                m.updated_at as mfa_updated_at
            FROM client c
            INNER JOIN mfa_settings m ON c.id = m.client_id
            WHERE m.enabled = 1
            ORDER BY m.created_at DESC
            LIMIT :limit OFFSET :offset',
            [
                ':limit' => $limit,
                ':offset' => $offset
            ]
        );
        
        return $clients;
    }

    /**
     * Force disable MFA for a client (admin only)
     */
    public function forceDisableMfa(int $clientId): bool
    {
        $db = $this->di['db'];
        
        // Check if client exists
        $client = $db->load('client', $clientId);
        if (!$client) {
            throw new \FOSSBilling\InformationException('Client not found');
        }
        
        // Disable MFA
        $db->exec(
            'UPDATE mfa_settings SET enabled = 0, updated_at = NOW() WHERE client_id = :client_id',
            [':client_id' => $clientId]
        );
        
        // Clear all remembered devices for this client
        $db->exec(
            'DELETE FROM mfa_sessions WHERE client_id = :client_id',
            [':client_id' => $clientId]
        );
        
        $this->logMfaAction($clientId, 'force_disabled', true);
        
        return true;
    }

    /**
     * Hook: onBeforeClientLogin - Check if MFA is required
     */
    public static function onBeforeClientLogin(\Box_Event $event)
    {
        $params = $event->getParameters();
        $di = $event->getDi();
        
        if (!isset($params['email'])) {
            return;
        }

        // Get client by email
        $client = $di['db']->findOne('client', 'email = :email', [':email' => $params['email']]);
        if (!$client) {
            return;
        }

        $mfaService = $di['mod_service']('mfa');
        if ($mfaService->isMfaEnabled($client->id)) {
            // Store client ID in session for MFA verification
            $di['session']->set('mfa_pending_client_id', $client->id);
            $di['session']->set('mfa_pending_email', $params['email']);
            $di['session']->set('mfa_pending_password', $params['password']);
            
            // Set a flag to indicate MFA is required
            $event->setReturnValue(['mfa_required' => true]);
        }
    }

    /**
     * Hook: onAfterClientLogin - Log successful MFA login
     */
    public static function onAfterClientLogin(\Box_Event $event)
    {
        $params = $event->getParameters();
        $di = $event->getDi();
        
        if (!isset($params['id'])) {
            return;
        }

        $mfaService = $di['mod_service']('mfa');
        if ($mfaService->isMfaEnabled($params['id'])) {
            $mfaService->logMfaAction($params['id'], 'login_success', true);
        }
    }
}