<?php

declare(strict_types=1);

/**
 * Copyright 2024 FOSSBilling
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

return [
    'enabled' => true,
    'require_mfa' => false, // Set to true to make MFA mandatory for all clients
    'remember_device_days' => 30,
    'backup_codes_count' => 10,
    'rate_limit_attempts' => 5,
    'rate_limit_window' => 300, // 5 minutes in seconds
    'qr_code_size' => 200,
    'issuer' => 'FOSSBilling',
    'algorithm' => 'sha1',
    'digits' => 6,
    'period' => 30
];