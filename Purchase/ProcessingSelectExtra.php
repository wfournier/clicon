<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon"."/Classes/Ticket.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/langquery/langquery.php" ?>
<?php

$lang = new LangQuery();

if (!func::checkLogin()) {
    header("Location: /gamecon/Login_Register.php");
}
session_start();
if ($_POST["id"] != null) {
    $tickets = $_SESSION["tickets"];
    $id = $_POST["id"];
    $ticket = $tickets["$id"];

    if(isset($_POST["concert"]) && $_POST["concert"] == true) {
        $_SESSION["concert$id"] = "something";
        echo "concert";
        $ticket->setExtra1(true);
    }else
        $ticket->setExtra1(false);
    if(isset($_POST["panel"]) && $_POST["panel"] == true) {
        $_SESSION["panel$id"] = "something";
        echo "panel";
        $ticket->setExtra2(true);
    }else
        $ticket->setExtra2(false);
    if(isset($_POST["guest"]) && $_POST["guest"] == true) {
        $_SESSION["guest$id"] = "something";
        echo "guest";
        $ticket->setExtra3(true);
    } else
        $ticket->setExtra3(false);

    header("Location: /gamecon/Purchase/SetBadgeName.php?id=$id");
} else {
    if($_POST["id"]!=null){
        $id=$_POST["id"];
        $_SESSION["Error_Extra"] = $lang("err_extra");
        header("Location: /gamecon/Purchase/SelectExtra.php?id=$id");
    } else {
        $_SESSION["Error_Extra"] = $lang("err_extra");
        header("Location: /gamecon/Purchase/SetTickets.php");
    }
}
?>