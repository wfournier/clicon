<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /Login_Register.php");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_ConfirmSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>

<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="Validate_ProceedToPayment.php">
                <div class="row" style="min-height: 400px">
                    <div class="breadcrumbs"><a href="/Purchase/SetTickets.php">Set Tickets </a>>
                        <a href="/Purchase/Confirm.php">Confirm </a>></div>
                    <?php
                    if (isset($_SESSION["Error_Edit"])) {
                        echo "<p><i style='color: red'>" . $_SESSION["Error_Edit"] . "</i></p>";
                        $_SESSION["Error_Edit"] = null;
                    }
                    ?>
                    <h1>Confirm the information is valid</h1>
                    <?php
                    $c = 0;
                    $tickets = array();
                    $tickets = $_SESSION["tickets"];
                    foreach ($tickets as $ticket) {
                        $c++;
                        ?>
                        <div class="row">
                            <hr>
                            <div class="col-xs-6">
                                <h4>Ticket #<?php echo $c ?></h4>
                                <b>Badge Name:</b> <?php echo $ticket->badgeName ?><br>
                                <b>Days:</b> <?php
                                if ($ticket->isFriday() == true)
                                    echo "Friday ";

                                if ($ticket->isSaturday() == true)
                                    echo "Saturday ";

                                if ($ticket->isSunday() == true)
                                    echo "Sunday ";
                                ?>
                                <br>
                                <b>Extras:</b><br> <?php if ($ticket->extra1 == true) {
                                    echo "Concert<br>";
                                }
                                if ($ticket->extra2 == true) {
                                    echo "Extra Panel<br>";
                                }
                                if ($ticket->extra3 == true) {
                                    echo "Special Guest Autograph<br>";
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
                    <a class="btn btn-warning" href="SetTickets.php">Back</a>
                    <input class="btn btn-warning" type="submit" value="Proceed to Payment" id="proceed">
                </div>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>