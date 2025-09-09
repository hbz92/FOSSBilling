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
 * Service Hosting Application Installation model.
 */
class Model_ServiceHostingAppInstallation extends RedBean_SimpleModel
{
    public const STATUS_INSTALLING = 'installing';
    public const STATUS_INSTALLED = 'installed';
    public const STATUS_FAILED = 'failed';
    public const STATUS_UPDATING = 'updating';
    public const STATUS_DELETING = 'deleting';

    public const INSTALLER_PLESK = 'plesk';
    public const INSTALLER_INSTALLATRON = 'installatron';
    public const INSTALLER_SOFTACULOUS = 'softaculous';
}