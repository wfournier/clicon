<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /Login_Register.php");
}
session_start();
if (isset($_SESSION["tickets"])) {
    $arr = $_SESSION["tickets"];
    $subtotal = 0;
    $token = bin2hex(random_bytes(64 / 2));

//    CREATE TRANSACTION
    foreach ($arr as $ticket) {
        $subtotal += $ticket->price;
    }
    $totalPrice = $subtotal + ($subtotal * 0.15);
    func::insertIntoTransaction($totalPrice, $token);

//    CREATE TICKETS
    foreach ($arr as $ticket) {
        $price = $ticket->price;

        $ticket_type = "";
        if ($ticket->isFriday() == true)
            $ticket_type = $ticket_type . "F";
        else
            $ticket_type = $ticket_type . "-";
        if ($ticket->isSaturday() == true)
            $ticket_type = $ticket_type . "S";
        else
            $ticket_type = $ticket_type . "-";
        if ($ticket->isSunday() == true)
            $ticket_type = $ticket_type . "S";
        else
            $ticket_type = $ticket_type . "-";

        $extra = "";
        if ($ticket->isExtra1() == true)
            $extra = $extra . "1";
        else
            $extra = $extra . "-";
        if ($ticket->isExtra2() == true)
            $extra = $extra . "2";
        else
            $extra = $extra . "-";
        if ($ticket->isExtra3() == true)
            $extra = $extra . "3";
        else
            $extra = $extra . "-";

        func::insertIntoTicket($token, $price, $extra, $ticket_type);

        $ticketID = func::getIDFromTicket($token);
        if ($ticket->badgeName != null || $ticket->badgeName != "") {
            $badgeName = $ticket->badgeName;
            func::setToTable("BADGE_NAME", $badgeName, "ticket", "TICKET_ID", $ticketID);
        }
    }

    $to = func::getFromTable("EMAIL", "account", null, null);
    $first = func::getFromTable("FIRST_NAME", "account", null, null);
    $last = func::getFromTable("LAST_NAME", "account", null, null);
    $subject = "Clicon Password Recovery";
    $m = "Dear " . $first . " " . $last . ",\n\n<h1>Thank you for you purchase</h1>. \n\nThis is your receipt for ticket to attend Clicon 2019.
    \n\n";


    $tickets = $_SESSION["tickets"];
    $subTotal = 0;
    foreach ($tickets as $ticket) {
        $m = $m . "Ticket #" . $ticket->ticketID . "\n";
        $m = $m . "Badge Name:" . $ticket->badgeName . "\n";
        $m = $m . "Days:\n";
        if ($ticket->isFriday() == true)
            $m = $m . " - Friday\n";
        if ($ticket->isSaturday() == true)
            $m = $m . " - Saturday\n";
        if ($ticket->isSunday() == true)
            $m = $m . " - Sunday\n";

        $m = $m . "\nExtras:\n";
        if ($ticket->extra1 == true) {
            $m = $m . " - Concert\n";
        }
        if ($ticket->extra2 == true) {
            $m = $m . " - Extra Panel\n";
        }
        if ($ticket->extra3 == true) {
            $m = $m . " - Special Guest Autograph\n";
        }
        if ($ticket->extra1 == false && $ticket->extra2 == false && $ticket->extra3 == false) {
            $m = $m . " <i>None</i>\n";
        }
        $subTotal += $ticket->price;
        $m = $m . "\nTicket Price: $ " . number_format($ticket->price, 2);
    }
    $m = $m . " \n<hr>\n";
    $m = $m . "SubTotal: $ " . number_format($subTotal, 2);
    $taxes = $subTotal * 0.15;
    $total = $subTotal + $taxes;
    $m = $m . "\nTaxes: $ " . number_format($taxes, 2);
    $m = $m . "\nTotal: $ " . number_format($total, 2);

    $message = nl2br($m);
    $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($to, $subject, $message, $headers);
    header("Location: /Purchase/Receipt.php");
} else {
    header("Location: /Purchase/SetTickets.php");
}