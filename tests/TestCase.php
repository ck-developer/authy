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

use GuzzleHttp\Psr7\Response;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    private function parseResponse($path)
    {
        if (file_exists($path = __DIR__ . '/Mock/' . $path)) {
            $response = array_map('trim', file($path));

            $headers = array();
            $body = trim(array_pop($response));

            list($protocol, $version) = explode('/', array_shift($response));
            list($version, $code, $reasonPhrase) = explode(' ', trim($version));

            foreach ($response as $line) {
                $header = explode(': ', $line);

                if ($header[0] && $header[1]) {
                    $headers[$header[0]] = $header[1];
                }
            }

            return new Response(
                $code,
                $headers,
                $body,
                $version,
                $reasonPhrase
            );
        }
    }
}
