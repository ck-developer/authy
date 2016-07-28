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
    }

    public function testDetails()
    {
        $this->mockResponse('AuthyDetailsSuccess.txt');

        /** @var AuthyDetailsResponse $response */
        $response = $this->authy->details();

        $this->assertTrue($response->isSuccessful());
        $this->assertInternalType('string', $response->getMessage());
        $this->assertInternalType('int', $response->getId());
        $this->assertInternalType('string', $response->getName());
        $this->assertInternalType('string', $response->getPlan());
        $this->assertInternalType('bool', $response->isSmsEnabled());
        $this->assertInternalType('bool', $response->isOneTouchEnabled());
    }

    public function testStats()
    {
        $this->mockResponse('AuthyStatsSuccess.txt');

        $response = $this->authy->stats();

        $this->assertTrue($response->isSuccessful());
        $this->assertInternalType('string', $response->getMessage());
        $this->assertInternalType('array', $response->getStats());
        $this->assertInternalType('int', $response->getTotalUsers());
    }
}
