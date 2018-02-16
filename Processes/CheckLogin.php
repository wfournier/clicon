<?php

class func
{
    public static function checkLogin($conn)
    {
        $bool = false;
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {
            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query23 = "SELECT * FROM sessions WHERE session_accountid = " . $account_id . " ;";
            $results = $conn->query($query23) or die ("HELP " . $conn->error);

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
} ?>