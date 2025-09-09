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

class Admin implements \FOSSBilling\InjectionAwareInterface
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

    public function fetchNavigation()
    {
        return [
            'group' => [
                'index' => 500,
                'location' => 'mfa',
                'label' => __trans('MFA'),
                'class' => 'security',
            ],
            'subpages' => [
                [
                    'location' => 'mfa',
                    'label' => __trans('Overview'),
                    'uri' => $this->di['url']->adminLink('mfa'),
                    'index' => 100,
                    'class' => '',
                ],
            ],
        ];
    }

    public function register(\Box_App &$app)
    {
        $app->get('/mfa', 'get_index', [], static::class);
        $app->get('/mfa/', 'get_index', [], static::class);
        $app->get('/mfa/index', 'get_index', [], static::class);
        $app->get('/mfa/settings', 'get_settings', [], static::class);
        $app->get('/mfa/clients', 'get_clients', [], static::class);
        $app->get('/mfa/logs', 'get_logs', [], static::class);
        $app->get('/mfa/enabled-clients', 'get_enabled_clients', [], static::class);
        $app->get('/mfa/statistics', 'get_statistics', [], static::class);
        $app->get('/mfa/clean-sessions', 'get_clean_sessions', [], static::class);
        $app->get('/mfa/force-disable/:client_id', 'get_force_disable', ['client_id' => '[0-9]+'], static::class);
        $app->get('/mfa/client-logs/:id', 'get_client_logs', ['id' => '[0-9]+'], static::class);
        $app->get('/mfa/client-status/:id', 'get_client_status', ['id' => '[0-9]+'], static::class);
    }

    public function get_index(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        
        // Check if a specific tab is requested
        $tab = $app->getQuery('tab');
        
        switch ($tab) {
            case 'settings':
                return $this->get_settings($app);
            case 'clients':
                return $this->get_clients($app);
            case 'logs':
                return $this->get_logs($app);
            default:
                // Show overview by default
                $service = $this->getService();
                $stats = $service->getStatistics();
                
                return $app->render('mod_mfa_index', [
                    'stats' => $stats
                ]);
        }
    }
    
    public function get_settings(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        
        // Get current settings from database or config
        $settings = $service->getGlobalSettings();
        
        return $app->render('mod_mfa_settings', [
            'settings' => $settings
        ]);
    }
    
    public function get_clients(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        
        // Get list of clients with MFA status
        $clients = $service->getAllClientsWithMfaStatus();
        
        return $app->render('mod_mfa_clients', [
            'clients' => $clients
        ]);
    }
    
    public function get_logs(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        
        // Get MFA activity logs
        $logs = $service->getAllMfaLogs();
        
        return $app->render('mod_mfa_logs', [
            'logs' => $logs
        ]);
    }

    public function get_enabled_clients(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        $clients = $service->getEnabledClients();
        
        return $app->render('mod_mfa_enabled_clients', [
            'clients' => $clients
        ]);
    }

    public function get_statistics(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        $stats = $service->getStatistics();
        
        return $app->render('mod_mfa_statistics', [
            'stats' => $stats
        ]);
    }

    public function get_clean_sessions(\Box_App $app)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        $cleaned = $service->cleanExpiredSessions();
        
        return $app->render('mod_mfa_clean_sessions', [
            'cleaned_count' => $cleaned
        ]);
    }

    public function get_force_disable(\Box_App $app, $client_id)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        $service->forceDisableMfa($client_id);
        
        return $app->render('mod_mfa_force_disable', [
            'client_id' => $client_id
        ]);
    }

    public function get_client_logs(\Box_App $app, $id)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        $logs = $service->getMfaLogs($id);
        
        return $app->render('mod_mfa_client_logs', [
            'client_id' => $id,
            'logs' => $logs
        ]);
    }

    public function get_client_status(\Box_App $app, $id)
    {
        $this->di['is_admin_logged'];
        $service = $this->getService();
        $isEnabled = $service->isMfaEnabled($id);
        $settings = $isEnabled ? $service->getMfaSettings($id) : null;
        
        return $app->render('mod_mfa_client_status', [
            'client_id' => $id,
            'enabled' => $isEnabled,
            'settings' => $settings
        ]);
    }

    private function getService()
    {
        return $this->di['mod_service']('mfa');
    }
}