<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Classes/Ticket.php" ?>
<?php

if (!func::checkLogin()) {
    header("Location: /clicon/Login_Register.php");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_ConfirmSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php"; ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php"; ?>

<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="PaymentProcess.php">
                <div class="row" style="min-height: 400px">
                    <div class="breadcrumbs"><a href="/clicon/Purchase/SetTickets.php"><?php echo($lang("bread_set_ticket")); ?> </a>>
                        <a href="/clicon/Purchase/Confirm.php"><?php echo($lang("bread_confirm")); ?> </a>>
                    </div>
                    <?php
                    if (isset($_SESSION["Error_Edit"])) {
                        echo "<p><i style='color: red'>" . $_SESSION["Error_Edit"] . "</i></p>";
                        $_SESSION["Error_Edit"] = null;
                    }
                    ?>
                    <h1><?php echo($lang("confirm_info")); ?></h1>
                    <?php
                    $tickets = array();
                    $tickets = $_SESSION["tickets"];
                    $subTotal = 0;
                    foreach ($tickets as $ticket) {
                        ?>
                        <hr>
                        <h4>Ticket #<?php echo $ticket->ticketID ?></h4>
                        <div class="row">
                            <div class="col-xs-5">
                                <b><?php echo($lang("ticket_badge_name")); ?>:</b> <?php echo $ticket->badgeName ?><br>
                                <b><?php echo($lang("ticket_days")); ?>:</b> <br><?php
                                if ($ticket->isFriday() == true)
                                    echo $lang("friday") ." ";

                                if ($ticket->isSaturday() == true)
                                    echo $lang("saturday") ." ";

                                if ($ticket->isSunday() == true)
                                    echo $lang("sunday") ." ";
                                ?>
                            </div>
                            <div class="col-xs-5">
                                <b>Extras:</b><br> <?php if ($ticket->extra1 == true) {
                                    echo $lang("ticket_extra_concert") ."<br>";
                                }
                                if ($ticket->extra2 == true) {
                                    echo $lang("ticket_extra_panel") ."<br>";
                                }
                                if ($ticket->extra3 == true) {
                                    echo $lang("ticket_extra_vip") ."<br>";
                                }
                                if ($ticket->extra1 == false && $ticket->extra2 == false && $ticket->extra3 == false) {
                                    echo $lang("no_extras");
                                }
                                ?>
                            </div>
                            <div class="col-xs-2">
                                <p>
                                    <?php
                                    echo "$ " . number_format($ticket->price, 2);
                                    $subTotal += $ticket->price;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <hr>
                    <div style="text-align: right">
                        <p><?php echo($lang("subtotal")); ?> : <?php echo "$ " . number_format($subTotal, 2); ?></p>
                    </div>
                </div>
                <div class="row" style="margin: 20px 0 20px 0">
                    <a class="btn btn-warning" href="SetTickets.php"><?php echo($lang("back")); ?></a>
                    <input class="btn btn-success" type="submit" value="Proceed to Payment" id="proceed">
                </div>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html"; ?>
</body>
</html>