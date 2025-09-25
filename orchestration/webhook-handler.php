<?php
/**
 * Webhook handler pour les alertes Prometheus
 * Déclenche le déploiement automatique d'un nouveau serveur HestiaCP
 */

require_once __DIR__ . '/deploy-new-hestiacp.php';

class WebhookHandler
{
    private $config;
    private $logFile;

    public function __construct($configFile)
    {
        $this->config = json_decode(file_get_contents($configFile), true);
        $this->logFile = $this->config['logging']['file'];
    }

    /**
     * Traite les webhooks d'alerte Prometheus
     */
    public function handleWebhook()
    {
        $input = file_get_contents('php://input');
        $alert = json_decode($input, true);
        
        $this->log("Webhook reçu: " . $input);
        
        // Vérifier si c'est une alerte critique HestiaCP
        if ($this->isHestiaCPCriticalAlert($alert)) {
            $this->log("Alerte critique HestiaCP détectée - Déclenchement du déploiement");
            
            try {
                $deployer = new HestiaCPAutoDeployer($this->config);
                $result = $deployer->deployNewServer();
                
                $this->log("Déploiement réussi: " . json_encode($result));
                
                // Envoyer une notification de succès
                $this->sendNotification("Nouveau serveur HestiaCP déployé", $result);
                
            } catch (Exception $e) {
                $this->log("Erreur lors du déploiement: " . $e->getMessage());
                
                // Envoyer une notification d'erreur
                $this->sendNotification("Erreur déploiement HestiaCP", [
                    'error' => $e->getMessage()
                ]);
            }
        } else {
            $this->log("Alerte non critique - Ignorée");
        }
        
        http_response_code(200);
        echo json_encode(['status' => 'processed']);
    }

    /**
     * Vérifie si c'est une alerte critique HestiaCP
     */
    private function isHestiaCPCriticalAlert($alert)
    {
        if (!isset($alert['alerts'])) {
            return false;
        }
        
        foreach ($alert['alerts'] as $alertItem) {
            if (isset($alertItem['labels']['alertname']) && 
                $alertItem['labels']['alertname'] === 'HestiaCPCriticalLoad' &&
                $alertItem['status'] === 'firing') {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Envoie une notification
     */
    private function sendNotification($title, $data)
    {
        // Configuration pour les notifications (email, Slack, etc.)
        $notificationConfig = $this->config['notifications'] ?? [];
        
        if (isset($notificationConfig['webhook_url'])) {
            $this->sendSlackNotification($title, $data, $notificationConfig['webhook_url']);
        }
        
        if (isset($notificationConfig['email'])) {
            $this->sendEmailNotification($title, $data, $notificationConfig['email']);
        }
    }

    /**
     * Envoie une notification Slack
     */
    private function sendSlackNotification($title, $data, $webhookUrl)
    {
        $message = [
            'text' => $title,
            'attachments' => [
                [
                    'color' => isset($data['error']) ? 'danger' : 'good',
                    'fields' => [
                        [
                            'title' => 'Détails',
                            'value' => json_encode($data, JSON_PRETTY_PRINT),
                            'short' => false
                        ]
                    ]
                ]
            ]
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Envoie une notification email
     */
    private function sendEmailNotification($title, $data, $emailConfig)
    {
        $to = $emailConfig['to'];
        $subject = "[HestiaCP Auto-Deploy] $title";
        $body = "Détails:\n" . json_encode($data, JSON_PRETTY_PRINT);
        
        $headers = [
            'From: ' . $emailConfig['from'],
            'Content-Type: text/plain; charset=UTF-8'
        ];
        
        mail($to, $subject, $body, implode("\r\n", $headers));
    }

    /**
     * Logging
     */
    private function log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] WEBHOOK: $message" . PHP_EOL;
        
        file_put_contents($this->logFile, $logMessage, FILE_APPEND | LOCK_EX);
    }
}

// Script principal
$configFile = $argv[1] ?? __DIR__ . '/config.json';
$handler = new WebhookHandler($configFile);
$handler->handleWebhook();