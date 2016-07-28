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

class AuthyStatsResponse extends AbstractResponse
{
    /**
     * @return array|null
     */
    public function getStats()
    {
        return $this->isSuccessful() ? $this->data['stats'] : null;
    }

    public function getTotalUsers()
    {
        return $this->isSuccessful() & array_key_exists('total_users', $this->data) ? $this->data['total_users'] : null;
    }
}
