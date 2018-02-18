<?php
/**
 * Created by PhpStorm.
 * User: luxor
 * Date: 2/18/2018
 * Time: 5:37 PM
 */

class Sessions
{
    var $accountID = 0;
    var $sessionToken = "";

    /**
     * @return int
     */
    public function getAccountID(): int
    {
        return $this->accountID;
    }

    /**
     * @param int $accountID
     */
    public function setAccountID(int $accountID)
    {
        $this->accountID = $accountID;
    }

    /**
     * @return string
     */
    public function getSessionToken(): string
    {
        return $this->sessionToken;
    }

    /**
     * @param string $sessionToken
     */
    public function setSessionToken(string $sessionToken)
    {
        $this->sessionToken = $sessionToken;
    }


}