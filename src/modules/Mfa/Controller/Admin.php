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

class Admin extends \FOSSBilling\Controller
{
    /**
     * MFA admin dashboard
     */
    public function index()
    {
        $service = $this->getService();
        $stats = $service->getStatistics();
        
        return $this->render('mod_mfa_index', [
            'stats' => $stats
        ]);
    }

    /**
     * Get enabled clients
     */
    public function enabled_clients()
    {
        $service = $this->getService();
        $clients = $service->getEnabledClients();
        
        return $this->render('mod_mfa_enabled_clients', [
            'clients' => $clients
        ]);
    }

    /**
     * Get MFA statistics
     */
    public function statistics()
    {
        $service = $this->getService();
        $stats = $service->getStatistics();
        
        return $this->render('mod_mfa_statistics', [
            'stats' => $stats
        ]);
    }

    /**
     * Clean expired sessions
     */
    public function clean_sessions()
    {
        $service = $this->getService();
        $cleaned = $service->cleanExpiredSessions();
        
        return $this->render('mod_mfa_clean_sessions', [
            'cleaned_count' => $cleaned
        ]);
    }

    /**
     * Force disable MFA for a client
     */
    public function force_disable()
    {
        $clientId = $this->di['request']->get('client_id');
        if (!$clientId) {
            throw new \FOSSBilling\InformationException('Client ID is required');
        }

        $service = $this->getService();
        $service->forceDisableMfa($clientId);
        
        return $this->render('mod_mfa_force_disable', [
            'client_id' => $clientId
        ]);
    }

    /**
     * Get client logs
     */
    public function client_logs()
    {
        $clientId = $this->di['request']->get('id');
        if (!$clientId) {
            throw new \FOSSBilling\InformationException('Client ID is required');
        }

        $service = $this->getService();
        $logs = $service->getMfaLogs($clientId);
        
        return $this->render('mod_mfa_client_logs', [
            'client_id' => $clientId,
            'logs' => $logs
        ]);
    }

    /**
     * Get client status
     */
    public function client_status()
    {
        $clientId = $this->di['request']->get('id');
        if (!$clientId) {
            throw new \FOSSBilling\InformationException('Client ID is required');
        }

        $service = $this->getService();
        $isEnabled = $service->isMfaEnabled($clientId);
        $settings = $isEnabled ? $service->getMfaSettings($clientId) : null;
        
        return $this->render('mod_mfa_client_status', [
            'client_id' => $clientId,
            'enabled' => $isEnabled,
            'settings' => $settings
        ]);
    }
}