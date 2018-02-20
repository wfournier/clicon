<?php

class func
{

    public static function checkLogin()
    {
        $bool = false;
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {
            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query = "SELECT * FROM sessions WHERE session_accountid = " . self::getConnection()->real_escape_string($account_id) . " ;";
            $results = self::getConnection()->query($query) or die ("HELP " . self::getConnection()->error);

            if ($results->num_rows > 0) {
                while ($result = $results->fetch_assoc()) {
                    $te = $result['session_token'];
                    if ($result['session_accountid'] == $account_id && $result['session_token'] == $token) {
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

    public static function login($accountId)
    {
        $token = bin2hex(random_bytes(64 / 2));
        setcookie("token", $token, (time() + (89400 * 365)), "/");
        setcookie("account_id", $accountId, (time() + (89400 * 365)), "/");
        $set_sess = "INSERT INTO sessions (session_id, session_accountid, session_token) VALUES (NULL, " .
            self::getConnection()->real_escape_string($accountId) . ", '" . self::getConnection()->real_escape_string($token) . "');";
        self::getConnection()->query($set_sess) or die("set session failed " . self::getConnection()->error);
        header("Location: Account/ModifyInfo.php");
    }

    public static function getIDFromTicket($token)
    {
        $query = "SELECT TICKET_ID FROM ticket WHERE ID_TOKEN = '" . self::getConnection()->real_escape_string($token) . "' ;";
        $results = self::getConnection()->query($query) or die ("HELP getIDFromTicket " . self::getConnection()->error);
        $string = "";
        if ($results->num_rows > 0) {
            while ($result = $results->fetch_assoc()) {
                $string = $result["TICKET_ID"];
            }
        }
        return $string;
    }

    public static function getFromTable($column, $table, $idFieldName, $id)
    {
        if ($id == null)
            $id = $_COOKIE['account_id'];

        if ($idFieldName == null)
            $idFieldName = "ACCOUNT_ID";

        $table = strtolower($table);
        $column = strtoupper($column);
        $string = "";
        $query = "SELECT " . $column . " FROM " . $table . " WHERE " . $idFieldName . " = " . $id . " ;";
        $results = self::getConnection()->query($query) or die ("HELP getFromTable " . self::getConnection()->error);

        if ($results->num_rows > 0) {
            while ($result = $results->fetch_assoc()) {
                $string = $result["$column"];
            }
        } else {
            print("<script>console.log('no result from query')</script>");
        }

        return $string;
    }

    public static function getIdFromToken($column, $table, $idFieldName, $id)
    {
        if ($id == null)
            $id = $_COOKIE['account_id'];

        if ($idFieldName == null)
            $idFieldName = "ACCOUNT_ID";

        $table = strtolower($table);
        $column = strtoupper($column);
        $string = "";
        $query = "SELECT " . $column . " FROM " . $table . " WHERE " . $idFieldName . " = '" . $id . "' ;";
        $results = self::getConnection()->query($query) or die ("HELP getFromTable " . self::getConnection()->error);

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
        $results = self::getConnection()->query($query) or die ("HELP setToTable " . self::getConnection()->error);
    }

    public static function insertIntoAccount(Account $AccountObj)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Account.php";
        $query = "INSERT INTO account (LAST_NAME, FIRST_NAME, EMAIL, PASS_HASH, DATE_OF_BIRTH, PHONE, ADDRESS, CITY, ZIP, COUNTRY_ID, STATE_ID, IS_ADULT) VALUES 
        ('" . self::getConnection()->real_escape_string($AccountObj->last_name) . "', '" . self::getConnection()->real_escape_string($AccountObj->first_name) . "', '" . self::getConnection()->real_escape_string($AccountObj->email) . "', '" . self::getConnection()->real_escape_string($AccountObj->password) .
            "', '" . self::getConnection()->real_escape_string($AccountObj->dob) . "', '" . self::getConnection()->real_escape_string($AccountObj->phone) . "', '" . self::getConnection()->real_escape_string($AccountObj->address) . "', '" . self::getConnection()->real_escape_string($AccountObj->city) . "', '" .
            self::getConnection()->real_escape_string($AccountObj->zip) . "', " . self::getConnection()->real_escape_string($AccountObj->country) . ", " . self::getConnection()->real_escape_string($AccountObj->state) . ", " . self::getConnection()->real_escape_string($AccountObj->isAdult) . ");";
        $results = self::getConnection()->query($query) or die ("HELP insertIntoAccount " . self::getConnection()->error);
    }

    public static function insertIntoTransaction($priceTotal, $token)
    {
        $account_id = $_COOKIE['account_id'];
        $query = "INSERT INTO transaction (TRANSACTION_ID, ACCOUNT_ID, PRICE_TOTAL, ID_TOKEN) VALUES (null, '" . self::getConnection()->real_escape_string($account_id) . "', " . self::getConnection()->real_escape_string($priceTotal) . ", '" . self::getConnection()->real_escape_string($token) . "');";
        $results = self::getConnection()->query($query) or die ("HELP insertIntoTransaction " . self::getConnection()->error);
    }

    public static function insertIntoTicket($token, $price, $extra, $ticket)
    {
        $account_id = $_COOKIE['account_id'];
        $query = "SELECT TRANSACTION_ID FROM transaction WHERE ACCOUNT_ID = " . self::getConnection()->real_escape_string($account_id) . " AND ID_TOKEN = '" . self::getConnection()->real_escape_string($token) . "';";
        $results = self::getConnection()->query($query) or die ("HELP insertIntoTicket " . self::getConnection()->error);
        while ($result = $results->fetch_assoc()) {
            $transac_id = $result['TRANSACTION_ID'];
            if ($transac_id != 0) {
                $query1 = "INSERT INTO ticket (TICKET_ID, TRANSACTION_ID, PRICE, EXTRAS, TICKET_TYPE, ID_TOKEN) VALUES (null, '" . self::getConnection()->real_escape_string($transac_id) . "', " . self::getConnection()->real_escape_string($price) . ", '" . self::getConnection()->real_escape_string($extra) . "', '" . self::getConnection()->real_escape_string($ticket) . "', '" . self::getConnection()->real_escape_string($token) . "');";
                $results1 = self::getConnection()->query($query1) or die ("HELP2 " . self::getConnection()->error);
            }
        }
    }
} ?>