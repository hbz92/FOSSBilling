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

namespace Tests\Modules\Servicehosting;

use Box\Mod\Servicehosting\ServicePleskAutoInstaller;
use PHPUnit\Framework\TestCase;

class PleskExtendedTest extends TestCase
{
    private ServicePleskAutoInstaller $autoInstaller;

    protected function setUp(): void
    {
        $this->autoInstaller = new ServicePleskAutoInstaller();
    }

    public function testGetAvailableApplications()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        
        $this->assertIsArray($applications);
        $this->assertArrayHasKey('wordpress', $applications);
        $this->assertArrayHasKey('joomla', $applications);
        $this->assertArrayHasKey('drupal', $applications);
        
        // Test WordPress application
        $wordpress = $applications['wordpress'];
        $this->assertEquals('WordPress', $wordpress['name']);
        $this->assertEquals('CMS', $wordpress['category']);
        $this->assertTrue($wordpress['configurable']);
        $this->assertArrayHasKey('options', $wordpress);
    }

    public function testGetCategories()
    {
        $categories = $this->autoInstaller->getCategories();
        
        $this->assertIsArray($categories);
        $this->assertArrayHasKey('CMS', $categories);
        $this->assertArrayHasKey('Forum', $categories);
        $this->assertArrayHasKey('E-commerce', $categories);
        $this->assertEquals('Content Management Systems', $categories['CMS']);
    }

    public function testGetInstallerTypes()
    {
        $installerTypes = $this->autoInstaller->getInstallerTypes();
        
        $this->assertIsArray($installerTypes);
        $this->assertArrayHasKey('plesk', $installerTypes);
        $this->assertArrayHasKey('installatron', $installerTypes);
        $this->assertArrayHasKey('softaculous', $installerTypes);
        $this->assertEquals('Plesk Default Installer', $installerTypes['plesk']);
    }

    public function testWordPressApplicationConfiguration()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        $wordpress = $applications['wordpress'];
        
        $this->assertArrayHasKey('options', $wordpress);
        $options = $wordpress['options'];
        
        // Test required options
        $this->assertArrayHasKey('site_name', $options);
        $this->assertArrayHasKey('admin_email', $options);
        $this->assertArrayHasKey('admin_username', $options);
        $this->assertArrayHasKey('admin_password', $options);
        
        // Test option properties
        $siteNameOption = $options['site_name'];
        $this->assertEquals('text', $siteNameOption['type']);
        $this->assertEquals('Site Name', $siteNameOption['label']);
        $this->assertTrue($siteNameOption['required']);
        $this->assertEquals('My WordPress Site', $siteNameOption['default']);
        
        $adminEmailOption = $options['admin_email'];
        $this->assertEquals('email', $adminEmailOption['type']);
        $this->assertEquals('Admin Email', $adminEmailOption['label']);
        $this->assertTrue($adminEmailOption['required']);
    }

    public function testJoomlaApplicationConfiguration()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        $joomla = $applications['joomla'];
        
        $this->assertEquals('Joomla', $joomla['name']);
        $this->assertEquals('CMS', $joomla['category']);
        $this->assertTrue($joomla['configurable']);
        
        $options = $joomla['options'];
        $this->assertArrayHasKey('site_name', $options);
        $this->assertArrayHasKey('admin_email', $options);
        $this->assertArrayHasKey('admin_username', $options);
        $this->assertArrayHasKey('admin_password', $options);
    }

    public function testDrupalApplicationConfiguration()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        $drupal = $applications['drupal'];
        
        $this->assertEquals('Drupal', $drupal['name']);
        $this->assertEquals('CMS', $drupal['category']);
        $this->assertTrue($drupal['configurable']);
        
        $options = $drupal['options'];
        $this->assertArrayHasKey('site_name', $options);
        $this->assertArrayHasKey('admin_email', $options);
        $this->assertArrayHasKey('admin_username', $options);
        $this->assertArrayHasKey('admin_password', $options);
    }

    public function testPhpBBApplicationConfiguration()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        $phpbb = $applications['phpbb'];
        
        $this->assertEquals('phpBB', $phpbb['name']);
        $this->assertEquals('Forum', $phpbb['category']);
        $this->assertTrue($phpbb['configurable']);
        
        $options = $phpbb['options'];
        $this->assertArrayHasKey('board_name', $options);
        $this->assertArrayHasKey('admin_email', $options);
        $this->assertArrayHasKey('admin_username', $options);
        $this->assertArrayHasKey('admin_password', $options);
    }

    public function testPrestaShopApplicationConfiguration()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        $prestashop = $applications['prestashop'];
        
        $this->assertEquals('PrestaShop', $prestashop['name']);
        $this->assertEquals('E-commerce', $prestashop['category']);
        $this->assertTrue($prestashop['configurable']);
        
        $options = $prestashop['options'];
        $this->assertArrayHasKey('shop_name', $options);
        $this->assertArrayHasKey('admin_email', $options);
        $this->assertArrayHasKey('admin_username', $options);
        $this->assertArrayHasKey('admin_password', $options);
    }

    public function testApplicationVersioning()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        
        foreach ($applications as $key => $app) {
            $this->assertArrayHasKey('version', $app);
            $this->assertEquals('latest', $app['version']);
        }
    }

    public function testApplicationIcons()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        
        foreach ($applications as $key => $app) {
            $this->assertArrayHasKey('icon', $app);
            $this->assertEquals($key, $app['icon']);
        }
    }

    public function testApplicationDescriptions()
    {
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        
        foreach ($applications as $key => $app) {
            $this->assertArrayHasKey('description', $app);
            $this->assertNotEmpty($app['description']);
            $this->assertIsString($app['description']);
        }
    }

    public function testNonConfigurableApplications()
    {
        // Test with a hypothetical non-configurable application
        $applications = $this->autoInstaller->getAvailableApplications('plesk');
        
        // All current applications are configurable
        foreach ($applications as $app) {
            $this->assertTrue($app['configurable']);
        }
    }

    public function testInstallerTypeValidation()
    {
        $validTypes = ['plesk', 'installatron', 'softaculous'];
        
        foreach ($validTypes as $type) {
            $applications = $this->autoInstaller->getAvailableApplications($type);
            $this->assertIsArray($applications);
        }
    }

    public function testDefaultInstallerType()
    {
        $applications = $this->autoInstaller->getAvailableApplications();
        $this->assertIsArray($applications);
        $this->assertNotEmpty($applications);
    }

    public function testEmptyInstallerTypes()
    {
        $installatronApps = $this->autoInstaller->getAvailableApplications('installatron');
        $softaculousApps = $this->autoInstaller->getAvailableApplications('softaculous');
        
        // These should return empty arrays as they're not implemented yet
        $this->assertIsArray($installatronApps);
        $this->assertIsArray($softaculousApps);
        $this->assertEmpty($installatronApps);
        $this->assertEmpty($softaculousApps);
    }
}