<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/gamecon/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_register.php");
}
session_start();
if ($_POST["id"] != null) {
    $tickets = $_SESSION["tickets"];
    $id = $_POST["id"];
    $ticket = $tickets["$id"];
    $atLeastOne = false;

    if(isset($_POST["friday"]) && $_POST["friday"] == true) {
        $_SESSION["friday$id"] = "something";
        echo "fr";
        $ticket->setFriday(true);
        $atLeastOne = true;
    }else
        $ticket->setFriday(false);
    if(isset($_POST["saturday"]) && $_POST["saturday"] == true) {
        $_SESSION["saturday$id"] = "something";
        echo "sa";
        $ticket->setSaturday(true);
        $atLeastOne = true;
    }else
        $ticket->setSaturday(false);
    if(isset($_POST["sunday"]) && $_POST["sunday"] == true) {
        $_SESSION["sunday$id"] = "something";
        echo "su";
        $ticket->setSunday(true);
        $atLeastOne = true;
    } else
        $ticket->setSunday(false);

    if($atLeastOne)
        header("Location: /gamecon/Purchase/SelectExtra.php?id=$id");
    else {
        $id=$_POST["id"];
        $_SESSION["Error_Ticket"] = "Please make sure you select at least one day.";
        header("Location: /gamecon/Purchase/SelectTicket.php?id=$id");
    }
} else {
    if($_POST["id"]!=null){
        $id=$_POST["id"];
        $_SESSION["Error_Ticket"] = "Please make sure you select at least one day.";
        header("Location: /gamecon/Purchase/SelectTicket.php?id=$id");
    } else {
        $_SESSION["Error_Edit"] = "An error occurred while processing ticket. Please try again.";
        header("Location: /gamecon/Purchase/SetTickets.php");
    }
}
?>