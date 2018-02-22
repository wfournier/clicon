<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Classes/Ticket.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/langquery/langquery.php" ?>
<?php

$lang = new LangQuery();

if (!func::checkLogin()) {
    header("Location: /Login_Register.php");
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
        header("Location: /Purchase/SelectExtra.php?id=$id");
    else {
        $id=$_POST["id"];
        $_SESSION["Error_Ticket"] = $lang("err_ticket");
        header("Location: /Purchase/SelectTicket.php?id=$id");
    }
} else {
    if($_POST["id"]!=null){
        $id=$_POST["id"];
        $_SESSION["Error_Ticket"] = $lang("err_ticket");
        header("Location: /Purchase/SelectTicket.php?id=$id");
    } else {
        $_SESSION["Error_Edit"] = $lang("err_edit");
        header("Location: /Purchase/SetTickets.php");
    }
}
?>