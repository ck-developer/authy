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

class AuthyDetailsResponse extends AbstractResponse
{
    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->isSuccessful() ? $this->data['app']['app_id'] : null;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->isSuccessful() ? $this->data['app']['name'] : null;
    }

    /**
     * @return string|null
     */
    public function getPlan()
    {
        return $this->isSuccessful() ? $this->data['app']['plan'] : null;
    }

    /**
     * @return boolean|null
     */
    public function isSmsEnabled()
    {
        return $this->isSuccessful() ? $this->data['app']['sms_enabled'] : null;
    }

    /**
     * @return boolean|null
     */
    public function isOneTouchEnabled()
    {
        return $this->isSuccessful() ? $this->data['app']['onetouch_enabled'] : null;
    }
}
