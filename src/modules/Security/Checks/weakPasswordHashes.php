<?php

/**
 * Copyright 2022-2025 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Security\Checks;

use FOSSBilling\Enums\SecurityCheckResultEnum;
use FOSSBilling\SecurityCheckResult;

class weakPasswordHashes implements \FOSSBilling\Interfaces\SecurityCheckInterface
{
    public function getName(): string
    {
        return __trans('Weak Password Hashes');
    }

    public function getDescription(): string
    {
        return __trans('Checks for users still using weak password hashes (SHA1) that should be migrated.');
    }

    public function performCheck(): SecurityCheckResult
    {
        $db = \Box_Di::getDefault()->get('db');
        
        // Check for SHA1 hashes in admin table (SHA1 hashes are exactly 40 characters long)
        $adminSha1Count = $db->getCell('SELECT COUNT(*) FROM admin WHERE LENGTH(pass) = 40');
        
        // Check for SHA1 hashes in client table
        $clientSha1Count = $db->getCell('SELECT COUNT(*) FROM client WHERE LENGTH(pass) = 40');
        
        $totalWeak = $adminSha1Count + $clientSha1Count;
        
        if ($totalWeak > 0) {
            $message = __trans('Found :count: users still using deprecated SHA1 password hashes.', [':count:' => $totalWeak]) . "\n";
            $message .= __trans('These passwords will be automatically upgraded on next login, but consider forcing password resets for security.');
            
            if ($adminSha1Count > 0) {
                $message .= "\n" . __trans('Admin accounts with weak hashes: :count:', [':count:' => $adminSha1Count]);
            }
            
            if ($clientSha1Count > 0) {
                $message .= "\n" . __trans('Client accounts with weak hashes: :count:', [':count:' => $clientSha1Count]);
            }
            
            return new SecurityCheckResult(SecurityCheckResultEnum::WARN, $message);
        }
        
        return new SecurityCheckResult(SecurityCheckResultEnum::PASS, __trans('All user passwords are using secure hashing algorithms.'));
    }
}