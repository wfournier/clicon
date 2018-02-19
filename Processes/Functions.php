<?php

class func
{

    public static function checkLogin()
    {
        $bool = false;
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {
            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query = "SELECT * FROM sessions WHERE session_accountid = " . $account_id . " ;";
            $results = self::getConnection()->query($query) or die ("HELP " . self::getConnection()->error);

            if ($results->num_rows > 0) {

                while ($result = $results->fetch_assoc()) {
                    $te = $result['session_token'];
                    if ($result['session_accountid'] == $account_id &&
                        $result['session_token'] == $token) {
                        $bool = true;
                    }
                }
            } else {
                print("<script>console.log('no result from query')</script>");
            }
        }
        return $bool;
    }

    public static function getConnection()
    {
        $host = "localhost";
        $port = 3306;
        $socket = "";
        $user = "root";
        $password = "root";
        $dbname = "gamecon";

        $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());

        return $con;
    }

    public static function getFromTable($column, $table)
    {
        $table = strtolower($table);
        $column = strtoupper($column);
        $string = "";
        $account_id = $_COOKIE['account_id'];
        $query = "SELECT " . $column . " FROM " . $table . " WHERE ACCOUNT_ID = " . $account_id . " ;";
        $results = self::getConnection()->query($query) or die ("HELP " . self::getConnection()->error);

        if ($results->num_rows > 0) {
            while ($result = $results->fetch_assoc()) {
                $string = $result["$column"];
            }
        } else {
            print("<script>console.log('no result from query')</script>");
        }

        return $string;
    }

    public static function setToTable($column, $val, $table, $id, $idFieldName)
    {
        if ($id == null)
            $id = $_COOKIE['account_id'];

        if ($idFieldName == null)
            $idFieldName = "ACCOUNT_ID";

        $table = strtolower($table);
        $column = strtoupper($column);
        $idFieldName = strtoupper($idFieldName);

        $query = "UPDATE " . $table . " SET " . $column . " = '" . $val . "' WHERE " . $idFieldName . " = " . $id . ";";
        $results = self::getConnection()->query($query) or die ("HELP " . self::getConnection()->error);
    }

    public static function insertIntoAccount(Account $AccountObj)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Account.php";
        $query = "INSERT INTO account (LAST_NAME, FIRST_NAME, EMAIL, PASS_HASH, DATE_OF_BIRTH, PHONE, ADDRESS, CITY, ZIP, COUNTRY_ID, STATE_ID, IS_ADULT) VALUES 
('" . $AccountObj->last_name . "', '" . $AccountObj->first_name . "', '" . $AccountObj->email . "', '" . $AccountObj->password .
            "', '" . $AccountObj->dob . "', '" . $AccountObj->phone . "', '" . $AccountObj->address . "', '" . $AccountObj->city . "', '" .
            $AccountObj->zip . "', " . $AccountObj->country . ", " . $AccountObj->state . ", " . $AccountObj->isAdult . ");";
        $results = self::getConnection()->query($query) or die ("HELP " . self::getConnection()->error);
    }

    public static function insertIntoTransaction($priceTotal, $token)
    {
        $account_id = $_COOKIE['account_id'];
        $query = "INSERT INTO transaction (TRANSACTION_ID, ACCOUNT_ID, PRICE_TOTAL, ID_TOKEN) VALUES (null, '" . $account_id . "', " . $priceTotal . ", '" . $token . "');";
        $results = self::getConnection()->query($query) or die ("HELP " . self::getConnection()->error);
    }

    public static function insertIntoTicket($token, $price, $extra, $ticket)
    {
        $account_id = $_COOKIE['account_id'];
        $query = "SELECT TRANSACTION_ID FROM transaction WHERE ACCOUNT_ID = " . $account_id . " AND ID_TOKEN = '" . $token . "';";
        $results = self::getConnection()->query($query) or die ("HELP1 " . self::getConnection()->error);
        while ($result = $results->fetch_assoc()) {
            $transac_id = $result["TRANSACTION_ID"];
            if ($transac_id != 0) {
                $query1 = "INSERT INTO ticket (TICKET_ID, TRANSACTION_ID, PRICE, EXTRAS, TICKET_TYPE) VALUES (null, '" . $transac_id . "', " . $price . ", '" . $extra . "', '" . $ticket . "');";
                $results = self::getConnection()->query($query1) or die ("HELP2 " . self::getConnection()->error . $transac_id);
            }
        }
    }
} ?>