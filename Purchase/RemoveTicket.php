<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /clicon/Login_Register.php");
}
session_start();
if(!($_GET["id"] > 0)){
    print("<script>console.log('Error Remove Ticket')</script>");
    header("Location: /clicon/Purchase/SetTickets.php");
} else {
    try{
        $arr = $_SESSION["tickets"];
        $id = $_GET["id"];
        unset($arr[$id]);
        $_SESSION["tickets"] = $arr;
        header("Location: /clicon/Purchase/SetTickets.php");
    } catch (Exception $e){
        print $e;
    }
}
?>
