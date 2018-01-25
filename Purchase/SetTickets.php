<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_register.php");
}
session_start();
if ($_POST == null && $_SESSION["qty"] == null) {
    $_SESSION["Error_Quantity"] = "You must at least purchase one ticket";
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
    $defaultTicket->setTempID(1);
    $tickets["1"] = $defaultTicket;

    for ($i = 0; $i < $_SESSION["qty"] - 1; $i++) {
        $ticket = new Ticket();
        $w = $i + 2;
        $ticket->setTempID($w);
        $tickets["$w"] = $ticket;
    }
    $_SESSION["tickets"] = $tickets;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html"; ?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="SelectTicket.php">
                <div class="row" style="min-height: 400px">
                    <h1>Set your tickets.</h1>
                    <p><i>Admission for children under 13 years old is free.<br>
                            A ticket is not required</i></p>
                    <?php
                    $c = 0;
                    $tickets = array();
                    $tickets = $_SESSION["tickets"];
                    foreach ($tickets as $ticket) {
                        $c++
                        ?>
                        <div class="row">
                            <hr>
                            <div class="col-xs-6">
                                <h4>Ticket #<?php echo $c ?></h4>
                                Badge Name: <?php echo $ticket->badgeName ?><br>
                                Days: <?php
                                if ($ticket->isFriday() == true) {
                                    echo "F ";
                                } else {
                                    echo "- ";
                                }
                                if ($ticket->isSaturday() == true) {
                                    echo "S ";
                                } else {
                                    echo "- ";
                                }
                                if ($ticket->isSunday() == true) {
                                    echo "S ";
                                } else {
                                    echo "- ";
                                } ?>
                                <br>
                                Extras: <?php if ($ticket->extra1 == true) {
                                    echo "<p> - Concert</p>";
                                }
                                if ($ticket->extra2 == true) {
                                    echo "<p> - Extra Panel</p>";
                                }
                                if ($ticket->extra3 == true) {
                                    echo "<p> - Special Guest Autograph</p>";
                                }
                                if ($ticket->extra1 == false && $ticket->extra2 == false && $ticket->extra3 == false) {
                                    echo "none";
                                }
                                ?>
                            </div>
                            <div class="col-xs-6" style="text-align: right;">
                                <a class="btn btn-warning ticketBtn"
                                   href="SelectTicket.php?id=<?php echo $ticket->tempID ?>">
                                    Edit
                                </a>
                                <br>
                                <a class="btn btn-danger ticketBtn"
                                   href="RemoveTicket.php?id=<?php echo $ticket->tempID ?>">
                                    Remove
                                </a>
                                <?php

                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="row" style="margin: 20px 0 20px 0">
                    <a class="btn btn-warning" href="SelectQty.php">Back</a>
                    <input class="btn btn-warning" type="submit" value="Next" id="next">
                </div>
                <?php
                if (isset($_SESSION["Error_Edit"])) {
                    echo "<p><i style='color: red'>" . $_SESSION["Error_Ticket"] . "</i></p>";
                    $_SESSION["Error_Edit"] = null;
                }
                ?>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>