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

class AuthyDetailsRequest extends AbstractRequest
{
    public function send()
    {
        return new AuthyDetailsResponse($this->httpClient->get('app/details'));
    }
}
