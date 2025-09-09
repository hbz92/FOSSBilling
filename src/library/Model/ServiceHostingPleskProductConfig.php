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
 * Service Hosting Plesk Product Configuration model.
 */
class Model_ServiceHostingPleskProductConfig extends RedBean_SimpleModel
{
    public const FEATURE_AUTO_INSTALLER = 'auto_installer';
    public const FEATURE_REMOTE_MANAGEMENT = 'remote_management';
    public const FEATURE_POWER_USER_VIEW = 'power_user_view';
    public const FEATURE_CLIENT_SYNC = 'client_sync';
    public const FEATURE_METRIC_BILLING = 'metric_billing';
}