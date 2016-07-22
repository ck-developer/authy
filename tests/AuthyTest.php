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

class AuthyTest extends TestCase
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

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
}
