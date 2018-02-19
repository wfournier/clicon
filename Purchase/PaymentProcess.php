<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /Login_Register.php");
}
session_start();
if(isset($_SESSION["tickets"])){
    $arr = $_SESSION["tickets"];
    $subtotal = 0;
    $token = bin2hex(random_bytes(64/2));

//    CREATE TRANSACTION
    foreach ($arr as $ticket) {
        $subtotal += $ticket->price;
    }
    $totalPrice = $subtotal + ($subtotal*0.15);
    func::insertIntoTransaction($totalPrice, $token);

//    CREATE TICKETS
    foreach ($arr as $ticket){
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
        if($ticket->badgeName != null || $ticket->badgeName != ""){
            $badgeName = $ticket->badgeName;
            func::setToTable("BADGE_NAME", $badgeName, "ticket", "TICKET_ID", $ticketID);
        }
    }
} else {
    header("Location: /Purchase/SetTickets.php");
}