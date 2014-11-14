<?php

namespace Banckle\Helpdesk;

use Banckle\Helpdesk\Product;
use Banckle\Helpdesk\APIClient;
use Banckle\Helpdesk\AuthApi;

class Helpdesk {
    private $config;
    private $exception = 'Exception';

    public function __construct($config)
    {
        $this->config = $config;
        $this->banckleAccountUri = $this->config['banckleAccountUri'];
        $this->banckleHelpdeskUri = $this->config['banckleHelpdeskUri'];
        $this->apiKey = $this->config['apiKey'];
        $this->email = $this->config['email'];
        $this->password = $this->config['password'];
    }
    
    /*
     * Create an object APIClient.
     * 
     * @return object
     */
    private function APIClient()
    {
        $apiClient = new APIClient($this->apiKey,$this->banckleHelpdeskUri);
        return $apiClient;
    }
    
    /*
     * Generate new authentication token.
     * 
     * @return string Returns the token.
     */
    public function getToken()
    {
        $apiClient = new APIClient($this->apiKey,$this->banckleAccountUri);

        $body = array('userEmail' => $this->email, 'password' => $this->password);
        $auth = new AuthApi($apiClient);
        $result = $auth->getToken($body);
        $token = $result->authorization->token;
        return $token;
    }
    
    /*
     * Create an object of the class.
     * 
     * @param string $className Name of the class.
     * @param string $token Token.
     * 
     * @return object
     * @throws Exception
     */
    public function get($apiName, $token)
    {	
        if ($apiName == '')
            throw new $this->exception('API name not specified');

        if ($token == '')
            throw new $this->exception('Token not specified');

        Product::$token = $token;
        $apiClient = $this->APIClient();
        $classPath = "Banckle\Helpdesk\\$apiName"; 
        return new $classPath($apiClient); 
    }
    
}