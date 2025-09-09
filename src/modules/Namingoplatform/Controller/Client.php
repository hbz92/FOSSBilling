<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\Controller;

class Client extends \Box_App
{
    public function register(\Box_App $app): void
    {
        $app->get('/namingoplatform', 'get_index', [], get_class($this));
        $app->get('/namingoplatform/search', 'get_search', [], get_class($this));
        $app->post('/namingoplatform/search', 'post_search', [], get_class($this));
        $app->get('/namingoplatform/domains', 'get_domains', [], get_class($this));
        $app->get('/namingoplatform/dns', 'get_dns', [], get_class($this));
        $app->get('/namingoplatform/domain/:domain', 'get_domain', ['domain'], get_class($this));
    }

    public function get_index(\Box_App $app): string
    {
        $this->di['is_client_logged'];
        
        $service = $this->di['mod_service']('namingoplatform');
        $client = $this->di['client'];
        
        // Get client's domains
        $domains = $this->getClientDomains($client->id);
        
        // Get recent suggestions
        $recentSuggestions = $this->getRecentSuggestions($client->id);
        
        return $app->render('mod_namingoplatform_client_index', [
            'domains' => $domains,
            'recent_suggestions' => $recentSuggestions,
        ]);
    }

    public function get_search(\Box_App $app): string
    {
        $this->di['is_client_logged'];
        
        return $app->render('mod_namingoplatform_client_search', []);
    }

    public function post_search(\Box_App $app): string
    {
        $this->di['is_client_logged'];
        
        $keyword = $app->request->get('keyword', '');
        $options = [
            'max_results' => (int) $app->request->get('max_results', 20),
            'tlds' => explode(',', $app->request->get('tlds', '.com,.net,.org')),
        ];
        
        $service = $this->di['mod_service']('namingoplatform');
        $suggestions = $service->getDomainSuggestions($keyword, $options);
        
        // Save search for analytics
        $this->saveSearchQuery($this->di['client']->id, $keyword, $suggestions);
        
        return $app->render('mod_namingoplatform_client_search_results', [
            'suggestions' => $suggestions,
            'keyword' => $keyword,
        ]);
    }

    public function get_domains(\Box_App $app): string
    {
        $this->di['is_client_logged'];
        
        $client = $this->di['client'];
        $domains = $this->getClientDomains($client->id);
        
        return $app->render('mod_namingoplatform_client_domains', [
            'domains' => $domains,
        ]);
    }

    public function get_dns(\Box_App $app): string
    {
        $this->di['is_client_logged'];
        
        $client = $this->di['client'];
        $dnsZones = $this->getClientDnsZones($client->id);
        
        return $app->render('mod_namingoplatform_client_dns', [
            'dns_zones' => $dnsZones,
        ]);
    }

    public function get_domain(\Box_App $app): string
    {
        $this->di['is_client_logged'];
        
        $domain = $app->request->get('domain', '');
        $service = $this->di['mod_service']('namingoplatform');
        $intelligence = $service->getDomainIntelligence($domain);
        
        return $app->render('mod_namingoplatform_client_domain', [
            'domain' => $domain,
            'intelligence' => $intelligence,
        ]);
    }

    private function getClientDomains(int $clientId): array
    {
        $query = "SELECT * FROM service_domain WHERE client_id = :client_id ORDER BY created_at DESC";
        return $this->di['db']->getAll($query, [':client_id' => $clientId]);
    }

    private function getClientDnsZones(int $clientId): array
    {
        $query = "SELECT * FROM dns_zone WHERE client_id = :client_id ORDER BY created_at DESC";
        return $this->di['db']->getAll($query, [':client_id' => $clientId]);
    }

    private function getRecentSuggestions(int $clientId): array
    {
        $query = "SELECT * FROM domain_search WHERE client_id = :client_id ORDER BY created_at DESC LIMIT 5";
        return $this->di['db']->getAll($query, [':client_id' => $clientId]);
    }

    private function saveSearchQuery(int $clientId, string $keyword, array $suggestions): void
    {
        $model = $this->di['db']->dispense('DomainSearch');
        $model->client_id = $clientId;
        $model->keyword = $keyword;
        $model->suggestions_count = count($suggestions['ai_suggestions'] ?? []);
        $model->created_at = date('Y-m-d H:i:s');
        $this->di['db']->store($model);
    }
}