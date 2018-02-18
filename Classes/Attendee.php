<?php
/**
 * Created by PhpStorm.
 * User: luxor
 * Date: 2/18/2018
 * Time: 5:36 PM
 */

class Attendee
{
    var $accountID = 0;
    var $isVolunteer = false;

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
     * @return bool
     */
    public function isVolunteer(): bool
    {
        return $this->isVolunteer;
    }

    /**
     * @param bool $isVolunteer
     */
    public function setIsVolunteer(bool $isVolunteer)
    {
        $this->isVolunteer = $isVolunteer;
    }

}