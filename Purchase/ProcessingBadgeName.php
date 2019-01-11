<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Classes/Ticket.php" ?>
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

    if (isset($_POST["badge"]) && $_POST["badge"] != "") {
        $_SESSION["badge$id"] = $_POST["badge"];
        echo $_POST["badge"];
        $ticket->setBadgeName($_POST["badge"]);
    } else
        $ticket->setBadgeName("");

    //ADD METHOD VALIDATE BADGE NAME WITH DATABASE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    header("Location: /gamecon/Purchase/SetTickets.php");
} else {
    $_SESSION["Error_Extra"] = $lang("err_extra");
    header("Location: /gamecon/Purchase/SetTickets.php");
}
?>