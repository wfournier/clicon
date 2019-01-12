<?php

class func
{
//    unsed to check login in account and purchase pages as well as on nav bar to change options
    public static function checkLogin()
    {
        $bool = false;
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {
            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query = "SELECT * FROM sessions WHERE ACCOUNT_ID = " . self::getConnection()->real_escape_string($account_id) . " and  SESSION_TOKEN = '" . self::getConnection()->real_escape_string($token) . "';";
            $results = self::getConnection()->query($query) or die ("HELP checklogin " . self::getConnection()->error);

            if ($results->num_rows > 0) {
                $bool = true;
            } else {
                print("<script>console.log('no result from query')</script>");
            }
        }
        return $bool;
    }

//    used to pass connection setting to rest of this folder and some other code without need for repetition
    public static function getConnection()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "clicon";

        $con = new mysqli($host, $user, $password, $dbname)
        or die ('Could not connect to the database server' . mysqli_connect_error());

        return $con;
    }

//    used to login at registration with account id retrieved from token !!!only use then, because otherwise doesn't require password
    public static function login($accountId)
    {
        $token = bin2hex(random_bytes(64 / 2));
        setcookie("token", $token, (time() + (89400 * 365)), "/");
        setcookie("account_id", $accountId, (time() + (89400 * 365)), "/");
        $set_sess = "INSERT INTO sessions (session_id, account_id, session_token) VALUES (NULL, " .
            self::getConnection()->real_escape_string($accountId) . ", '" . self::getConnection()->real_escape_string($token) . "');";
        self::getConnection()->query($set_sess) or die("set session failed " . self::getConnection()->error);
        header("Location: /clicon/Account/ModifyInfo.php");
    }

//    log outs the user
    public static function logout()
    {
        $query = "DELETE FROM sessions WHERE account_id = " . self::getConnection()->real_escape_string($_COOKIE["account_id"]) . ";";
        self::getConnection()->query($query);
        unset($_COOKIE['account_id']);
        unset($_COOKIE['token']);
    }

//    updates user info
    public static function UpdateAccount($lname, $fname, $phone, $address, $city, $zip, $country, $state)
    {
        $worked = false;
        $account_id = $_COOKIE['account_id'];
        $updateSql = "UPDATE account SET LAST_NAME = '" . self::getConnection()->real_escape_string($lname) . "', FIRST_NAME = '" . self::getConnection()->real_escape_string($fname) . "', PHONE = '" . self::getConnection()->real_escape_string($phone) . "', ADDRESS = '" . self::getConnection()->real_escape_string($address) . "', CITY = '" . self::getConnection()->real_escape_string($city) . "', ZIP = '" . self::getConnection()->real_escape_string($zip) . "', COUNTRY_ID = " . self::getConnection()->real_escape_string($country) . ", STATE_ID = " . self::getConnection()->real_escape_string($state) . " WHERE ACCOUNT_ID = " . self::getConnection()->real_escape_string($account_id);
        if (self::getConnection()->query($updateSql) === TRUE)
            $worked = true;
        return $worked;
    }

    public static function UpdatePass($passHash){
        $account_id = $_COOKIE['account_id'];
        $update_pass_sql = "UPDATE account SET PASS_HASH = '" .self::getConnection()->real_escape_string($passHash) ."' WHERE ACCOUNT_ID = " .self::getConnection()->real_escape_string($account_id);
        $worked = false;
        if (self::getConnection()->query($update_pass_sql) === TRUE)
            $worked = true;
        return $worked;
    }

//    get id from ticket with unique token
    public static function getTicketID($token)
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

    //generic function to get a field from a table       !!! id no '' !!!
    public static function getFromTable($column, $table, $idFieldName, $id)
    {
//        !!!if idfieldname and id are null, account_id will be used from cookie!!!
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
        } else
            print("<script>console.log('no result from query')</script>");
        return $string;
    }

    //Used to get account id to login suring registration process
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
        } else
            print("<script>console.log('no result from query')</script>");
        return $string;
    }

    //generic function to set a field in a table based on a given id
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

//    public static function insertIntoAccount(Account $AccountObj)
//    {
//        include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Classes/Account.php";
//        $query = "INSERT INTO account (LAST_NAME, FIRST_NAME, EMAIL, PASS_HASH, DATE_OF_BIRTH, PHONE, ADDRESS, CITY, ZIP, COUNTRY_ID, STATE_ID, IS_ADULT) VALUES
//        ('" . self::getConnection()->real_escape_string($AccountObj->last_name) . "', '" . self::getConnection()->real_escape_string($AccountObj->first_name) . "', '" . self::getConnection()->real_escape_string($AccountObj->email) . "', '" . self::getConnection()->real_escape_string($AccountObj->password) .
//            "', '" . self::getConnection()->real_escape_string($AccountObj->dob) . "', '" . self::getConnection()->real_escape_string($AccountObj->phone) . "', '" . self::getConnection()->real_escape_string($AccountObj->address) . "', '" . self::getConnection()->real_escape_string($AccountObj->city) . "', '" .
//            self::getConnection()->real_escape_string($AccountObj->zip) . "', " . self::getConnection()->real_escape_string($AccountObj->country) . ", " . self::getConnection()->real_escape_string($AccountObj->state) . ", " . self::getConnection()->real_escape_string($AccountObj->isAdult) . ");";
//        $results = self::getConnection()->query($query) or die ("HELP insertIntoAccount " . self::getConnection()->error);
//    }

    //create new transaction with unique token because we don't know the id yet
    public static function insertIntoTransaction($priceTotal, $token)
    {
        $account_id = $_COOKIE['account_id'];
        $query = "INSERT INTO transaction (TRANSACTION_ID, ACCOUNT_ID, PRICE_TOTAL, ID_TOKEN) VALUES (null, '" . self::getConnection()->real_escape_string($account_id) . "', " . self::getConnection()->real_escape_string($priceTotal) . ", '" . self::getConnection()->real_escape_string($token) . "');";
        $results = self::getConnection()->query($query) or die ("HELP insertIntoTransaction " . self::getConnection()->error);
    }

    //get transactionID with unique token
    public static function getTransactionIDFromToken($token)
    {
        $string = "";
        $account_id = $_COOKIE['account_id'];
        $query = "SELECT TRANSACTION_ID FROM transaction WHERE ACCOUNT_ID = " . self::getConnection()->real_escape_string($account_id) . " AND ID_TOKEN = '" . self::getConnection()->real_escape_string($token) . "';";
        $results = self::getConnection()->query($query) or die ("HELP insertIntoTicket(getTransID " . self::getConnection()->error);
        while ($result = $results->fetch_assoc()) {
            $transac_id = $result['TRANSACTION_ID'];
            if ($transac_id != 0)
                $string = $transac_id;
        }
        return $string;
    }

    //insert a new ticket with a unique token because we don't know the ticket id yet
    public static function insertIntoTicket($token, $transac_id, $price, $extra, $ticket)
    {
        $query1 = "INSERT INTO ticket (TICKET_ID, TRANSACTION_ID, PRICE, EXTRAS, TICKET_TYPE, ID_TOKEN) VALUES (null, '" . self::getConnection()->real_escape_string($transac_id) . "', " . self::getConnection()->real_escape_string($price) . ", '" . self::getConnection()->real_escape_string($extra) . "', '" . self::getConnection()->real_escape_string($ticket) . "', '" . self::getConnection()->real_escape_string($token) . "');";
        $results1 = self::getConnection()->query($query1) or die ("HELP insertIntoTicket " . self::getConnection()->error);
    }

    //Insert a new attendee
    public static function insertIntoAttendee($ticketID)
    {
        $query = "INSERT INTO attendee (ATTENDEE_ID, TICKET_ID) VALUES (null, " . self::getConnection()->real_escape_string($ticketID) . ");";
        $results = self::getConnection()->query($query) or die ("HELP insertIntoAttendee " . self::getConnection()->error);
    }
} ?>