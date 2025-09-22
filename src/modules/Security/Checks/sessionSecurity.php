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

class sessionSecurity implements \FOSSBilling\Interfaces\SecurityCheckInterface
{
    public function getName(): string
    {
        return __trans('Session Security');
    }

    public function getDescription(): string
    {
        return __trans('Checks PHP session security configuration settings.');
    }

    public function performCheck(): SecurityCheckResult
    {
        $issues = [];
        $warnings = [];
        
        // Check session.cookie_httponly
        if (!ini_get('session.cookie_httponly')) {
            $issues[] = __trans('session.cookie_httponly is disabled. This makes cookies accessible via JavaScript, increasing XSS risk.');
        }
        
        // Check session.cookie_secure (only warn if HTTPS is available)
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' && !ini_get('session.cookie_secure')) {
            $warnings[] = __trans('session.cookie_secure is disabled despite HTTPS being available.');
        }
        
        // Check session.use_strict_mode
        if (!ini_get('session.use_strict_mode')) {
            $issues[] = __trans('session.use_strict_mode is disabled. This allows session fixation attacks.');
        }
        
        // Check session.cookie_samesite
        $sameSite = ini_get('session.cookie_samesite');
        if (empty($sameSite) || !in_array(strtolower($sameSite), ['strict', 'lax'])) {
            $warnings[] = __trans('session.cookie_samesite should be set to "Strict" or "Lax" for CSRF protection.');
        }
        
        // Check session regeneration - this is more complex to check programmatically
        // We'll check if the application config mentions session fingerprinting
        $config = \FOSSBilling\Config::getConfig();
        if (!($config['security']['perform_session_fingerprinting'] ?? false)) {
            $warnings[] = __trans('Session fingerprinting is disabled in configuration, consider enabling for enhanced security.');
        }
        
        // Check session lifetime
        $sessionLifetime = $config['security']['session_lifespan'] ?? 7200;
        if ($sessionLifetime > 86400) { // More than 24 hours
            $warnings[] = __trans('Session lifetime is set to more than 24 hours, consider reducing for better security.');
        }
        
        if (!empty($issues)) {
            $result = __trans('Critical session security issues found:') . "\n";
            foreach ($issues as $issue) {
                $result .= "• " . $issue . "\n";
            }
            
            if (!empty($warnings)) {
                $result .= "\n" . __trans('Additional warnings:') . "\n";
                foreach ($warnings as $warning) {
                    $result .= "• " . $warning . "\n";
                }
            }
            
            return new SecurityCheckResult(SecurityCheckResultEnum::FAIL, trim($result));
        }
        
        if (!empty($warnings)) {
            $result = __trans('Session security warnings:') . "\n";
            foreach ($warnings as $warning) {
                $result .= "• " . $warning . "\n";
            }
            
            return new SecurityCheckResult(SecurityCheckResultEnum::WARN, trim($result));
        }
        
        return new SecurityCheckResult(SecurityCheckResultEnum::PASS, __trans('Session security configuration is properly set.'));
    }
}