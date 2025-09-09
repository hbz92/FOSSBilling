<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Mfa\Controller;

class Client extends \FOSSBilling\Controller
{
    /**
     * MFA setup page
     */
    public function setup()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        if ($service->isMfaEnabled($client->id)) {
            return $this->redirect('/client/mfa/settings');
        }
        
        $secretData = $service->generateMfaSecret($client->id, $client->email);
        
        return $this->render('mod_mfa_setup', [
            'secret' => $secretData['secret'],
            'qr_code' => $secretData['qr_code'],
            'manual_entry_key' => $secretData['manual_entry_key']
        ]);
    }

    /**
     * MFA settings page
     */
    public function settings()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $isEnabled = $service->isMfaEnabled($client->id);
        $settings = $isEnabled ? $service->getMfaSettings($client->id) : null;
        
        return $this->render('mod_mfa_settings', [
            'enabled' => $isEnabled,
            'backup_codes_count' => $settings ? count($settings['backup_codes']) : 0,
            'created_at' => $settings ? $settings['created_at'] : null
        ]);
    }

    /**
     * MFA verification page (for login)
     */
    public function verify()
    {
        $session = $this->di['session'];
        
        // Check if MFA verification is pending
        if (!$session->get('mfa_pending_client_id')) {
            return $this->redirect('/client/login');
        }
        
        $clientId = $session->get('mfa_pending_client_id');
        $email = $session->get('mfa_pending_email');
        
        // Get client info
        $client = $this->di['db']->load('client', $clientId);
        if (!$client) {
            $session->delete('mfa_pending_client_id');
            $session->delete('mfa_pending_email');
            $session->delete('mfa_pending_password');
            return $this->redirect('/client/login');
        }
        
        return $this->render('mod_mfa_verify', [
            'client_name' => $client->first_name . ' ' . $client->last_name,
            'email' => $email
        ]);
    }

    /**
     * Process MFA verification
     */
    public function process_verification()
    {
        $session = $this->di['session'];
        
        // Check if MFA verification is pending
        if (!$session->get('mfa_pending_client_id')) {
            return $this->redirect('/client/login');
        }
        
        $clientId = $session->get('mfa_pending_client_id');
        $email = $session->get('mfa_pending_email');
        $password = $session->get('mfa_pending_password');
        
        $code = $this->di['request']->get('mfa_code');
        $rememberDevice = $this->di['request']->get('remember_device', false);
        
        if (empty($code)) {
            $this->di['flash']->set('error', 'Please enter your MFA code');
            return $this->redirect('/client/mfa/verify');
        }
        
        $service = $this->getService();
        
        // Verify MFA code
        if (!$service->verifyMfaCode($clientId, $code)) {
            $this->di['flash']->set('error', 'Invalid MFA code. Please try again.');
            return $this->redirect('/client/mfa/verify');
        }
        
        // If remember device is checked, create a session
        if ($rememberDevice) {
            $deviceFingerprint = $this->generateDeviceFingerprint();
            $service->rememberDevice($clientId, $deviceFingerprint);
        }
        
        // Clear MFA pending session data
        $session->delete('mfa_pending_client_id');
        $session->delete('mfa_pending_email');
        $session->delete('mfa_pending_password');
        
        // Complete the login process
        try {
            $clientService = $this->di['mod_service']('client');
            $client = $clientService->authorizeClient($email, $password);
            
            if ($client instanceof \Model_Client) {
                $oldSession = $session->getId();
                session_regenerate_id();
                $result = $clientService->toSessionArray($client);
                $session->set('client_id', $client->id);
                
                $this->di['logger']->info('Client #%s logged in with MFA', $client->id);
                $session->delete('redirect_uri');
                
                $this->di['mod_service']('cart')->transferFromOtherSession($oldSession);
                
                $this->di['flash']->set('success', 'Login successful!');
                return $this->redirect('/client/dashboard');
            }
        } catch (\Exception $e) {
            $this->di['logger']->error('MFA login failed: ' . $e->getMessage());
        }
        
        $this->di['flash']->set('error', 'Login failed. Please try again.');
        return $this->redirect('/client/login');
    }

    /**
     * Enable MFA
     */
    public function enable()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $secret = $this->di['request']->get('secret');
        $verificationCode = $this->di['request']->get('verification_code');
        
        if (empty($secret) || empty($verificationCode)) {
            $this->di['flash']->set('error', 'Secret and verification code are required');
            return $this->redirect('/client/mfa/setup');
        }
        
        try {
            $service->enableMfa($client->id, $secret, $verificationCode);
            $this->di['flash']->set('success', 'MFA has been enabled successfully!');
            return $this->redirect('/client/mfa/settings');
        } catch (\Exception $e) {
            $this->di['flash']->set('error', $e->getMessage());
            return $this->redirect('/client/mfa/setup');
        }
    }

    /**
     * Disable MFA
     */
    public function disable()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $verificationCode = $this->di['request']->get('verification_code');
        
        if (empty($verificationCode)) {
            $this->di['flash']->set('error', 'Verification code is required');
            return $this->redirect('/client/mfa/settings');
        }
        
        try {
            $service->disableMfa($client->id, $verificationCode);
            $this->di['flash']->set('success', 'MFA has been disabled successfully!');
            return $this->redirect('/client/mfa/settings');
        } catch (\Exception $e) {
            $this->di['flash']->set('error', $e->getMessage());
            return $this->redirect('/client/mfa/settings');
        }
    }

    /**
     * Regenerate backup codes
     */
    public function regenerate_backup_codes()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $verificationCode = $this->di['request']->get('verification_code');
        
        if (empty($verificationCode)) {
            $this->di['flash']->set('error', 'Verification code is required');
            return $this->redirect('/client/mfa/settings');
        }
        
        try {
            $backupCodes = $service->regenerateBackupCodes($client->id, $verificationCode);
            $this->di['flash']->set('success', 'Backup codes regenerated successfully!');
            return $this->redirect('/client/mfa/settings');
        } catch (\Exception $e) {
            $this->di['flash']->set('error', $e->getMessage());
            return $this->redirect('/client/mfa/settings');
        }
    }

    /**
     * Generate device fingerprint
     */
    private function generateDeviceFingerprint(): string
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
        
        return hash('sha256', $userAgent . $ip . $acceptLanguage);
    }
}