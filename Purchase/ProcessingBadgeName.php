<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Classes/Ticket.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/langquery/langquery.php" ?>
<?php

$lang = new LangQuery();

if (!func::checkLogin()) {
    header("Location: /clicon/Login_Register.php");
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

    header("Location: /clicon/Purchase/SetTickets.php");
} else {
    $_SESSION["Error_Extra"] = $lang("err_extra");
    header("Location: /clicon/Purchase/SetTickets.php");
}
?>