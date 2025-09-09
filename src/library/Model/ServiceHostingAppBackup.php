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
 * Service Hosting Application Backup model.
 */
class Model_ServiceHostingAppBackup extends RedBean_SimpleModel
{
    public const STATUS_CREATING = 'creating';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_FAILED = 'failed';
    public const STATUS_RESTORING = 'restoring';
    public const STATUS_DELETING = 'deleting';
}