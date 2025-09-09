<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\AIServices;

use Symfony\Component\HttpClient\HttpClient;

class Namelix
{
    private array $config;
    private $httpClient;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->httpClient = HttpClient::create();
    }

    public function isEnabled(): bool
    {
        return $this->config['enabled'] ?? true; // Namelix is free, so enabled by default
    }

    public function getSuggestions(string $keyword, array $options = []): array
    {
        if (!$this->isEnabled()) {
            return [];
        }

        try {
            // Namelix doesn't have a public API, so we'll simulate it
            return $this->generateNamelixStyleSuggestions($keyword, $options);
        } catch (\Exception $e) {
            return $this->generateLocalSuggestions($keyword, $options);
        }
    }

    private function generateNamelixStyleSuggestions(string $keyword, array $options): array
    {
        $suggestions = [];
        $tlds = $options['tlds'] ?? ['.com', '.net', '.org'];
        
        // Namelix-style creative suggestions
        $creativePatterns = [
            // Shortened versions
            substr($keyword, 0, 3) . 'ly',
            substr($keyword, 0, 4) . 'fy',
            substr($keyword, 0, 3) . 'io',
            substr($keyword, 0, 4) . 'ai',
            
            // Compound words
            $keyword . 'ly',
            $keyword . 'fy',
            $keyword . 'io',
            $keyword . 'ai',
            $keyword . 'co',
            $keyword . 'go',
            
            // Prefixes
            'get' . $keyword,
            'try' . $keyword,
            'use' . $keyword,
            'go' . $keyword,
            'my' . $keyword,
            'the' . $keyword,
            
            // Suffixes
            $keyword . 'app',
            $keyword . 'pro',
            $keyword . 'hub',
            $keyword . 'lab',
            $keyword . 'tech',
            $keyword . 'dev',
            
            // Creative combinations
            $keyword . 'ify',
            $keyword . 'able',
            $keyword . 'wise',
            $keyword . 'wise',
            'un' . $keyword,
            're' . $keyword,
        ];

        foreach ($creativePatterns as $pattern) {
            foreach ($tlds as $tld) {
                $suggestions[] = [
                    'domain' => $pattern . $tld,
                    'score' => $this->calculateNamelixScore($pattern),
                    'category' => 'creative',
                    'style' => $this->getStyle($pattern),
                ];
            }
        }

        // Sort by score and limit results
        usort($suggestions, fn($a, $b) => $b['score'] <=> $a['score']);

        return [
            'suggestions' => array_slice($suggestions, 0, $options['max_results'] ?? 10),
            'total' => count($suggestions),
            'service' => 'Namelix',
        ];
    }

    private function calculateNamelixScore(string $pattern): int
    {
        $score = 50; // Base score
        
        // Length bonus (shorter is better)
        $length = strlen($pattern);
        if ($length <= 6) $score += 20;
        elseif ($length <= 8) $score += 15;
        elseif ($length <= 10) $score += 10;
        
        // Pattern bonuses
        if (preg_match('/^[a-z]+$/', $pattern)) $score += 10; // All lowercase
        if (preg_match('/[aeiou]/', $pattern)) $score += 5; // Has vowels
        if (!preg_match('/[0-9]/', $pattern)) $score += 5; // No numbers
        if (!preg_match('/[-_]/', $pattern)) $score += 5; // No hyphens/underscores
        
        // Creative pattern bonuses
        if (str_ends_with($pattern, 'ly')) $score += 10;
        if (str_ends_with($pattern, 'fy')) $score += 10;
        if (str_ends_with($pattern, 'io')) $score += 15;
        if (str_ends_with($pattern, 'ai')) $score += 15;
        
        return min($score, 100);
    }

    private function getStyle(string $pattern): string
    {
        if (str_ends_with($pattern, 'ly')) return 'adverb';
        if (str_ends_with($pattern, 'fy')) return 'verb';
        if (str_ends_with($pattern, 'io')) return 'tech';
        if (str_ends_with($pattern, 'ai')) return 'ai';
        if (str_starts_with($pattern, 'get') || str_starts_with($pattern, 'try')) return 'action';
        if (str_starts_with($pattern, 'my') || str_starts_with($pattern, 'the')) return 'possessive';
        return 'compound';
    }

    private function generateLocalSuggestions(string $keyword, array $options): array
    {
        // Fallback local generation
        $suggestions = [];
        $tlds = $options['tlds'] ?? ['.com', '.net', '.org'];
        
        $variations = [
            $keyword . 'app',
            $keyword . 'pro',
            'get' . $keyword,
            'my' . $keyword,
        ];

        foreach ($variations as $variation) {
            foreach ($tlds as $tld) {
                $suggestions[] = [
                    'domain' => $variation . $tld,
                    'score' => rand(60, 90),
                    'category' => 'generated',
                    'style' => 'basic',
                ];
            }
        }

        return [
            'suggestions' => array_slice($suggestions, 0, $options['max_results'] ?? 10),
            'total' => count($suggestions),
            'service' => 'Namelix (Local)',
        ];
    }
}