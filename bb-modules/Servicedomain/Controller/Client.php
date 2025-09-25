<?php
/**
 * Client Controller for Domain Management Module
 * 
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 */

namespace Box\Mod\Servicedomain\Controller;

class Client implements \FOSSBilling\InjectionAwareInterface
{
    protected $di;

    public function setDi($di)
    {
        $this->di = $di;
    }

    public function getDi()
    {
        return $this->di;
    }

    /**
     * Register routes
     */
    public function register(\Box_App &$app)
    {
        $app->get('/servicedomain', 'get_index', [], get_class($this));
        $app->get('/servicedomain/index', 'get_index', [], get_class($this));
        $app->get('/servicedomain/register', 'get_register', [], get_class($this));
        $app->get('/servicedomain/transfer', 'get_transfer', [], get_class($this));
        $app->get('/servicedomain/manage/:id', 'get_manage', ['id' => '[0-9]+'], get_class($this));
    }

    /**
     * Domain list page
     */
    public function get_index(\Box_App $app)
    {
        $this->di['is_client_logged'];
        return $app->render('mod_servicedomain_index');
    }

    /**
     * Domain registration page
     */
    public function get_register(\Box_App $app)
    {
        $this->di['is_client_logged'];
        
        // Get available TLDs and prices
        $api = $this->di['api_client'];
        $tld_prices = $api->servicedomain_get_tld_prices();
        
        // Get countries list for contact form
        $countries = $this->di['tools']->getCountries();
        
        return $app->render('mod_servicedomain_register', [
            'tld_prices' => $tld_prices,
            'countries' => $countries
        ]);
    }

    /**
     * Domain transfer page
     */
    public function get_transfer(\Box_App $app)
    {
        $this->di['is_client_logged'];
        return $app->render('mod_servicedomain_transfer');
    }

    /**
     * Domain management page
     */
    public function get_manage(\Box_App $app, $id)
    {
        $this->di['is_client_logged'];
        
        // Verify domain ownership
        $api = $this->di['api_client'];
        
        try {
            $domain = $api->servicedomain_get(['id' => $id]);
        } catch (\Exception $e) {
            throw new \Box_Exception('Domain not found or access denied', null, 404);
        }
        
        // Get countries list for contact form
        $countries = $this->di['tools']->getCountries();
        
        return $app->render('mod_servicedomain_manage', [
            'domain' => $domain,
            'countries' => $countries
        ]);
    }
}