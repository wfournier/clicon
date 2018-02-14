<?php

class func
{
    public static function checkLogin($conn)
    {
        $bool = false;
        print("<script>console.log('CheckLogin')</script>");
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {
            print("<script>console.log('cookies set')</script>");
            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query23 = "SELECT * FROM sessions WHERE session_accountid = " . $account_id . " ;";
            $results = $conn->query($query23) or die ("HELP " . $conn->error);

            if ($results->num_rows > 0) {
                print("<script>console.log('. json_encode( \"query not empty\" ) .')</script>");

                while ($result = $results->fetch_assoc()) {
                    $te = $result['session_token'];
                    print("<script>console.log('$te || $token')</script>");
                    if ($result['session_accountid'] == $account_id &&
                        $result['session_token'] == $token) {
                        print("<script>console.log('true')</script>");
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