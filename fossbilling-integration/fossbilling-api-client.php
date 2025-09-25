<?php
/**
 * Client API FOSSBilling pour l'intégration automatique des serveurs HestiaCP
 */

class FOSSBillingAPIClient
{
    private $apiUrl;
    private $apiKey;
    private $httpClient;

    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = rtrim($apiUrl, '/');
        $this->apiKey = $apiKey;
        $this->httpClient = new GuzzleHttp\Client([
            'timeout' => 30,
            'verify' => false
        ]);
    }

    /**
     * Ajoute un nouveau serveur HestiaCP à FOSSBilling
     */
    public function addHestiaCPServer($serverData)
    {
        $endpoint = $this->apiUrl . '/admin/servers';
        
        $data = [
            'name' => $serverData['name'],
            'hostname' => $serverData['hostname'],
            'ip' => $serverData['ip'],
            'manager' => 'hestiacp',
            'manager_config' => [
                'api_key_id' => $serverData['api_key_id'],
                'api_key' => $serverData['api_key'],
                'port' => 8083,
                'secure' => false
            ],
            'active' => true,
            'enabled' => true
        ];

        try {
            $response = $this->httpClient->post($endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de l'ajout du serveur: " . $e->getMessage());
        }
    }

    /**
     * Récupère la liste des serveurs existants
     */
    public function getServers()
    {
        $endpoint = $this->apiUrl . '/admin/servers';
        
        try {
            $response = $this->httpClient->get($endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des serveurs: " . $e->getMessage());
        }
    }

    /**
     * Met à jour un serveur existant
     */
    public function updateServer($serverId, $serverData)
    {
        $endpoint = $this->apiUrl . '/admin/servers/' . $serverId;
        
        try {
            $response = $this->httpClient->put($endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json'
                ],
                'json' => $serverData
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la mise à jour du serveur: " . $e->getMessage());
        }
    }

    /**
     * Teste la connectivité avec un serveur HestiaCP
     */
    public function testHestiaCPConnection($ip, $apiKey)
    {
        $endpoint = "http://{$ip}:8083/api/";
        
        try {
            $response = $this->httpClient->get($endpoint . 'list/user', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey
                ],
                'timeout' => 10
            ]);

            return $response->getStatusCode() === 200;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Synchronise les plans d'hébergement avec HestiaCP
     */
    public function syncHostingPlans($serverId, $plans)
    {
        $endpoint = $this->apiUrl . '/admin/servers/' . $serverId . '/plans';
        
        try {
            $response = $this->httpClient->post($endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json'
                ],
                'json' => ['plans' => $plans]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la synchronisation des plans: " . $e->getMessage());
        }
    }
}