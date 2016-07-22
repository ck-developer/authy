<?php

namespace Authy\Test;

use Authy\Authy;

class AuthyTest extends TestCase
{
    /**
     * @var \GuzzleHttp\Client $client
     */
    private $client;

    /**
     * @var Authy $authy
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
            'apiKey' => '',
            'sandbox' => false,
        ));
    }
}
