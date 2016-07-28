<?php

/*
 * A php library for using the Authy API.
 *
 * @link      https://github.com/ck-developer/authy
 * @package   authy
 * @license   MIT
 * @copyright Copyright (c) 2016 Claude Khedhiri <claude@khedhiri.com>
 */

namespace Authy\Message;

use Psr\Http\Message\ResponseInterface;

abstract class AbstractResponse
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var array $data
     */
    protected $data;

    /**
     * AbstractResponse constructor.
     * 
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->status = $response->getStatusCode();
        $this->data = json_decode($response->getBody()->getContents(), true);
    }

    public function getMessage()
    {
        return $this->data['message'];
    }

    public function isSuccessful()
    {
        return $this->data['success'];
    }
}
