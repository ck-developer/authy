<?php

namespace Authy;

use GuzzleHttp\Client;

class Authy
{
    /**
     * @var Client $httpClient
     */
    private $httpClient;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * Authy constructor.
     *
     * @param array $parameters
     * @param Client|null $httpClient
     */
    public function __construct(array $parameters = array(), Client $httpClient = null)
    {
        $this->initialize($parameters);
        $this->httpClient = $httpClient;
    }

    public function initialize(array $parameters = array())
    {
        $this->parameters = array_merge(array(
            'apiKey' => '',
            'sandbox' => true,
        ), $parameters);
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function getApiKey()
    {
        return $this->parameters['apiKey'];
    }

    /**
     * @param string $apiKey
     *
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->parameters['apiKey'] = $apiKey;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isSandbox()
    {
        return $this->parameters['sandbox'];
    }

    /**
     * @param boolean $sandbox
     *
     * @return $this
     */
    public function setSandbox($sandbox)
    {
        $this->parameters['sandbox'] = $sandbox;
        return $this;
    }
}
