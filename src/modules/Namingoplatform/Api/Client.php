<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\Api;

class Client extends \Api_Abstract
{
    /**
     * Get domain suggestions using AI
     */
    public function get_suggestions($data)
    {
        $keyword = $data['keyword'] ?? '';
        $options = [
            'max_results' => (int) ($data['max_results'] ?? 20),
            'tlds' => explode(',', $data['tlds'] ?? '.com,.net,.org'),
        ];

        if (empty($keyword)) {
            throw new \FOSSBilling\Exception('Keyword is required');
        }

        $service = $this->di['mod_service']('namingoplatform');
        $suggestions = $service->getDomainSuggestions($keyword, $options);

        // Save search for analytics
        $this->saveSearchQuery($keyword, $suggestions);

        return $suggestions;
    }

    /**
     * Analyze domain value
     */
    public function analyze_domain($data)
    {
        $domain = $data['domain'] ?? '';
        if (empty($domain)) {
            throw new \FOSSBilling\Exception('Domain is required');
        }

        $service = $this->di['mod_service']('namingoplatform');
        return $service->analyzeDomainValue($domain);
    }

    /**
     * Get domain intelligence
     */
    public function get_domain_intelligence($data)
    {
        $domain = $data['domain'] ?? '';
        if (empty($domain)) {
            throw new \FOSSBilling\Exception('Domain is required');
        }

        $service = $this->di['mod_service']('namingoplatform');
        return $service->getDomainIntelligence($domain);
    }

    /**
     * Get client's domains
     */
    public function get_my_domains($data)
    {
        $client = $this->di['client'];
        $query = "SELECT * FROM service_domain WHERE client_id = :client_id ORDER BY created_at DESC";
        return $this->di['db']->getAll($query, [':client_id' => $client->id]);
    }

    /**
     * Get client's DNS zones
     */
    public function get_my_dns_zones($data)
    {
        $client = $this->di['client'];
        $query = "SELECT * FROM dns_zone WHERE client_id = :client_id ORDER BY created_at DESC";
        return $this->di['db']->getAll($query, [':client_id' => $client->id]);
    }

    /**
     * Get recent searches
     */
    public function get_recent_searches($data)
    {
        $client = $this->di['client'];
        $limit = (int) ($data['limit'] ?? 10);
        
        $query = "SELECT * FROM domain_search WHERE client_id = :client_id ORDER BY created_at DESC LIMIT :limit";
        return $this->di['db']->getAll($query, [':client_id' => $client->id, ':limit' => $limit]);
    }

    /**
     * Check domain availability
     */
    public function check_availability($data)
    {
        $domain = $data['domain'] ?? '';
        if (empty($domain)) {
            throw new \FOSSBilling\Exception('Domain is required');
        }

        // This would integrate with actual domain availability checking
        return [
            'domain' => $domain,
            'available' => $this->checkDomainAvailability($domain),
            'price' => $this->getDomainPrice($domain),
            'registrar' => $this->getRecommendedRegistrar($domain),
        ];
    }

    /**
     * Get domain suggestions for multiple keywords
     */
    public function get_bulk_suggestions($data)
    {
        $keywords = $data['keywords'] ?? [];
        if (empty($keywords) || !is_array($keywords)) {
            throw new \FOSSBilling\Exception('Keywords array is required');
        }

        $options = [
            'max_results' => (int) ($data['max_results'] ?? 10),
            'tlds' => explode(',', $data['tlds'] ?? '.com,.net,.org'),
        ];

        $service = $this->di['mod_service']('namingoplatform');
        $results = [];

        foreach ($keywords as $keyword) {
            $results[$keyword] = $service->getDomainSuggestions($keyword, $options);
        }

        return $results;
    }

    /**
     * Get trending domains
     */
    public function get_trending_domains($data)
    {
        $category = $data['category'] ?? 'all';
        $limit = (int) ($data['limit'] ?? 20);

        // This would integrate with trending domain APIs
        return [
            'trending' => [
                'tech' => ['ai.com', 'blockchain.io', 'crypto.net'],
                'business' => ['startup.com', 'venture.io', 'growth.net'],
                'creative' => ['design.ly', 'art.io', 'studio.com'],
            ],
            'category' => $category,
            'limit' => $limit,
        ];
    }

    private function saveSearchQuery(string $keyword, array $suggestions): void
    {
        try {
            $client = $this->di['client'];
            $model = $this->di['db']->dispense('DomainSearch');
            $model->client_id = $client->id;
            $model->keyword = $keyword;
            $model->suggestions_count = count($suggestions['ai_suggestions'] ?? []);
            $model->created_at = date('Y-m-d H:i:s');
            $this->di['db']->store($model);
        } catch (\Exception $e) {
            // Log error but don't fail the request
            error_log('Failed to save search query: ' . $e->getMessage());
        }
    }

    private function checkDomainAvailability(string $domain): bool
    {
        // This would integrate with actual domain availability checking
        return rand(0, 1) === 1;
    }

    private function getDomainPrice(string $domain): float
    {
        // This would integrate with actual pricing APIs
        $tld = substr($domain, strrpos($domain, '.'));
        $prices = [
            '.com' => 12.99,
            '.net' => 14.99,
            '.org' => 15.99,
            '.io' => 49.99,
            '.ai' => 99.99,
        ];
        
        return $prices[$tld] ?? 12.99;
    }

    private function getRecommendedRegistrar(string $domain): string
    {
        $tld = substr($domain, strrpos($domain, '.'));
        $centralNicTlds = ['.uk', '.co.uk', '.org.uk', '.me.uk'];
        
        return in_array($tld, $centralNicTlds) ? 'CentralNic' : 'ICANN_Reseller';
    }
}