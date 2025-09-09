<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

// Client routes
$app->get('/client/mfa/setup', 'Box\Mod\Mfa\Controller\Client:setup');
$app->get('/client/mfa/settings', 'Box\Mod\Mfa\Controller\Client:settings');
$app->get('/client/mfa/verify', 'Box\Mod\Mfa\Controller\Client:verify');
$app->post('/client/mfa/enable', 'Box\Mod\Mfa\Controller\Client:enable');
$app->post('/client/mfa/disable', 'Box\Mod\Mfa\Controller\Client:disable');
$app->post('/client/mfa/process-verification', 'Box\Mod\Mfa\Controller\Client:process_verification');
$app->post('/client/mfa/regenerate-backup-codes', 'Box\Mod\Mfa\Controller\Client:regenerate_backup_codes');

// Admin routes
$app->get('/admin/mfa', 'Box\Mod\Mfa\Controller\Admin:index');
$app->get('/admin/mfa/clients', 'Box\Mod\Mfa\Controller\Admin:enabled_clients');
$app->get('/admin/mfa/statistics', 'Box\Mod\Mfa\Controller\Admin:statistics');
$app->post('/admin/mfa/clean-sessions', 'Box\Mod\Mfa\Controller\Admin:clean_sessions');
$app->post('/admin/mfa/force-disable', 'Box\Mod\Mfa\Controller\Admin:force_disable');
$app->get('/admin/mfa/client/:id/logs', 'Box\Mod\Mfa\Controller\Admin:client_logs');
$app->get('/admin/mfa/client/:id/status', 'Box\Mod\Mfa\Controller\Admin:client_status');