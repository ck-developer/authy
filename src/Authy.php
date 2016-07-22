<?php

/*
 * A php library for using the Authy API.
 *
 * @link      https://github.com/ck-developer/authy
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2016 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Authy;

use GuzzleHttp\Client;

class Authy
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * Authy constructor.
     *
     * @param array       $parameters
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
     * @throws \Exception
     *
     * @return string
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
     * @return bool
     */
    public function isSandbox()
    {
        return $this->parameters['sandbox'];
    }

    /**
     * @param bool $sandbox
     *
     * @return $this
     */
    public function setSandbox($sandbox)
    {
        $this->parameters['sandbox'] = $sandbox;
        return $this;
    }
}
