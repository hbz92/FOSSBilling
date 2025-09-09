<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\AIServices;

use Symfony\Component\HttpClient\HttpClient;

class DomainAide
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
        return $this->config['enabled'] ?? false;
    }

    public function getSuggestions(string $keyword, array $options = []): array
    {
        if (!$this->isEnabled()) {
            return [];
        }

        try {
            $response = $this->httpClient->request('POST', 'https://api.domainaide.com/v1/generate', [
                'headers' => [
                    'Authorization' => 'Bearer ' . ($this->config['api_key'] ?? ''),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'keyword' => $keyword,
                    'count' => $options['max_results'] ?? 10,
                    'categories' => $options['categories'] ?? ['seo', 'brand', 'creative'],
                    'tlds' => $options['tlds'] ?? ['.com', '.net', '.org'],
                ],
            ]);

            $data = $response->toArray();
            
            return [
                'suggestions' => $data['domains'] ?? [],
                'total' => $data['count'] ?? 0,
                'service' => 'DomainAide',
            ];
        } catch (\Exception $e) {
            return $this->generateLocalSuggestions($keyword, $options);
        }
    }

    private function generateLocalSuggestions(string $keyword, array $options): array
    {
        $suggestions = [];
        $tlds = $options['tlds'] ?? ['.com', '.net', '.org'];
        
        // SEO-focused suggestions
        $seoVariations = [
            $keyword . 'seo',
            $keyword . 'search',
            $keyword . 'online',
            $keyword . 'web',
            'best' . $keyword,
            'top' . $keyword,
        ];

        // Brand-focused suggestions
        $brandVariations = [
            $keyword . 'brand',
            $keyword . 'company',
            $keyword . 'corp',
            $keyword . 'inc',
            'the' . $keyword,
            $keyword . 'group',
        ];

        // Creative suggestions
        $creativeVariations = [
            $keyword . 'ly',
            $keyword . 'ify',
            $keyword . 'able',
            'un' . $keyword,
            $keyword . 'er',
            $keyword . 'ing',
        ];

        $allVariations = array_merge($seoVariations, $brandVariations, $creativeVariations);

        foreach ($allVariations as $variation) {
            foreach ($tlds as $tld) {
                $suggestions[] = [
                    'domain' => $variation . $tld,
                    'score' => rand(70, 98),
                    'category' => $this->getCategory($variation, $seoVariations, $brandVariations, $creativeVariations),
                ];
            }
        }

        return [
            'suggestions' => array_slice($suggestions, 0, $options['max_results'] ?? 10),
            'total' => count($suggestions),
            'service' => 'DomainAide (Local)',
        ];
    }

    private function getCategory(string $variation, array $seo, array $brand, array $creative): string
    {
        if (in_array($variation, $seo)) return 'seo';
        if (in_array($variation, $brand)) return 'brand';
        if (in_array($variation, $creative)) return 'creative';
        return 'general';
    }
}