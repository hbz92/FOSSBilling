<?php
/**
 * Client API HestiaCP pour l'automatisation
 */

class HestiaCPAPIClient
{
    private $host;
    private $port;
    private $apiKey;
    private $httpClient;

    public function __construct($host, $port = 8083, $apiKey = null)
    {
        $this->host = $host;
        $this->port = $port;
        $this->apiKey = $apiKey;
        $this->httpClient = new GuzzleHttp\Client([
            'timeout' => 30,
            'verify' => false
        ]);
    }

    /**
     * Crée une clé API pour FOSSBilling
     */
    public function createAPIKey($username = 'admin', $description = 'FOSSBilling Integration')
    {
        $endpoint = "http://{$this->host}:{$this->port}/api/";
        
        $data = [
            'user' => $username,
            'description' => $description
        ];

        try {
            $response = $this->httpClient->post($endpoint . 'v-add-user-api-key', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ],
                'form_params' => $data
            ]);

            $result = json_decode($response->getBody(), true);
            return $result['data'] ?? null;
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la création de la clé API: " . $e->getMessage());
        }
    }

    /**
     * Récupère les informations système
     */
    public function getSystemInfo()
    {
        $endpoint = "http://{$this->host}:{$this->port}/api/";
        
        try {
            $response = $this->httpClient->get($endpoint . 'v-list-sys-info', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des infos système: " . $e->getMessage());
        }
    }

    /**
     * Récupère la liste des utilisateurs
     */
    public function getUsers()
    {
        $endpoint = "http://{$this->host}:{$this->port}/api/";
        
        try {
            $response = $this->httpClient->get($endpoint . 'v-list-users', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des utilisateurs: " . $e->getMessage());
        }
    }

    /**
     * Récupère les statistiques d'utilisation
     */
    public function getUsageStats()
    {
        $endpoint = "http://{$this->host}:{$this->port}/api/";
        
        try {
            $response = $this->httpClient->get($endpoint . 'v-list-sys-stats', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des stats: " . $e->getMessage());
        }
    }

    /**
     * Teste la connectivité
     */
    public function testConnection()
    {
        try {
            $info = $this->getSystemInfo();
            return isset($info['data']);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Configure le serveur pour FOSSBilling
     */
    public function configureForFOSSBilling($fossbillingIp)
    {
        // Ajouter l'IP de FOSSBilling à la whitelist
        $this->addToWhitelist($fossbillingIp);
        
        // Créer la clé API
        $apiKey = $this->createAPIKey();
        
        return $apiKey;
    }

    /**
     * Ajoute une IP à la whitelist
     */
    private function addToWhitelist($ip)
    {
        $endpoint = "http://{$this->host}:{$this->port}/api/";
        
        $data = [
            'ip' => $ip
        ];

        try {
            $response = $this->httpClient->post($endpoint . 'v-add-firewall-ip', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey
                ],
                'form_params' => $data
            ]);

            return true;
        } catch (Exception $e) {
            // L'IP pourrait déjà être dans la whitelist
            return true;
        }
    }
}