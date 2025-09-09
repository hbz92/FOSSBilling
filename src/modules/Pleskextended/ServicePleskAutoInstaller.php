<?php

declare(strict_types=1);
/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Pleskextended;

use FOSSBilling\Exception;
use FOSSBilling\InjectionAwareInterface;

class ServicePleskAutoInstaller implements InjectionAwareInterface
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

    /**
     * Get available applications for a specific installer type
     *
     * @param string $installerType
     * @return array
     */
    public function getAvailableApplications(string $installerType = 'plesk'): array
    {
        switch ($installerType) {
            case 'installatron':
                return $this->getInstallatronApplications();
            case 'softaculous':
                return $this->getSoftaculousApplications();
            case 'plesk':
            default:
                return $this->getPleskApplications();
        }
    }

    /**
     * Get application categories
     *
     * @param string $installerType
     * @return array
     */
    public function getApplicationCategories(string $installerType = 'plesk'): array
    {
        $applications = $this->getAvailableApplications($installerType);
        $categories = [];

        foreach ($applications as $app) {
            if (!in_array($app['category'], $categories)) {
                $categories[] = $app['category'];
            }
        }

        return $categories;
    }

    /**
     * Get installer types
     *
     * @return array
     */
    public function getInstallerTypes(): array
    {
        return [
            'plesk' => 'Plesk Default App Installer',
            'installatron' => 'Installatron',
            'softaculous' => 'Softaculous',
        ];
    }

    /**
     * Install application
     *
     * @param \Model_ServiceHosting $hostingService
     * @param string $appName
     * @param array $options
     * @param string $installerType
     * @return bool
     */
    public function installApplication(\Model_ServiceHosting $hostingService, string $appName, array $options = [], string $installerType = 'plesk'): bool
    {
        try {
            $pleskService = $this->di['mod_service']('pleskextended');
            [$manager, $account] = $pleskService->getServerAccount($hostingService);

            // Create installation record
            $installation = $this->di['db']->dispense('ServiceHostingAppInstallation');
            $installation->service_hosting_id = $hostingService->id;
            $installation->app_name = $appName;
            $installation->installer_type = $installerType;
            $installation->status = 'installing';
            $installation->options = json_encode($options);
            $installation->created_at = date('Y-m-d H:i:s');
            $installation->updated_at = date('Y-m-d H:i:s');
            $this->di['db']->store($installation);

            // Install application based on installer type
            $result = false;
            switch ($installerType) {
                case 'installatron':
                    $result = $this->installWithInstallatron($manager, $account, $appName, $options);
                    break;
                case 'softaculous':
                    $result = $this->installWithSoftaculous($manager, $account, $appName, $options);
                    break;
                case 'plesk':
                default:
                    $result = $this->installWithPlesk($manager, $account, $appName, $options);
                    break;
            }

            // Update installation status
            $installation->status = $result ? 'installed' : 'failed';
            $installation->updated_at = date('Y-m-d H:i:s');
            $this->di['db']->store($installation);

            return $result;
        } catch (\Exception $e) {
            $this->di['logger']->error('Error installing application: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get installed applications for a hosting service
     *
     * @param \Model_ServiceHosting $hostingService
     * @return array
     */
    public function getInstalledApplications(\Model_ServiceHosting $hostingService): array
    {
        $installations = $this->di['db']->find('ServiceHostingAppInstallation', 'service_hosting_id = ?', [$hostingService->id]);
        $apps = [];

        foreach ($installations as $installation) {
            $apps[] = [
                'id' => $installation->id,
                'app_name' => $installation->app_name,
                'installer_type' => $installation->installer_type,
                'status' => $installation->status,
                'options' => json_decode($installation->options ?? '{}', true),
                'created_at' => $installation->created_at,
                'updated_at' => $installation->updated_at,
            ];
        }

        return $apps;
    }

    /**
     * Create application backup
     *
     * @param \Model_ServiceHosting $hostingService
     * @param int $appId
     * @return bool
     */
    public function createApplicationBackup(\Model_ServiceHosting $hostingService, int $appId): bool
    {
        try {
            $installation = $this->di['db']->getExistingModelById('ServiceHostingAppInstallation', $appId, 'Application not found');

            if ($installation->service_hosting_id != $hostingService->id) {
                throw new Exception('Application does not belong to this service');
            }

            // Create backup record
            $backup = $this->di['db']->dispense('ServiceHostingAppBackup');
            $backup->app_installation_id = $appId;
            $backup->status = 'creating';
            $backup->created_at = date('Y-m-d H:i:s');
            $this->di['db']->store($backup);

            // Perform backup based on installer type
            $result = false;
            switch ($installation->installer_type) {
                case 'installatron':
                    $result = $this->backupWithInstallatron($installation, $backup);
                    break;
                case 'softaculous':
                    $result = $this->backupWithSoftaculous($installation, $backup);
                    break;
                case 'plesk':
                default:
                    $result = $this->backupWithPlesk($installation, $backup);
                    break;
            }

            // Update backup status
            $backup->status = $result ? 'completed' : 'failed';
            $backup->updated_at = date('Y-m-d H:i:s');
            $this->di['db']->store($backup);

            return $result;
        } catch (\Exception $e) {
            $this->di['logger']->error('Error creating application backup: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get application backups for a hosting service
     *
     * @param \Model_ServiceHosting $hostingService
     * @return array
     */
    public function getApplicationBackups(\Model_ServiceHosting $hostingService): array
    {
        $backups = $this->di['db']->getAll(
            'SELECT b.*, i.app_name, i.installer_type 
             FROM service_hosting_app_backup b 
             JOIN service_hosting_app_installation i ON b.app_installation_id = i.id 
             WHERE i.service_hosting_id = ? 
             ORDER BY b.created_at DESC',
            [$hostingService->id]
        );

        return $backups;
    }

    /**
     * Restore application backup
     *
     * @param \Model_ServiceHosting $hostingService
     * @param int $backupId
     * @return bool
     */
    public function restoreApplicationBackup(\Model_ServiceHosting $hostingService, int $backupId): bool
    {
        try {
            $backup = $this->di['db']->getExistingModelById('ServiceHostingAppBackup', $backupId, 'Backup not found');
            $installation = $this->di['db']->getExistingModelById('ServiceHostingAppInstallation', $backup->app_installation_id, 'Application not found');

            if ($installation->service_hosting_id != $hostingService->id) {
                throw new Exception('Backup does not belong to this service');
            }

            // Perform restore based on installer type
            $result = false;
            switch ($installation->installer_type) {
                case 'installatron':
                    $result = $this->restoreWithInstallatron($installation, $backup);
                    break;
                case 'softaculous':
                    $result = $this->restoreWithSoftaculous($installation, $backup);
                    break;
                case 'plesk':
                default:
                    $result = $this->restoreWithPlesk($installation, $backup);
                    break;
            }

            return $result;
        } catch (\Exception $e) {
            $this->di['logger']->error('Error restoring application backup: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete application
     *
     * @param \Model_ServiceHosting $hostingService
     * @param int $appId
     * @return bool
     */
    public function deleteApplication(\Model_ServiceHosting $hostingService, int $appId): bool
    {
        try {
            $installation = $this->di['db']->getExistingModelById('ServiceHostingAppInstallation', $appId, 'Application not found');

            if ($installation->service_hosting_id != $hostingService->id) {
                throw new Exception('Application does not belong to this service');
            }

            // Delete all backups first
            $this->di['db']->exec('DELETE FROM service_hosting_app_backup WHERE app_installation_id = ?', [$appId]);

            // Delete application based on installer type
            $result = false;
            switch ($installation->installer_type) {
                case 'installatron':
                    $result = $this->deleteWithInstallatron($installation);
                    break;
                case 'softaculous':
                    $result = $this->deleteWithSoftaculous($installation);
                    break;
                case 'plesk':
                default:
                    $result = $this->deleteWithPlesk($installation);
                    break;
            }

            // Delete installation record
            if ($result) {
                $this->di['db']->trash($installation);
            }

            return $result;
        } catch (\Exception $e) {
            $this->di['logger']->error('Error deleting application: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get Plesk applications
     *
     * @return array
     */
    private function getPleskApplications(): array
    {
        return [
            [
                'id' => 'wordpress',
                'name' => 'WordPress',
                'category' => 'CMS',
                'description' => 'The most popular content management system',
                'version' => '6.4',
                'icon' => 'wordpress.png',
            ],
            [
                'id' => 'joomla',
                'name' => 'Joomla',
                'category' => 'CMS',
                'description' => 'Open source content management system',
                'version' => '5.0',
                'icon' => 'joomla.png',
            ],
            [
                'id' => 'drupal',
                'name' => 'Drupal',
                'category' => 'CMS',
                'description' => 'Flexible content management platform',
                'version' => '10.1',
                'icon' => 'drupal.png',
            ],
            [
                'id' => 'phpbb',
                'name' => 'phpBB',
                'category' => 'Forum',
                'description' => 'Open source forum software',
                'version' => '3.3',
                'icon' => 'phpbb.png',
            ],
            [
                'id' => 'prestashop',
                'name' => 'PrestaShop',
                'category' => 'E-commerce',
                'description' => 'Open source e-commerce platform',
                'version' => '8.1',
                'icon' => 'prestashop.png',
            ],
        ];
    }

    /**
     * Get Installatron applications
     *
     * @return array
     */
    private function getInstallatronApplications(): array
    {
        // This would integrate with Installatron API
        // For now, return the same as Plesk
        return $this->getPleskApplications();
    }

    /**
     * Get Softaculous applications
     *
     * @return array
     */
    private function getSoftaculousApplications(): array
    {
        // This would integrate with Softaculous API
        // For now, return the same as Plesk
        return $this->getPleskApplications();
    }

    /**
     * Install with Plesk
     *
     * @param mixed $manager
     * @param mixed $account
     * @param string $appName
     * @param array $options
     * @return bool
     */
    private function installWithPlesk($manager, $account, string $appName, array $options): bool
    {
        // This would integrate with Plesk Application Installer
        // For now, return true as placeholder
        return true;
    }

    /**
     * Install with Installatron
     *
     * @param mixed $manager
     * @param mixed $account
     * @param string $appName
     * @param array $options
     * @return bool
     */
    private function installWithInstallatron($manager, $account, string $appName, array $options): bool
    {
        // This would integrate with Installatron API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Install with Softaculous
     *
     * @param mixed $manager
     * @param mixed $account
     * @param string $appName
     * @param array $options
     * @return bool
     */
    private function installWithSoftaculous($manager, $account, string $appName, array $options): bool
    {
        // This would integrate with Softaculous API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Backup with Plesk
     *
     * @param mixed $installation
     * @param mixed $backup
     * @return bool
     */
    private function backupWithPlesk($installation, $backup): bool
    {
        // This would integrate with Plesk backup system
        // For now, return true as placeholder
        return true;
    }

    /**
     * Backup with Installatron
     *
     * @param mixed $installation
     * @param mixed $backup
     * @return bool
     */
    private function backupWithInstallatron($installation, $backup): bool
    {
        // This would integrate with Installatron backup API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Backup with Softaculous
     *
     * @param mixed $installation
     * @param mixed $backup
     * @return bool
     */
    private function backupWithSoftaculous($installation, $backup): bool
    {
        // This would integrate with Softaculous backup API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Restore with Plesk
     *
     * @param mixed $installation
     * @param mixed $backup
     * @return bool
     */
    private function restoreWithPlesk($installation, $backup): bool
    {
        // This would integrate with Plesk restore system
        // For now, return true as placeholder
        return true;
    }

    /**
     * Restore with Installatron
     *
     * @param mixed $installation
     * @param mixed $backup
     * @return bool
     */
    private function restoreWithInstallatron($installation, $backup): bool
    {
        // This would integrate with Installatron restore API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Restore with Softaculous
     *
     * @param mixed $installation
     * @param mixed $backup
     * @return bool
     */
    private function restoreWithSoftaculous($installation, $backup): bool
    {
        // This would integrate with Softaculous restore API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Delete with Plesk
     *
     * @param mixed $installation
     * @return bool
     */
    private function deleteWithPlesk($installation): bool
    {
        // This would integrate with Plesk application deletion
        // For now, return true as placeholder
        return true;
    }

    /**
     * Delete with Installatron
     *
     * @param mixed $installation
     * @return bool
     */
    private function deleteWithInstallatron($installation): bool
    {
        // This would integrate with Installatron deletion API
        // For now, return true as placeholder
        return true;
    }

    /**
     * Delete with Softaculous
     *
     * @param mixed $installation
     * @return bool
     */
    private function deleteWithSoftaculous($installation): bool
    {
        // This would integrate with Softaculous deletion API
        // For now, return true as placeholder
        return true;
    }
}