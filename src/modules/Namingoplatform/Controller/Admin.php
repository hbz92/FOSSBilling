<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\Controller;

class Admin extends \Box_App
{
    public function register(\Box_App $app): void
    {
        $app->get('/namingoplatform', 'get_index', [], get_class($this));
        $app->get('/namingoplatform/domains', 'get_domains', [], get_class($this));
        $app->get('/namingoplatform/dns', 'get_dns', [], get_class($this));
        $app->get('/namingoplatform/analytics', 'get_analytics', [], get_class($this));
        $app->get('/namingoplatform/suggestions', 'get_suggestions', [], get_class($this));
        $app->post('/namingoplatform/suggestions', 'post_suggestions', [], get_class($this));
        $app->get('/namingoplatform/domain/:domain', 'get_domain_intelligence', ['domain'], get_class($this));
    }

    public function get_index(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        $service = $this->di['mod_service']('namingoplatform');
        $stats = $service->getDomainAnalytics('30d');
        
        return $app->render('mod_namingoplatform_index', [
            'stats' => $stats,
        ]);
    }

    public function get_domains(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        $service = $this->di['mod_service']('namingoplatform');
        $domains = $this->getDomainList();
        
        return $app->render('mod_namingoplatform_domains', [
            'domains' => $domains,
        ]);
    }

    public function get_dns(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        $service = $this->di['mod_service']('namingoplatform');
        $dnsZones = $this->getDnsZones();
        
        return $app->render('mod_namingoplatform_dns', [
            'dns_zones' => $dnsZones,
        ]);
    }

    public function get_analytics(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        $service = $this->di['mod_service']('namingoplatform');
        $analytics = $service->getDomainAnalytics('30d');
        
        return $app->render('mod_namingoplatform_analytics', [
            'analytics' => $analytics,
        ]);
    }

    public function get_suggestions(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        return $app->render('mod_namingoplatform_suggestions', []);
    }

    public function post_suggestions(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        $keyword = $app->request->get('keyword', '');
        $options = [
            'max_results' => (int) $app->request->get('max_results', 10),
            'tlds' => explode(',', $app->request->get('tlds', '.com,.net,.org')),
        ];
        
        $service = $this->di['mod_service']('namingoplatform');
        $suggestions = $service->getDomainSuggestions($keyword, $options);
        
        return $app->render('mod_namingoplatform_suggestions_results', [
            'suggestions' => $suggestions,
            'keyword' => $keyword,
        ]);
    }

    public function get_domain_intelligence(\Box_App $app): string
    {
        $this->di['is_admin_logged'];
        
        $domain = $app->request->get('domain', '');
        $service = $this->di['mod_service']('namingoplatform');
        $intelligence = $service->getDomainIntelligence($domain);
        
        return $app->render('mod_namingoplatform_domain_intelligence', [
            'domain' => $domain,
            'intelligence' => $intelligence,
        ]);
    }

    private function getDomainList(): array
    {
        // Get domains from database
        $query = "SELECT * FROM service_domain ORDER BY created_at DESC LIMIT 50";
        return $this->di['db']->getAll($query);
    }

    private function getDnsZones(): array
    {
        // Get DNS zones from database
        $query = "SELECT * FROM dns_zone ORDER BY created_at DESC LIMIT 50";
        return $this->di['db']->getAll($query);
    }
}