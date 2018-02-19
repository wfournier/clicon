<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /Login_Register.php");
}
session_start();
if ($_SESSION["tickets"] == null) {
    $_SESSION["Error_Ticket"] = "Please make sure to correctly edit each ticket.(1)";
    header("Location: /Purchase/SetTickets.php");
} else {
    $isValid = false;
    $tickets = $_SESSION["tickets"];
    foreach ($tickets as $ticket) {
        $price = 0;

        //Validation and Day-Price Calculation
        if ($ticket->isFriday() == true) {
            $isValid = true;
            $price += 25;
        }
        if ($ticket->isSaturday() == true) {
            $isValid = true;
            $price += 40;
        }
        if ($ticket->isSunday() == true) {
            $isValid = true;
            $price += 35;
        }
        if ($ticket->isFriday() == true && $ticket->isSaturday() == true && $ticket->isSunday() == true)
            $price = 55;

        $numExtras = 0;
        //Price Extra Calculation
        if ($ticket->isExtra1())
            $numExtras++;
        if ($ticket->isExtra2())
            $numExtras++;
        if ($ticket->isExtra3())
            $numExtras++;

        switch ($numExtras) {
            case 1:
                $price += 10;
                break;
            case 2:
                $price += 17;
                break;
            case 3:
                $price += 23;
                break;
            case 4:
                $price += 23;
                break;
        }
        if ($numExtras >= 5)
            $price += 30;

        $id = $ticket->ticketID;
        $tickets["$id"]->setPrice($price);
        $_SESSION["tickets"] = $tickets;
    }
    if ($isValid == false) {
        $_SESSION["Error_Edit"] = "Please make sure to correctly edit each ticket.(2)";
        header("Location: /Purchase/SetTickets.php");
    } else {
        header("Location: /Purchase/Confirm.php");
    }
}
?>