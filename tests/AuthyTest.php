<?php

/*
 * A php library for using the Authy API.
 *
 * @link      https://github.com/ck-developer/authy
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2016 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Authy\Test;

use Authy\Authy;
use Authy\Message\AuthyDetailsResponse;

class AuthyTest extends TestCase
{
    /**
     * @var Authy
     */
    private $authy;

    public function setUp()
    {
        $this->authy = new Authy();
    }

    public function testConstruct()
    {
        $this->assertEmpty($this->authy->getApiKey());
        $this->assertTrue($this->authy->isSandbox());
    }

    public function testInitialize()
    {
        $this->authy->initialize(array(
            'apiKey' => '6w0k69Eu2HUiX51',
            'sandbox' => false,
        ));

        $this->assertEquals('6w0k69Eu2HUiX51', $this->authy->getApiKey());
        $this->assertFalse($this->authy->isSandbox());
    }

    public function testParameters()
    {
        $this->authy->setApiKey('Bh83Lb93BsTsKbN');
        $this->authy->setSandbox(true);

        $this->assertEquals('Bh83Lb93BsTsKbN', $this->authy->getApiKey());
        $this->assertTrue($this->authy->isSandbox());
    }

    public function testEndpoint()
    {
        $this->authy->setSandbox(true);
        $this->assertEquals('https://sandbox-api.authy.com/protected/json/', $this->authy->getEndpoint());

        $this->authy->setSandbox(false);
        $this->assertEquals('https://api.authy.com/protected/json/', $this->authy->getEndpoint());
    }

    public function testHttpClient()
    {
        $this->assertInstanceOf('GuzzleHttp\Client', $this->authy->getHttpClient());

        $authy = new Authy(array(), $this->getMockHttpClient());

        $this->assertInstanceOf('GuzzleHttp\Client', $authy->getHttpClient());
    }

    public function testDetails()
    {
        $this->authy->setApiKey('0cd08abec2e9b9641e40e9470a7fc336');
        $this->authy->setSandbox(true);

        /** @var AuthyDetailsResponse $response */
        $response = $this->authy->details();

        $this->assertTrue($response->isSuccessful());
        $this->assertInternalType('string', $response->getMessage());
        $this->assertInternalType('string', $response->getName());
    }

    protected function getMockHttpClient()
    {
        return new \GuzzleHttp\Client();
    }
}
