<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Mfa\Tests;

use PHPUnit\Framework\TestCase;
use Box\Mod\Mfa\Service;

class MfaTest extends TestCase
{
    private $service;
    private $di;

    protected function setUp(): void
    {
        // Mock DI container
        $this->di = $this->createMock(\Pimple\Container::class);
        $this->service = new Service();
        $this->service->setDi($this->di);
    }

    public function testGenerateMfaSecret()
    {
        $clientId = 1;
        $email = 'test@example.com';
        
        $result = $this->service->generateMfaSecret($clientId, $email);
        
        $this->assertIsArray($result);
        $this->assertArrayHasKey('secret', $result);
        $this->assertArrayHasKey('qr_code', $result);
        $this->assertArrayHasKey('manual_entry_key', $result);
        $this->assertNotEmpty($result['secret']);
        $this->assertStringStartsWith('data:image/png;base64,', $result['qr_code']);
    }

    public function testGenerateBackupCodes()
    {
        $reflection = new \ReflectionClass($this->service);
        $method = $reflection->getMethod('generateBackupCodes');
        $method->setAccessible(true);
        
        $codes = $method->invoke($this->service, 5);
        
        $this->assertIsArray($codes);
        $this->assertCount(5, $codes);
        
        foreach ($codes as $code) {
            $this->assertIsString($code);
            $this->assertEquals(8, strlen($code));
            $this->assertMatchesRegularExpression('/^[A-Z0-9]{8}$/', $code);
        }
    }

    public function testIsMfaEnabled()
    {
        // Mock database
        $db = $this->createMock(\stdClass::class);
        $db->method('getRow')->willReturn(['enabled' => 1]);
        
        $this->di->method('offsetGet')->with('db')->willReturn($db);
        
        $result = $this->service->isMfaEnabled(1);
        
        $this->assertTrue($result);
    }

    public function testIsMfaDisabled()
    {
        // Mock database
        $db = $this->createMock(\stdClass::class);
        $db->method('getRow')->willReturn(false);
        
        $this->di->method('offsetGet')->with('db')->willReturn($db);
        
        $result = $this->service->isMfaEnabled(1);
        
        $this->assertFalse($result);
    }

    public function testVerifyMfaCode()
    {
        // This test would require mocking the TOTP verification
        // For now, we'll test the method exists and has correct signature
        $this->assertTrue(method_exists($this->service, 'verifyMfaCode'));
        
        $reflection = new \ReflectionClass($this->service);
        $method = $reflection->getMethod('verifyMfaCode');
        $params = $method->getParameters();
        
        $this->assertCount(2, $params);
        $this->assertEquals('clientId', $params[0]->getName());
        $this->assertEquals('code', $params[1]->getName());
    }

    public function testModulePermissions()
    {
        $permissions = $this->service->getModulePermissions();
        
        $this->assertIsArray($permissions);
        $this->assertArrayHasKey('can_always_access', $permissions);
        $this->assertArrayHasKey('manage_mfa', $permissions);
        $this->assertTrue($permissions['can_always_access']);
    }
}