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

/**
 * Service Hosting Plesk Configuration model.
 */
class Model_ServiceHostingPleskConfig extends RedBean_SimpleModel
{
    public const CONFIG_TYPE_GLOBAL = 'global';
    public const CONFIG_TYPE_SERVER = 'server';
    public const CONFIG_TYPE_PRODUCT = 'product';
}