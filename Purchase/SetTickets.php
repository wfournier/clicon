<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Classes/Ticket.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Head.php"; ?>
<?php

if (!func::checkLogin()) {
    header("Location: /gamecon/Login_Register.php");
}
session_start();
if ($_POST == null && $_SESSION["qty"] == null) {
    $_SESSION["Error_Quantity"] = $lang("err_at_least_one_ticket");
    header("Location: /gamecon/Purchase/SelectQty.php");
} else {
    $_SESSION["Error_Quantity"] = null;
    if (isset($_POST["qty"])) {
        $_SESSION["qty"] = $_POST["qty"];
    }
}
//Creating default tickets object
if (!isset($_SESSION["tickets"]) || isset($_POST["qty"])) {
    $tickets = array();
    $defaultTicket = new Ticket();
    $defaultTicket->setBadgeName($defaultTicket->getDBBadge());
    $defaultTicket->setTicketID(1);
    $tickets["1"] = $defaultTicket;

    for ($i = 0; $i < $_SESSION["qty"] - 1; $i++) {
        $ticket = new Ticket();
        $w = $i + 2;
        $ticket->setTicketID($w);
        $tickets["$w"] = $ticket;
    }
    $_SESSION["tickets"] = $tickets;
}
if (isset($_SESSION["tickets"])) {
    $arr = $_SESSION["tickets"];
    if (empty($arr)) {
        session_destroy();
        header("Location: /gamecon/Purchase/SelectQty.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <style>
    label {
        width: 100px;
        margin-left: 30px;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Header.php"; ?>
    <main>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="Validate_ProceedToPayment.php">
                    <div class="row" style="min-height: 400px">
                        <?php
                        if (isset($_SESSION["Error_Edit"])) {
                            echo "<p><i style='color: red'>" . $_SESSION["Error_Edit"] . "</i></p>";
                            $_SESSION["Error_Edit"] = null;
                        }
                        ?>
                        <div class="breadcrumbs"><a href="/gamecon/Purchase/SetTickets.php"><?php echo($lang("bread_set_ticket")); ?> </a>></div>
                        <h1 style="margin-top: 0"><?php echo($lang("set_tickets")); ?></h1>
                        <p><i><?php echo($lang("under13")); ?></p>
                            <?php
                            $tickets = array();
                            $tickets = $_SESSION["tickets"];
                            foreach ($tickets as $ticket) {
                                ?>
                                <div class="row">
                                    <hr>
                                    <div class="col-xs-6">
                                        <h4><?php echo($lang("ticket")); ?> #<?php echo $ticket->ticketID ?></h4>
                                        <?php echo($lang("ticket_badge_name")); ?>: <?php echo $ticket->badgeName ?><br>
                                        <?php echo($lang("ticket_days")); ?>: <?php
                                        if ($ticket->isFriday() == true) {
                                            echo $lang("friday")[0] ." ";
                                        } else {
                                            echo "- ";
                                        }
                                        if ($ticket->isSaturday() == true) {
                                            echo $lang("saturday")[0] ." ";
                                        } else {
                                            echo "- ";
                                        }
                                        if ($ticket->isSunday() == true) {
                                            echo $lang("sunday")[0] ." ";
                                        } else {
                                            echo "- ";
                                        } ?>
                                        <br>
                                        <?php echo($lang("ticket_extras")); ?>: <?php if ($ticket->extra1 == true) {
                                            echo "<p> - " .$lang("ticket_extra_concert") ."</p>";
                                        }
                                        if ($ticket->extra2 == true) {
                                            echo "<p> - " .$lang("ticket_extra_panel") ."</p>";
                                        }
                                        if ($ticket->extra3 == true) {
                                            echo "<p> - " .$lang("ticket_extra_vip") ."</p>";
                                        }
                                        if ($ticket->extra1 == false && $ticket->extra2 == false && $ticket->extra3 == false) {
                                            echo $lang("no_extras");
                                        }
                                        ?>
                                    </div>
                                    <div class="col-xs-6" style="text-align: right;">
                                        <div class="row">
                                            <a class="btn btn-warning ticketBtn" href="SelectTicket.php?id=<?php echo $ticket->ticketID; ?>"><?php echo($lang("edit")); ?></a>
                                        </div>
                                        <div class="row">
                                            <a class="btn btn-danger ticketBtn" href="RemoveAYS.php?id=<?php echo $ticket->ticketID; ?>"><?php echo($lang("remove")); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div><br>
                        <a class="btn btn-success" href="AddNew.php"><?php echo($lang("add_ticket")); ?></a>
                        <div class="row" style="margin: 20px 0 20px 0">
                            <a class="btn btn-warning" href="SelectQty.php"><?php echo($lang("back")); ?></a>
                            <input class="btn btn-primary" type="submit" value="<?php echo($lang('next_step')) ?>" id="proceed">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Footer.html"; ?>
    </body>
    </html>