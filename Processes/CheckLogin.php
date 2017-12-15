<?php

class func {
    public static function checkLogin($conn){
        if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID']))
            session_start();
        if (isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])) {
            $query = "SELECT * FROM sessions WHERE session_userid = :userid AND session_token = :token 
            AND session_serial = :serial;";
            $userid = $_COOKIE['userid'];
            $token = $_COOKIE['token'];
            $serial = $_COOKIE['serial'];

            $statement = $conn->prepare($query);
            $statement->execute(array(':userid' => $userid, ':token' => $token, ':serial' => $serial));

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($row['session_userid'] > 0){
                if($row['session_userid'] == $_COOKIE['userid'] &&
                    $row['session_token'] == $_COOKIE['token'] &&
                    $row['session_serial'] == $_COOKIE['serial']){

                    if($row['session_userid'] == $_SESSION['userid'] &&
                        $row['session_token'] == $_SESSION['token'] &&
                        $row['session_serial'] == $_SESSION['serial']){
                        return true;
                }
            }
        }
    }
}
}

?>