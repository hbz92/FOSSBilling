<?php

declare(strict_types=1);

class Registrar_Adapter_CentralNic extends Registrar_AdapterAbstract
{
    private array $config;
    private $httpClient;

    public function __construct($options)
    {
        $this->config = $options;
        $this->httpClient = \Symfony\Component\HttpClient\HttpClient::create();
        
        $this->validateConfig();
    }

    public static function getConfig()
    {
        return [
            'label' => 'CentralNic Registrar (Direct Accreditation)',
            'form' => [
                'api_key' => [
                    'password', [
                        'label' => 'API Key',
                        'description' => 'Your CentralNic API key for direct registrar access',
                        'required' => true,
                    ],
                ],
                'test_mode' => [
                    'checkbox', [
                        'label' => 'Test Mode',
                        'description' => 'Enable test mode for development',
                        'required' => false,
                    ],
                ],
                'sandbox_url' => [
                    'text', [
                        'label' => 'Sandbox URL',
                        'description' => 'CentralNic sandbox URL for testing',
                        'required' => false,
                    ],
                ],
            ],
        ];
    }

    public function isDomainAvailable(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/check', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['available'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to check domain availability: ' . $e->getMessage());
        }
    }

    public function isDomaincanBeTransferred(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/transfer/check', [
                'domain' => $domain->getSld() . $domain->getTld(),
                'auth_code' => $domain->getEpp(),
            ]);

            return $response['transferable'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to check domain transferability: ' . $e->getMessage());
        }
    }

    public function modifyNs(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/nameservers/update', [
                'domain' => $domain->getSld() . $domain->getTld(),
                'nameservers' => [
                    $domain->getNs1(),
                    $domain->getNs2(),
                    $domain->getNs3(),
                    $domain->getNs4(),
                ],
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to update nameservers: ' . $e->getMessage());
        }
    }

    public function modifyContact(Registrar_Domain $domain)
    {
        try {
            $contact = $domain->getContactRegistrar();
            
            $response = $this->makeApiRequest('domain/contact/update', [
                'domain' => $domain->getSld() . $domain->getTld(),
                'contact' => [
                    'first_name' => $contact->getFirstname(),
                    'last_name' => $contact->getLastname(),
                    'email' => $contact->getEmail(),
                    'phone' => $contact->getTel(),
                    'phone_cc' => $contact->getTelCC(),
                    'company' => $contact->getCompany(),
                    'address1' => $contact->getAddress1(),
                    'address2' => $contact->getAddress2(),
                    'city' => $contact->getCity(),
                    'state' => $contact->getState(),
                    'zip' => $contact->getZip(),
                    'country' => $contact->getCountry(),
                ],
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to update contact information: ' . $e->getMessage());
        }
    }

    public function transferDomain(Registrar_Domain $domain)
    {
        try {
            $contact = $domain->getContactRegistrar();
            
            $response = $this->makeApiRequest('domain/transfer', [
                'domain' => $domain->getSld() . $domain->getTld(),
                'auth_code' => $domain->getEpp(),
                'period' => $domain->getRegistrationPeriod(),
                'contact' => [
                    'first_name' => $contact->getFirstname(),
                    'last_name' => $contact->getLastname(),
                    'email' => $contact->getEmail(),
                    'phone' => $contact->getTel(),
                    'phone_cc' => $contact->getTelCC(),
                    'company' => $contact->getCompany(),
                    'address1' => $contact->getAddress1(),
                    'address2' => $contact->getAddress2(),
                    'city' => $contact->getCity(),
                    'state' => $contact->getState(),
                    'zip' => $contact->getZip(),
                    'country' => $contact->getCountry(),
                ],
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to transfer domain: ' . $e->getMessage());
        }
    }

    public function getDomainDetails(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/info', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            // Update domain object with retrieved information
            $domain->setExpirationTime($response['expires_at'] ?? time());
            $domain->setRegistrationTime($response['created_at'] ?? time());
            $domain->setLocked($response['locked'] ?? false);
            
            if (isset($response['nameservers'])) {
                $ns = $response['nameservers'];
                $domain->setNs1($ns[0] ?? '');
                $domain->setNs2($ns[1] ?? '');
                $domain->setNs3($ns[2] ?? '');
                $domain->setNs4($ns[3] ?? '');
            }

            return $domain;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to get domain details: ' . $e->getMessage());
        }
    }

    public function getEpp(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/authcode', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['auth_code'] ?? '';
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to get EPP code: ' . $e->getMessage());
        }
    }

    public function registerDomain(Registrar_Domain $domain)
    {
        try {
            $contact = $domain->getContactRegistrar();
            
            $response = $this->makeApiRequest('domain/register', [
                'domain' => $domain->getSld() . $domain->getTld(),
                'period' => $domain->getRegistrationPeriod(),
                'nameservers' => [
                    $domain->getNs1(),
                    $domain->getNs2(),
                    $domain->getNs3(),
                    $domain->getNs4(),
                ],
                'contact' => [
                    'first_name' => $contact->getFirstname(),
                    'last_name' => $contact->getLastname(),
                    'email' => $contact->getEmail(),
                    'phone' => $contact->getTel(),
                    'phone_cc' => $contact->getTelCC(),
                    'company' => $contact->getCompany(),
                    'address1' => $contact->getAddress1(),
                    'address2' => $contact->getAddress2(),
                    'city' => $contact->getCity(),
                    'state' => $contact->getState(),
                    'zip' => $contact->getZip(),
                    'country' => $contact->getCountry(),
                ],
                'privacy' => false, // Can be configured
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to register domain: ' . $e->getMessage());
        }
    }

    public function renewDomain(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/renew', [
                'domain' => $domain->getSld() . $domain->getTld(),
                'period' => $domain->getRegistrationPeriod(),
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to renew domain: ' . $e->getMessage());
        }
    }

    public function deleteDomain(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/delete', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to delete domain: ' . $e->getMessage());
        }
    }

    public function enablePrivacyProtection(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/privacy/enable', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to enable privacy protection: ' . $e->getMessage());
        }
    }

    public function disablePrivacyProtection(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/privacy/disable', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to disable privacy protection: ' . $e->getMessage());
        }
    }

    public function lock(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/lock', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to lock domain: ' . $e->getMessage());
        }
    }

    public function unlock(Registrar_Domain $domain)
    {
        try {
            $response = $this->makeApiRequest('domain/unlock', [
                'domain' => $domain->getSld() . $domain->getTld(),
            ]);

            return $response['success'] ?? false;
        } catch (\Exception $e) {
            throw new Registrar_Exception('Failed to unlock domain: ' . $e->getMessage());
        }
    }

    private function validateConfig(): void
    {
        if (empty($this->config['api_key'])) {
            throw new Registrar_Exception('CentralNic API key is required');
        }
    }

    private function makeApiRequest(string $endpoint, array $data): array
    {
        $baseUrl = $this->config['test_mode'] 
            ? ($this->config['sandbox_url'] ?? 'https://sandbox-api.centralnic.com/v1/')
            : 'https://api.centralnic.com/v1/';

        $response = $this->httpClient->request('POST', $baseUrl . $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->config['api_key'],
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Registrar_Exception('API request failed: ' . $response->getContent());
        }

        return $response->toArray();
    }
}