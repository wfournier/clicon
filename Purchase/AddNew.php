<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /clicon/Login_Register.php");
}
session_start();
$arr = $_SESSION["tickets"];
$lastID = end($arr)->ticketID;
$lastID++;
$ticket = new Ticket();
$ticket->setTicketID($lastID);
$arr["$lastID"] = $ticket;
$_SESSION["tickets"] = $arr;
header("Location: /clicon/Purchase/SetTickets.php")
?>