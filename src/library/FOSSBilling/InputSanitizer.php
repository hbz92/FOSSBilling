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

namespace FOSSBilling;

/**
 * Enhanced input sanitization and validation helper
 * Provides centralized security functions for preventing XSS, SQL injection, and other attacks
 */
class InputSanitizer
{
    /**
     * Sanitize string input to prevent XSS attacks
     * 
     * @param string $input The input to sanitize
     * @param bool $allowHtml Whether to allow safe HTML tags
     * @return string Sanitized string
     */
    public static function sanitizeString(string $input, bool $allowHtml = false): string
    {
        if ($allowHtml) {
            // Allow only safe HTML tags
            $allowedTags = '<p><br><strong><em><u><i><b><ul><ol><li><a><h1><h2><h3><h4><h5><h6>';
            return strip_tags($input, $allowedTags);
        }
        
        return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    
    /**
     * Sanitize email address
     * 
     * @param string $email Email to sanitize
     * @return string|false Sanitized email or false if invalid
     */
    public static function sanitizeEmail(string $email): string|false
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : false;
    }
    
    /**
     * Sanitize URL
     * 
     * @param string $url URL to sanitize
     * @return string|false Sanitized URL or false if invalid
     */
    public static function sanitizeUrl(string $url): string|false
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return filter_var($url, FILTER_VALIDATE_URL) ? $url : false;
    }
    
    /**
     * Sanitize integer
     * 
     * @param mixed $int Value to sanitize as integer
     * @return int|false Sanitized integer or false if invalid
     */
    public static function sanitizeInt(mixed $int): int|false
    {
        return filter_var($int, FILTER_VALIDATE_INT);
    }
    
    /**
     * Sanitize float
     * 
     * @param mixed $float Value to sanitize as float
     * @return float|false Sanitized float or false if invalid
     */
    public static function sanitizeFloat(mixed $float): float|false
    {
        return filter_var($float, FILTER_VALIDATE_FLOAT);
    }
    
    /**
     * Sanitize boolean
     * 
     * @param mixed $bool Value to sanitize as boolean
     * @return bool
     */
    public static function sanitizeBool(mixed $bool): bool
    {
        return filter_var($bool, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
    }
    
    /**
     * Sanitize filename to prevent path traversal
     * 
     * @param string $filename Filename to sanitize
     * @return string Sanitized filename
     */
    public static function sanitizeFilename(string $filename): string
    {
        // Remove path traversal attempts and dangerous characters
        $filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename);
        $filename = preg_replace('/\.+/', '.', $filename); // Remove multiple dots
        return trim($filename, '.-');
    }
    
    /**
     * Sanitize SQL order by clause to prevent SQL injection
     * 
     * @param string $orderBy Order by clause
     * @param array $allowedColumns List of allowed column names
     * @return string Safe order by clause or default
     */
    public static function sanitizeOrderBy(string $orderBy, array $allowedColumns, string $default = 'id'): string
    {
        $parts = explode(' ', trim($orderBy));
        $column = $parts[0];
        $direction = strtoupper($parts[1] ?? 'ASC');
        
        if (!in_array($column, $allowedColumns, true)) {
            return $default . ' ASC';
        }
        
        if (!in_array($direction, ['ASC', 'DESC'], true)) {
            $direction = 'ASC';
        }
        
        return $column . ' ' . $direction;
    }
    
    /**
     * Validate and sanitize array of inputs
     * 
     * @param array $data Input data
     * @param array $rules Validation rules
     * @return array Sanitized data
     * @throws \InvalidArgumentException If validation fails
     */
    public static function validateAndSanitizeArray(array $data, array $rules): array
    {
        $sanitized = [];
        
        foreach ($rules as $key => $rule) {
            $value = $data[$key] ?? null;
            
            if ($rule['required'] ?? false && ($value === null || $value === '')) {
                throw new \InvalidArgumentException("Field {$key} is required");
            }
            
            if ($value !== null) {
                switch ($rule['type']) {
                    case 'string':
                        $sanitized[$key] = self::sanitizeString($value, $rule['allow_html'] ?? false);
                        break;
                    case 'email':
                        $sanitized[$key] = self::sanitizeEmail($value);
                        if ($sanitized[$key] === false && ($rule['required'] ?? false)) {
                            throw new \InvalidArgumentException("Field {$key} must be a valid email");
                        }
                        break;
                    case 'int':
                        $sanitized[$key] = self::sanitizeInt($value);
                        if ($sanitized[$key] === false && ($rule['required'] ?? false)) {
                            throw new \InvalidArgumentException("Field {$key} must be a valid integer");
                        }
                        break;
                    case 'float':
                        $sanitized[$key] = self::sanitizeFloat($value);
                        if ($sanitized[$key] === false && ($rule['required'] ?? false)) {
                            throw new \InvalidArgumentException("Field {$key} must be a valid number");
                        }
                        break;
                    case 'bool':
                        $sanitized[$key] = self::sanitizeBool($value);
                        break;
                    case 'url':
                        $sanitized[$key] = self::sanitizeUrl($value);
                        if ($sanitized[$key] === false && ($rule['required'] ?? false)) {
                            throw new \InvalidArgumentException("Field {$key} must be a valid URL");
                        }
                        break;
                    default:
                        $sanitized[$key] = $value;
                }
            }
        }
        
        return $sanitized;
    }
}