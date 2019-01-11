<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /gamecon/Login_Register.php");
}
session_start();
if(!($_GET["id"] > 0)){
    print("<script>console.log('Error Remove Ticket')</script>");
    header("Location: /gamecon/Purchase/SetTickets.php");
} else {
    try{
        $arr = $_SESSION["tickets"];
        $id = $_GET["id"];
        unset($arr[$id]);
        $_SESSION["tickets"] = $arr;
        header("Location: /gamecon/Purchase/SetTickets.php");
    } catch (Exception $e){
        print $e;
    }
}
?>
