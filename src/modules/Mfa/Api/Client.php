<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Mfa\Api;

class Client extends \Api_Abstract
{
    /**
     * Get MFA status for current client
     */
    public function status()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $isEnabled = $service->isMfaEnabled($client->id);
        $settings = $isEnabled ? $service->getMfaSettings($client->id) : null;
        
        return [
            'enabled' => $isEnabled,
            'backup_codes_count' => $settings ? count($settings['backup_codes']) : 0,
            'has_backup_codes' => $settings ? !empty($settings['backup_codes']) : false
        ];
    }

    /**
     * Generate MFA secret and QR code
     */
    public function generate_secret()
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        if ($service->isMfaEnabled($client->id)) {
            throw new \FOSSBilling\InformationException('MFA is already enabled for this client');
        }
        
        return $service->generateMfaSecret($client->id, $client->email);
    }

    /**
     * Enable MFA for current client
     */
    public function enable($data)
    {
        $required = ['secret', 'verification_code'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $service->enableMfa($client->id, $data['secret'], $data['verification_code']);
        
        return ['success' => true, 'message' => 'MFA has been enabled successfully'];
    }

    /**
     * Disable MFA for current client
     */
    public function disable($data)
    {
        $required = ['verification_code'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $service->disableMfa($client->id, $data['verification_code']);
        
        return ['success' => true, 'message' => 'MFA has been disabled successfully'];
    }

    /**
     * Verify MFA code
     */
    public function verify($data)
    {
        $required = ['code'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $isValid = $service->verifyMfaCode($client->id, $data['code']);
        
        if (!$isValid) {
            throw new \FOSSBilling\InformationException('Invalid MFA code');
        }
        
        return ['success' => true, 'message' => 'MFA code verified successfully'];
    }

    /**
     * Regenerate backup codes
     */
    public function regenerate_backup_codes($data)
    {
        $required = ['verification_code'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $backupCodes = $service->regenerateBackupCodes($client->id, $data['verification_code']);
        
        return [
            'success' => true,
            'backup_codes' => $backupCodes,
            'message' => 'Backup codes regenerated successfully'
        ];
    }

    /**
     * Get MFA logs for current client
     */
    public function logs($data)
    {
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $limit = $data['limit'] ?? 50;
        $logs = $service->getMfaLogs($client->id, $limit);
        
        return $logs;
    }

    /**
     * Remember device for MFA
     */
    public function remember_device($data)
    {
        $required = ['device_fingerprint'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $days = $data['days'] ?? 30;
        $sessionToken = $service->rememberDevice($client->id, $data['device_fingerprint'], $days);
        
        return [
            'success' => true,
            'session_token' => $sessionToken,
            'message' => 'Device remembered successfully'
        ];
    }

    /**
     * Check if device is remembered
     */
    public function is_device_remembered($data)
    {
        $required = ['device_fingerprint'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $client = $this->getIdentity();
        $service = $this->getService();
        
        $isRemembered = $service->isDeviceRemembered($client->id, $data['device_fingerprint']);
        
        return ['remembered' => $isRemembered];
    }
}