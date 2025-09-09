<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\AIServices;

use Symfony\Component\HttpClient\HttpClient;

class NameStudio
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
            $response = $this->httpClient->request('POST', 'https://api.namestudio.com/v1/suggestions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . ($this->config['api_key'] ?? ''),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'keyword' => $keyword,
                    'max_results' => $options['max_results'] ?? 10,
                    'tlds' => $options['tlds'] ?? ['.com', '.net', '.org'],
                    'style' => $options['style'] ?? 'all',
                ],
            ]);

            $data = $response->toArray();
            
            return [
                'suggestions' => $data['suggestions'] ?? [],
                'total' => $data['total'] ?? 0,
                'service' => 'NameStudio',
            ];
        } catch (\Exception $e) {
            // Fallback to local generation
            return $this->generateLocalSuggestions($keyword, $options);
        }
    }

    private function generateLocalSuggestions(string $keyword, array $options): array
    {
        $suggestions = [];
        $tlds = $options['tlds'] ?? ['.com', '.net', '.org'];
        
        // Generate variations
        $variations = [
            $keyword . 'app',
            $keyword . 'pro',
            $keyword . 'tech',
            $keyword . 'hub',
            'get' . $keyword,
            'my' . $keyword,
            $keyword . 'io',
            $keyword . 'ai',
        ];

        foreach ($variations as $variation) {
            foreach ($tlds as $tld) {
                $suggestions[] = [
                    'domain' => $variation . $tld,
                    'score' => rand(60, 95),
                    'category' => 'generated',
                ];
            }
        }

        return [
            'suggestions' => array_slice($suggestions, 0, $options['max_results'] ?? 10),
            'total' => count($suggestions),
            'service' => 'NameStudio (Local)',
        ];
    }
}