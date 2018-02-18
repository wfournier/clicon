<?php

class Ticket
{
    var $accountID;

    var $friday = false;
    var $saturday = false;
    var $sunday = false;

    var $extra1 = false;
    var $extra2 = false;
    var $extra3 = false;

    var $badgeName = "";
    var $price = 0;

    /**
     * @return int
     */
    public function getTempID(): int
    {
        return $this->accountID;
    }

    /**
     * @param int $tempID
     */
    public function setTempID(int $tempID)
    {
        $this->accountID = $tempID;
    }

    /**
     * @return bool
     */
    public function isFriday(): bool
    {
        return $this->friday;
    }

    /**
     * @param bool $friday
     */
    public function setFriday(bool $friday)
    {
        $this->friday = $friday;
    }

    /**
     * @return bool
     */
    public function isSaturday(): bool
    {
        return $this->saturday;
    }

    /**
     * @param bool $saturday
     */
    public function setSaturday(bool $saturday)
    {
        $this->saturday = $saturday;
    }

    /**
     * @return bool
     */
    public function isSunday(): bool
    {
        return $this->sunday;
    }

    /**
     * @param bool $sunday
     */
    public function setSunday(bool $sunday)
    {
        $this->sunday = $sunday;
    }

    /**
     * @return bool
     */
    public function isExtra1(): bool
    {
        return $this->extra1;
    }

    /**
     * @param bool $extra1
     */
    public function setExtra1(bool $extra1)
    {
        $this->extra1 = $extra1;
    }

    /**
     * @return bool
     */
    public function isExtra2(): bool
    {
        return $this->extra2;
    }

    /**
     * @param bool $extra2
     */
    public function setExtra2(bool $extra2)
    {
        $this->extra2 = $extra2;
    }

    /**
     * @return bool
     */
    public function isExtra3(): bool
    {
        return $this->extra3;
    }

    /**
     * @param bool $extra3
     */
    public function setExtra3(bool $extra3)
    {
        $this->extra3 = $extra3;
    }

    /**
     * @return string
     */
    public function getBadgeName(): string
    {
        return $this->badgeName;
    }

    /**
     * @param string $badgeName
     */
    public function setBadgeName(string $badgeName)
    {
        $this->badgeName = $badgeName;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function getDBBadge(): string
    {
        //GET BADGE NAME FROM DATABASE AND RETURN IT
        $this->setBadgeName("something");
        return "something";
    }
}