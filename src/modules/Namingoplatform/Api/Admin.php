<?php

declare(strict_types=1);

namespace Box\Mod\Namingoplatform\Api;

class Admin extends \Api_Abstract
{
    /**
     * Get domain suggestions using AI
     */
    public function get_suggestions($data)
    {
        $keyword = $data['keyword'] ?? '';
        $options = [
            'max_results' => (int) ($data['max_results'] ?? 10),
            'tlds' => explode(',', $data['tlds'] ?? '.com,.net,.org'),
        ];

        $service = $this->di['mod_service']('namingoplatform');
        return $service->getDomainSuggestions($keyword, $options);
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
     * Get analytics
     */
    public function get_analytics($data)
    {
        $period = $data['period'] ?? '30d';
        $service = $this->di['mod_service']('namingoplatform');
        return $service->getDomainAnalytics($period);
    }

    /**
     * Create DNS zone
     */
    public function create_dns_zone($data)
    {
        $domain = $data['domain'] ?? '';
        if (empty($domain)) {
            throw new \FOSSBilling\Exception('Domain is required');
        }

        $options = $data['options'] ?? [];
        $service = $this->di['mod_service']('namingoplatform');
        return $service->createDnsZone($domain, $options);
    }

    /**
     * Send notification
     */
    public function send_notification($data)
    {
        $clientId = (int) ($data['client_id'] ?? 0);
        $type = $data['type'] ?? '';
        $notificationData = $data['data'] ?? [];

        if (empty($clientId) || empty($type)) {
            throw new \FOSSBilling\Exception('Client ID and type are required');
        }

        $service = $this->di['mod_service']('namingoplatform');
        return $service->sendDomainNotification($clientId, $type, $notificationData);
    }

    /**
     * Get registrar for TLD
     */
    public function get_registrar_for_tld($data)
    {
        $tld = $data['tld'] ?? '';
        if (empty($tld)) {
            throw new \FOSSBilling\Exception('TLD is required');
        }

        $service = $this->di['mod_service']('namingoplatform');
        return $service->getRegistrarForTld($tld);
    }

    /**
     * Get AI service status
     */
    public function get_ai_status($data)
    {
        $service = $this->di['mod_service']('namingoplatform');
        $config = $service->getConfig();
        
        return [
            'namestudio' => [
                'enabled' => $config['ai_services']['namestudio']['enabled'] ?? false,
                'status' => 'active'
            ],
            'domainaide' => [
                'enabled' => $config['ai_services']['domainaide']['enabled'] ?? false,
                'status' => 'active'
            ],
            'namelix' => [
                'enabled' => $config['ai_services']['namelix']['enabled'] ?? true,
                'status' => 'active'
            ],
        ];
    }
}