<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/gamecon/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_Register.php");
}
session_start();
if($_SESSION["tickets"] == null){
    $_SESSION["Error_Ticket"] = "Please make sure to correctly edit each ticket.(1)";
    header("Location: /gamecon/Purchase/SetTickets.php");
} else {
    $isValid = true;
    $tickets = $_SESSION["tickets"];
    foreach ($tickets as $ticket){
        $isDaySelected = false;
        if($ticket->isFriday() == true)
            $isDaySelected = true;
        if($ticket->isSaturday() == true)
            $isDaySelected = true;
        if($ticket->isSunday() == true)
            $isDaySelected = true;
        if($isDaySelected == false)
            $isValid = false;
    }

    if($isValid == false){
        $_SESSION["Error_Edit"] = "Please make sure to correctly edit each ticket.(2)";
        header("Location: /gamecon/Purchase/SetTickets.php");
    } else {
        header("Location: /gamecon/Purchase/Confirm.php");
    }
}
?>