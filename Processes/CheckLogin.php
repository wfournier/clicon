<?php
class func
{
    public static function checkLogin($conn)
    {
        if (isset($_COOKIE['account_id']) && isset($_COOKIE['token'])) {

            $account_id = $_COOKIE['account_id'];
            $token = $_COOKIE['token'];

            $query23 = "SELECT * FROM sessions WHERE session_accountid = " . $account_id . ";";
            $results = $conn->query($query23) or die ("HELP " . $conn->error);


                while ($result = $results->fetch_array()) {
                    if ($result['session_accountid'] == $_COOKIE['account_id'] &&
                        $result['session_token'] == $_COOKIE['token']) {
                        return true;
                    }
                }

                print("<script>console.log('. json_encode( \"no cookie for connection, $account_id, $token\" ) .')</script>");

        }
    }
} ?>