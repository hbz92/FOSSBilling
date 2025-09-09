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

class Admin extends \Api_Abstract
{
    /**
     * Get MFA status for a specific client
     */
    public function client_status($data)
    {
        $required = ['client_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $clientId = (int) $data['client_id'];
        $service = $this->getService();
        
        $isEnabled = $service->isMfaEnabled($clientId);
        $settings = $isEnabled ? $service->getMfaSettings($clientId) : null;
        
        return [
            'client_id' => $clientId,
            'enabled' => $isEnabled,
            'backup_codes_count' => $settings ? count($settings['backup_codes']) : 0,
            'created_at' => $settings ? $settings['created_at'] : null,
            'updated_at' => $settings ? $settings['updated_at'] : null
        ];
    }

    /**
     * Get MFA logs for a specific client
     */
    public function client_logs($data)
    {
        $required = ['client_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $clientId = (int) $data['client_id'];
        $service = $this->getService();
        
        $limit = $data['limit'] ?? 50;
        $logs = $service->getMfaLogs($clientId, $limit);
        
        return $logs;
    }

    /**
     * Get all clients with MFA enabled
     */
    public function enabled_clients($data)
    {
        $db = $this->di['db'];
        $limit = $data['limit'] ?? 100;
        $offset = $data['offset'] ?? 0;
        
        $sql = "SELECT 
                    ms.client_id,
                    c.first_name,
                    c.last_name,
                    c.email,
                    ms.enabled,
                    ms.created_at,
                    ms.updated_at,
                    (SELECT COUNT(*) FROM mfa_logs ml WHERE ml.client_id = ms.client_id AND ml.success = 1) as successful_logins,
                    (SELECT COUNT(*) FROM mfa_logs ml WHERE ml.client_id = ms.client_id AND ml.success = 0) as failed_attempts
                FROM mfa_settings ms
                JOIN client c ON c.id = ms.client_id
                WHERE ms.enabled = 1
                ORDER BY ms.updated_at DESC
                LIMIT :limit OFFSET :offset";
        
        $clients = $db->getAll($sql, [
            ':limit' => $limit,
            ':offset' => $offset
        ]);
        
        $total = $db->getCell("SELECT COUNT(*) FROM mfa_settings WHERE enabled = 1");
        
        return [
            'clients' => $clients,
            'total' => $total,
            'limit' => $limit,
            'offset' => $offset
        ];
    }

    /**
     * Get MFA statistics
     */
    public function statistics()
    {
        $db = $this->di['db'];
        
        $stats = [];
        
        // Total clients with MFA enabled
        $stats['total_enabled'] = $db->getCell("SELECT COUNT(*) FROM mfa_settings WHERE enabled = 1");
        
        // Total clients
        $stats['total_clients'] = $db->getCell("SELECT COUNT(*) FROM client");
        
        // MFA adoption rate
        $stats['adoption_rate'] = $stats['total_clients'] > 0 
            ? round(($stats['total_enabled'] / $stats['total_clients']) * 100, 2) 
            : 0;
        
        // Successful logins today
        $stats['successful_logins_today'] = $db->getCell(
            "SELECT COUNT(*) FROM mfa_logs WHERE success = 1 AND DATE(created_at) = CURDATE()"
        );
        
        // Failed attempts today
        $stats['failed_attempts_today'] = $db->getCell(
            "SELECT COUNT(*) FROM mfa_logs WHERE success = 0 AND DATE(created_at) = CURDATE()"
        );
        
        // Successful logins this week
        $stats['successful_logins_week'] = $db->getCell(
            "SELECT COUNT(*) FROM mfa_logs WHERE success = 1 AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)"
        );
        
        // Failed attempts this week
        $stats['failed_attempts_week'] = $db->getCell(
            "SELECT COUNT(*) FROM mfa_logs WHERE success = 0 AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)"
        );
        
        // Recent activity (last 24 hours)
        $stats['recent_activity'] = $db->getAll(
            "SELECT 
                ml.client_id,
                c.first_name,
                c.last_name,
                c.email,
                ml.success,
                ml.method,
                ml.ip_address,
                ml.created_at
            FROM mfa_logs ml
            JOIN client c ON c.id = ml.client_id
            WHERE ml.created_at >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
            ORDER BY ml.created_at DESC
            LIMIT 50"
        );
        
        return $stats;
    }

    /**
     * Clean expired MFA sessions
     */
    public function clean_sessions()
    {
        $service = $this->getService();
        $cleaned = $service->cleanExpiredSessions();
        
        return [
            'success' => true,
            'cleaned_count' => $cleaned,
            'message' => "Cleaned {$cleaned} expired MFA sessions"
        ];
    }

    /**
     * Force disable MFA for a client (admin only)
     */
    public function force_disable($data)
    {
        $required = ['client_id'];
        $this->di['validator']->checkRequiredParamsForArray($required, $data);
        
        $clientId = (int) $data['client_id'];
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
        
        // Log the action
        $service = $this->getService();
        $service->logMfaAction($clientId, 'force_disabled_by_admin', true);
        
        return [
            'success' => true,
            'message' => 'MFA has been force disabled for this client'
        ];
    }

    /**
     * Get MFA configuration
     */
    public function config()
    {
        $config = $this->di['mod_config']('mfa');
        
        return [
            'enabled' => $config['enabled'] ?? true,
            'require_mfa' => $config['require_mfa'] ?? false,
            'remember_device_days' => $config['remember_device_days'] ?? 30,
            'backup_codes_count' => $config['backup_codes_count'] ?? 10,
            'rate_limit_attempts' => $config['rate_limit_attempts'] ?? 5,
            'rate_limit_window' => $config['rate_limit_window'] ?? 300
        ];
    }

    /**
     * Update MFA configuration
     */
    public function update_config($data)
    {
        $allowedKeys = [
            'enabled',
            'require_mfa', 
            'remember_device_days',
            'backup_codes_count',
            'rate_limit_attempts',
            'rate_limit_window'
        ];
        
        $config = [];
        foreach ($allowedKeys as $key) {
            if (isset($data[$key])) {
                $config[$key] = $data[$key];
            }
        }
        
        if (empty($config)) {
            throw new \FOSSBilling\InformationException('No valid configuration provided');
        }
        
        $this->di['mod_config']('mfa', $config);
        
        return [
            'success' => true,
            'message' => 'MFA configuration updated successfully'
        ];
    }
}