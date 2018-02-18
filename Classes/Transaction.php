<?php
/**
 * Created by PhpStorm.
 * User: luxor
 * Date: 2/18/2018
 * Time: 5:37 PM
 */

class Transaction
{
    var $accountID;
    var $priceTotal = 0;

    /**
     * @return mixed
     */
    public function getAccountID()
    {
        return $this->accountID;
    }

    /**
     * @param mixed $accountID
     */
    public function setAccountID($accountID)
    {
        $this->accountID = $accountID;
    }

    /**
     * @return int
     */
    public function getPriceTotal(): int
    {
        return $this->priceTotal;
    }

    /**
     * @param int $priceTotal
     */
    public function setPriceTotal(int $priceTotal)
    {
        $this->priceTotal = $priceTotal;
    }

}