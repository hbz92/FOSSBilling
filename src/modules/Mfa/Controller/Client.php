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

class Client implements \FOSSBilling\InjectionAwareInterface
{
    protected ?\Pimple\Container $di = null;

    public function setDi(\Pimple\Container $di): void
    {
        $this->di = $di;
    }

    public function getDi(): ?\Pimple\Container
    {
        return $this->di;
    }

    public function register(\Box_App &$app)
    {
        $app->get('/client/mfa/setup', 'get_setup', [], static::class);
        $app->get('/client/mfa/settings', 'get_settings', [], static::class);
        $app->get('/client/mfa/verify', 'get_verify', [], static::class);
        $app->post('/client/mfa/enable', 'post_enable', [], static::class);
        $app->post('/client/mfa/disable', 'post_disable', [], static::class);
        $app->post('/client/mfa/regenerate-backup-codes', 'post_regenerate_backup_codes', [], static::class);
        $app->post('/client/mfa/process-verification', 'post_process_verification', [], static::class);
    }

    public function get_setup(\Box_App $app)
    {
        $this->di['is_client_logged'];
        $client = $this->getIdentity();
        $service = $this->getService();
        
        if ($service->isMfaEnabled($client->id)) {
            $app->redirect('/client/mfa/settings');
        }
        
        $secretData = $service->generateMfaSecret($client->id, $client->email);
        
        return $app->render('mod_mfa_setup', [
            'secret' => $secretData['secret'],
            'qr_code' => $secretData['qr_code'],
            'manual_entry_key' => $secretData['manual_entry_key']
        ]);
    }

    public function get_settings(\Box_App $app)
    {
        $this->di['is_client_logged'];
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $isEnabled = $service->isMfaEnabled($client->id);
        $settings = $isEnabled ? $service->getMfaSettings($client->id) : null;
        
        return $app->render('mod_mfa_settings', [
            'enabled' => $isEnabled,
            'backup_codes_count' => $settings ? count($settings['backup_codes']) : 0,
            'created_at' => $settings ? $settings['created_at'] : null
        ]);
    }

    public function get_verify(\Box_App $app)
    {
        $session = $this->di['session'];
        
        // Check if MFA verification is pending
        if (!$session->get('mfa_pending_client_id')) {
            $app->redirect('/client/login');
        }
        
        $clientId = $session->get('mfa_pending_client_id');
        $email = $session->get('mfa_pending_email');
        
        // Get client info
        $client = $this->di['db']->load('client', $clientId);
        if (!$client) {
            $session->delete('mfa_pending_client_id');
            $session->delete('mfa_pending_email');
            $session->delete('mfa_pending_password');
            $app->redirect('/client/login');
        }
        
        return $app->render('mod_mfa_verify', [
            'client_name' => $client->first_name . ' ' . $client->last_name,
            'email' => $email
        ]);
    }

    public function post_enable(\Box_App $app)
    {
        $this->di['is_client_logged'];
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $secret = $this->di['request']->get('secret');
        $verificationCode = $this->di['request']->get('verification_code');
        
        if (empty($secret) || empty($verificationCode)) {
            $this->di['flash']->set('error', 'Secret and verification code are required');
            $app->redirect('/client/mfa/setup');
        }
        
        try {
            $service->enableMfa($client->id, $secret, $verificationCode);
            $this->di['flash']->set('success', 'MFA has been enabled successfully!');
            $app->redirect('/client/mfa/settings');
        } catch (\Exception $e) {
            $this->di['flash']->set('error', $e->getMessage());
            $app->redirect('/client/mfa/setup');
        }
    }

    public function post_disable(\Box_App $app)
    {
        $this->di['is_client_logged'];
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $verificationCode = $this->di['request']->get('verification_code');
        
        if (empty($verificationCode)) {
            $this->di['flash']->set('error', 'Verification code is required');
            $app->redirect('/client/mfa/settings');
        }
        
        try {
            $service->disableMfa($client->id, $verificationCode);
            $this->di['flash']->set('success', 'MFA has been disabled successfully!');
            $app->redirect('/client/mfa/settings');
        } catch (\Exception $e) {
            $this->di['flash']->set('error', $e->getMessage());
            $app->redirect('/client/mfa/settings');
        }
    }

    public function post_regenerate_backup_codes(\Box_App $app)
    {
        $this->di['is_client_logged'];
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $verificationCode = $this->di['request']->get('verification_code');
        
        if (empty($verificationCode)) {
            $this->di['flash']->set('error', 'Verification code is required');
            $app->redirect('/client/mfa/settings');
        }
        
        try {
            $backupCodes = $service->regenerateBackupCodes($client->id, $verificationCode);
            $this->di['flash']->set('success', 'Backup codes regenerated successfully!');
            $app->redirect('/client/mfa/settings');
        } catch (\Exception $e) {
            $this->di['flash']->set('error', $e->getMessage());
            $app->redirect('/client/mfa/settings');
        }
    }

    public function post_process_verification(\Box_App $app)
    {
        $session = $this->di['session'];
        
        // Check if MFA verification is pending
        if (!$session->get('mfa_pending_client_id')) {
            $app->redirect('/client/login');
        }
        
        $clientId = $session->get('mfa_pending_client_id');
        $email = $session->get('mfa_pending_email');
        $password = $session->get('mfa_pending_password');
        
        $code = $this->di['request']->get('mfa_code');
        $rememberDevice = $this->di['request']->get('remember_device', false);
        
        if (empty($code)) {
            $this->di['flash']->set('error', 'Please enter your MFA code');
            $app->redirect('/client/mfa/verify');
        }
        
        $service = $this->getService();
        
        // Verify MFA code
        if (!$service->verifyMfaCode($clientId, $code)) {
            $this->di['flash']->set('error', 'Invalid MFA code. Please try again.');
            $app->redirect('/client/mfa/verify');
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
                $app->redirect('/client/dashboard');
            }
        } catch (\Exception $e) {
            $this->di['logger']->error('MFA login failed: ' . $e->getMessage());
        }
        
        $this->di['flash']->set('error', 'Login failed. Please try again.');
        $app->redirect('/client/login');
    }

    private function getService()
    {
        return $this->di['mod_service']('mfa');
    }

    private function getIdentity()
    {
        return $this->di['api_client']->profile_get();
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