<?php

namespace Ck\Guzzle\Test;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class RequestTest extends TestCase
{
    public function testRequest()
    {
        dump($this->parseResponse('RequestSuccess.txt'));
        exit();

        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], '{"code": 200}')
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $this->assertEquals('{"code": 200}', $client->request('GET', '/')->getBody());
    }

    private function parseResponse($path)
    {
        if(file_exists($path = __DIR__ . '/Mock/'.$path))
        {
            $response = file($path);

            $code = array_shift($response);
            $headers = array();
            $body = array_pop($response);

            $test = array_map(function ($header){
                list($name, $value) = explode(':', $header);
                return $value;
            }, $response);

            dump($test);
            exit();

            dump($code);
            dump($headers);
            dump($body);
            exit();

            return $response;
        }
    }
}
