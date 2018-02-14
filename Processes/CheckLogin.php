<?php

class func
{
    public static function checkLogin($conn)
    {
        print("<script>console.log('. json_encode( \"CheckLogin\" ) .')</script>");
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {
            print("<script>console.log('. json_encode( \"cookies set\" ) .')</script>");
            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query23 = "SELECT * FROM sessions WHERE session_accountid = " . $account_id . " ;";
            $results = $conn->query($query23) or die ("HELP " . $conn->error);

            if ($results->num_rows > 0) {
                print("<script>console.log('. json_encode( \"query not empty\" ) .')</script>");
                while ($result = $results->fetch_array()) {
                    if ($result['session_accountid'] == $_COOKIE['account_id'] &&
                        $result['session_token'] == $_COOKIE['token']) {
                        print("<script>console.log('. json_encode( \"true\" ) .')</script>");
                        return true;
                    }
                }
            } else {
                print("<script>console.log('. json_encode( \"no result from query\" ) .')</script>");
            }
        }
    }
} ?>