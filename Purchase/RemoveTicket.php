<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /Login_Register.php");
}
session_start();
if(!($_GET["id"] > 0)){
    print("<script>console.log('Error Remove Ticket')</script>");
    header("Location: /Purchase/SetTickets.php");
} else {
    try{
        $arr = $_SESSION["tickets"];
        $id = $_GET["id"];
        unset($arr[$id]);
        $_SESSION["tickets"] = $arr;
        header("Location: /Purchase/SetTickets.php");
    } catch (Exception $e){
        print $e;
    }
}
?>
