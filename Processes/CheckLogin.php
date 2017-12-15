<?php
class func
{
    public static function checkLogin($conn)
    {
        if (!isset($_COOKIE['account_id']))
            session_start();
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {

            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query23 = "SELECT * FROM sessions WHERE session_accountid = " . $account_id . " AND session_token = '" . $token . "';";
            $results = $conn->query($query23) or die ("HELP " . $conn->error);

            if ($results->num_rows > 0) {
                while ($result = $results->fetch_array()) {
                    if ($result['session_accountid'] == $_COOKIE['account_id'] &&
                        $result['session_token'] == $_COOKIE['token']) {
                        return true;
                    }
                }
            } else {
                echo "no rows";
            }
        }
    }
} ?>