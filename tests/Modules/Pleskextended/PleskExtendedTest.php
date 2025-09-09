<?php

declare(strict_types=1);
/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Pleskextended;

use FOSSBilling\InjectionAwareInterface;
use FOSSBilling\Service;
use PHPUnit\Framework\TestCase;

class PleskExtendedTest extends TestCase
{
    protected ?Service $service = null;
    protected ?\Pimple\Container $di = null;

    protected function setUp(): void
    {
        $this->di = new \Pimple\Container();
        $this->service = new Service();
        $this->service->setDi($this->di);
    }

    public function testServiceImplementsInjectionAwareInterface(): void
    {
        $this->assertInstanceOf(InjectionAwareInterface::class, $this->service);
    }

    public function testServiceCanSetAndGetDi(): void
    {
        $this->service->setDi($this->di);
        $this->assertSame($this->di, $this->service->getDi());
    }

    public function testIsPleskServiceWithValidPleskService(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        $result = $this->service->isPleskService($hostingService);
        $this->assertTrue($result);
    }

    public function testIsPleskServiceWithInvalidService(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'cPanel';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        $result = $this->service->isPleskService($hostingService);
        $this->assertFalse($result);
    }

    public function testGetPleskUrlsReturnsEmptyArrayOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->getPleskUrls($hostingService);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testGetHostingServiceByOrderIdWithValidOrder(): void
    {
        // Mock order
        $order = $this->createMock(\Model_ClientOrder::class);

        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($order);

        $this->di['db'] = $db;

        // Mock order service
        $orderService = $this->createMock(\Box\Mod\Order\Service::class);
        $orderService->method('getOrderService')
            ->willReturn($hostingService);

        $this->di['mod_service'] = function ($name) use ($orderService) {
            if ($name === 'order') {
                return $orderService;
            }
            return null;
        };

        $result = $this->service->getHostingServiceByOrderId(1);
        $this->assertInstanceOf(\Model_ServiceHosting::class, $result);
    }

    public function testGetHostingServiceByOrderIdWithInvalidOrder(): void
    {
        // Mock database to throw exception
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willThrowException(new \Exception('Order not found'));

        $this->di['db'] = $db;

        $this->expectException(\FOSSBilling\Exception::class);
        $this->service->getHostingServiceByOrderId(999);
    }

    public function testGetHostingServiceByOrderIdForClientWithValidOrder(): void
    {
        // Mock order
        $order = $this->createMock(\Model_ClientOrder::class);

        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('findOne')
            ->willReturn($order);

        $this->di['db'] = $db;

        // Mock order service
        $orderService = $this->createMock(\Box\Mod\Order\Service::class);
        $orderService->method('getOrderService')
            ->willReturn($hostingService);

        $this->di['mod_service'] = function ($name) use ($orderService) {
            if ($name === 'order') {
                return $orderService;
            }
            return null;
        };

        $result = $this->service->getHostingServiceByOrderIdForClient(1, 1);
        $this->assertInstanceOf(\Model_ServiceHosting::class, $result);
    }

    public function testGetHostingServiceByOrderIdForClientWithInvalidOrder(): void
    {
        // Mock database to return null
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('findOne')
            ->willReturn(null);

        $this->di['db'] = $db;

        $this->expectException(\FOSSBilling\Exception::class);
        $this->service->getHostingServiceByOrderIdForClient(999, 1);
    }

    public function testGetHostingServiceByOrderIdForClientWithNonHostingService(): void
    {
        // Mock order
        $order = $this->createMock(\Model_ClientOrder::class);

        // Mock non-hosting service
        $service = $this->createMock(\Model_Service::class);

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('findOne')
            ->willReturn($order);

        $this->di['db'] = $db;

        // Mock order service
        $orderService = $this->createMock(\Box\Mod\Order\Service::class);
        $orderService->method('getOrderService')
            ->willReturn($service);

        $this->di['mod_service'] = function ($name) use ($orderService) {
            if ($name === 'order') {
                return $orderService;
            }
            return null;
        };

        $this->expectException(\FOSSBilling\Exception::class);
        $this->service->getHostingServiceByOrderIdForClient(1, 1);
    }

    public function testGetAddonDomainsReturnsEmptyArrayOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->getAddonDomains($hostingService);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testAddAddonDomainReturnsFalseOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->addAddonDomain($hostingService, 'example.com');
        $this->assertFalse($result);
    }

    public function testCreateDatabaseReturnsFalseOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->createDatabase($hostingService, 'testdb', 'mysql');
        $this->assertFalse($result);
    }

    public function testCreateEmailAddressReturnsFalseOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->createEmailAddress($hostingService, 'test@example.com', 'password');
        $this->assertFalse($result);
    }

    public function testCreateFtpAccountReturnsFalseOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->createFtpAccount($hostingService, 'testuser', 'password', '/');
        $this->assertFalse($result);
    }

    public function testCreateSubdomainReturnsFalseOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->createSubdomain($hostingService, 'test');
        $this->assertFalse($result);
    }

    public function testUpdatePhpSettingsReturnsFalseOnError(): void
    {
        // Mock hosting service
        $hostingService = $this->createMock(\Model_ServiceHosting::class);
        $hostingService->service_hosting_server_id = 1;

        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->updatePhpSettings($hostingService, ['version' => '8.1']);
        $this->assertFalse($result);
    }

    public function testGetAllPleskProductsReturnsEmptyArrayOnError(): void
    {
        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->getAllPleskProducts($server);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testGetAllPleskServersReturnsEmptyArrayOnError(): void
    {
        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->getAllPleskServers($server);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testGetAllPleskCustomersReturnsEmptyArrayOnError(): void
    {
        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->getAllPleskCustomers($server);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testGetServerStatisticsReturnsEmptyArrayOnError(): void
    {
        // Mock server
        $server = $this->createMock(\Model_ServiceHostingServer::class);
        $server->manager = 'Plesk';

        // Mock database
        $db = $this->createMock(\RedBeanPHP\OODBBean::class);
        $db->method('getExistingModelById')
            ->willReturn($server);

        $this->di['db'] = $db;

        // Mock logger
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->di['logger'] = $logger;

        $result = $this->service->getServerStatistics($server);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}