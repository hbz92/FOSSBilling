<?php
/**
 * Script d'orchestration pour le déploiement automatique d'un nouveau serveur HestiaCP
 * Déclenché par les alertes Prometheus
 */

require_once __DIR__ . '/../fossbilling-integration/fossbilling-api-client.php';
require_once __DIR__ . '/../fossbilling-integration/hestiacp-api-client.php';

class HestiaCPAutoDeployer
{
    private $config;
    private $fossbillingClient;
    private $terraformPath;
    private $logFile;

    public function __construct($configFile)
    {
        $this->config = json_decode(file_get_contents($configFile), true);
        $this->fossbillingClient = new FOSSBillingAPIClient(
            $this->config['fossbilling']['api_url'],
            $this->config['fossbilling']['api_key']
        );
        $this->terraformPath = $this->config['terraform']['path'];
        $this->logFile = $this->config['logging']['file'];
    }

    /**
     * Déploie un nouveau serveur HestiaCP
     */
    public function deployNewServer()
    {
        $this->log("=== Début du déploiement d'un nouveau serveur HestiaCP ===");
        
        try {
            // 1. Générer un nom unique pour le serveur
            $serverName = $this->generateServerName();
            $this->log("Nom du serveur généré: $serverName");
            
            // 2. Déployer avec Terraform
            $serverInfo = $this->deployWithTerraform($serverName);
            $this->log("Serveur déployé avec succès: " . $serverInfo['ip']);
            
            // 3. Attendre que le serveur soit prêt
            $this->waitForServerReady($serverInfo['ip']);
            
            // 4. Configurer HestiaCP
            $apiKey = $this->configureHestiaCP($serverInfo['ip']);
            $this->log("HestiaCP configuré avec la clé API: " . $apiKey['id']);
            
            // 5. Ajouter à FOSSBilling
            $this->addToFOSSBilling($serverInfo, $apiKey);
            $this->log("Serveur ajouté à FOSSBilling avec succès");
            
            // 6. Tester la connectivité
            $this->testIntegration($serverInfo['ip'], $apiKey['key']);
            
            $this->log("=== Déploiement terminé avec succès ===");
            
            return [
                'success' => true,
                'server_ip' => $serverInfo['ip'],
                'server_name' => $serverInfo['name'],
                'api_key_id' => $apiKey['id']
            ];
            
        } catch (Exception $e) {
            $this->log("ERREUR: " . $e->getMessage());
            $this->cleanupOnError($serverName ?? null);
            throw $e;
        }
    }

    /**
     * Génère un nom unique pour le serveur
     */
    private function generateServerName()
    {
        $timestamp = date('Ymd-His');
        return "hestiacp-auto-{$timestamp}";
    }

    /**
     * Déploie le serveur avec Terraform
     */
    private function deployWithTerraform($serverName)
    {
        $this->log("Déploiement Terraform en cours...");
        
        // Créer le fichier de variables temporaire
        $tfvarsFile = $this->terraformPath . '/terraform.tfvars';
        $this->createTerraformVars($serverName);
        
        // Exécuter Terraform
        $commands = [
            "cd {$this->terraformPath}",
            "terraform init",
            "terraform plan -var='hestiacp_server_name={$serverName}'",
            "terraform apply -auto-approve -var='hestiacp_server_name={$serverName}'"
        ];
        
        foreach ($commands as $command) {
            $this->log("Exécution: $command");
            $output = shell_exec("$command 2>&1");
            $this->log("Sortie: $output");
            
            if (strpos($output, 'Error') !== false) {
                throw new Exception("Erreur Terraform: $output");
            }
        }
        
        // Récupérer les outputs
        $output = shell_exec("cd {$this->terraformPath} && terraform output -json");
        $terraformOutputs = json_decode($output, true);
        
        return [
            'ip' => $terraformOutputs['hestiacp_server_ip']['value'],
            'name' => $terraformOutputs['hestiacp_server_name']['value'],
            'id' => $terraformOutputs['hestiacp_server_id']['value']
        ];
    }

    /**
     * Crée le fichier de variables Terraform
     */
    private function createTerraformVars($serverName)
    {
        $tfvars = [
            'hestiacp_server_name' => $serverName,
            'hestiacp_domain' => $this->config['hestiacp']['domain'],
            'fossbilling_ip' => $this->config['fossbilling']['ip']
        ];
        
        $content = "";
        foreach ($tfvars as $key => $value) {
            $content .= "$key = \"$value\"\n";
        }
        
        file_put_contents($this->terraformPath . '/terraform.tfvars', $content);
    }

    /**
     * Attend que le serveur soit prêt
     */
    private function waitForServerReady($ip, $maxAttempts = 30)
    {
        $this->log("Attente que le serveur soit prêt...");
        
        for ($i = 0; $i < $maxAttempts; $i++) {
            if ($this->isServerReady($ip)) {
                $this->log("Serveur prêt après " . ($i + 1) . " tentatives");
                return;
            }
            
            sleep(30);
            $this->log("Tentative " . ($i + 1) . "/$maxAttempts - Serveur pas encore prêt");
        }
        
        throw new Exception("Le serveur n'est pas prêt après $maxAttempts tentatives");
    }

    /**
     * Vérifie si le serveur est prêt
     */
    private function isServerReady($ip)
    {
        // Test de connectivité SSH
        $connection = @ssh2_connect($ip, 22);
        if (!$connection) {
            return false;
        }
        
        // Test de l'API HestiaCP
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://$ip:8083/api/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return $httpCode === 200;
    }

    /**
     * Configure HestiaCP
     */
    private function configureHestiaCP($ip)
    {
        $this->log("Configuration de HestiaCP sur $ip...");
        
        // Attendre un peu plus pour que l'installation soit terminée
        sleep(60);
        
        $hestiacpClient = new HestiaCPAPIClient($ip);
        
        // Tester la connectivité
        if (!$hestiacpClient->testConnection()) {
            throw new Exception("Impossible de se connecter à HestiaCP sur $ip");
        }
        
        // Configurer pour FOSSBilling
        $apiKey = $hestiacpClient->configureForFOSSBilling($this->config['fossbilling']['ip']);
        
        if (!$apiKey) {
            throw new Exception("Impossible de créer la clé API HestiaCP");
        }
        
        return $apiKey;
    }

    /**
     * Ajoute le serveur à FOSSBilling
     */
    private function addToFOSSBilling($serverInfo, $apiKey)
    {
        $this->log("Ajout du serveur à FOSSBilling...");
        
        $serverData = [
            'name' => $serverInfo['name'],
            'hostname' => $serverInfo['name'] . '.' . $this->config['hestiacp']['domain'],
            'ip' => $serverInfo['ip'],
            'api_key_id' => $apiKey['id'],
            'api_key' => $apiKey['key']
        ];
        
        $result = $this->fossbillingClient->addHestiaCPServer($serverData);
        
        if (!$result || !isset($result['id'])) {
            throw new Exception("Erreur lors de l'ajout du serveur à FOSSBilling");
        }
        
        return $result;
    }

    /**
     * Teste l'intégration complète
     */
    private function testIntegration($ip, $apiKey)
    {
        $this->log("Test de l'intégration...");
        
        // Test de connectivité FOSSBilling -> HestiaCP
        $isConnected = $this->fossbillingClient->testHestiaCPConnection($ip, $apiKey);
        
        if (!$isConnected) {
            throw new Exception("Test d'intégration échoué");
        }
        
        $this->log("Test d'intégration réussi");
    }

    /**
     * Nettoie en cas d'erreur
     */
    private function cleanupOnError($serverName)
    {
        if (!$serverName) {
            return;
        }
        
        $this->log("Nettoyage en cas d'erreur...");
        
        // Détruire les ressources Terraform
        $command = "cd {$this->terraformPath} && terraform destroy -auto-approve -var='hestiacp_server_name={$serverName}'";
        shell_exec($command);
    }

    /**
     * Logging
     */
    private function log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message" . PHP_EOL;
        
        file_put_contents($this->logFile, $logMessage, FILE_APPEND | LOCK_EX);
        echo $logMessage;
    }
}

// Script principal
if (php_sapi_name() === 'cli') {
    $configFile = $argv[1] ?? __DIR__ . '/config.json';
    
    try {
        $deployer = new HestiaCPAutoDeployer($configFile);
        $result = $deployer->deployNewServer();
        
        echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;
        exit(0);
        
    } catch (Exception $e) {
        echo "ERREUR: " . $e->getMessage() . PHP_EOL;
        exit(1);
    }
}