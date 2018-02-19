<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin()) {
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
            <form method="post" action="Receipt.php">
                <div class="row" style="min-height: 400px">
                    <div class="breadcrumbs"><a href="/Purchase/SetTickets.php">Set Tickets </a>>
                        <a href="/Purchase/Confirm.php">Confirm </a>>
                    </div>
                    <?php
                    if (isset($_SESSION["Error_Edit"])) {
                        echo "<p><i style='color: red'>" . $_SESSION["Error_Edit"] . "</i></p>";
                        $_SESSION["Error_Edit"] = null;
                    }
                    ?>
                    <h1>Confirm the information is valid</h1>
                    <?php
                    $tickets = array();
                    $tickets = $_SESSION["tickets"];
                    $subTotal = 0;
                    foreach ($tickets as $ticket) {
                        ?>
                        <hr>
                        <h4>Ticket #<?php echo $ticket->accountID ?></h4>
                        <div class="row">
                            <div class="col-xs-5">
                                <b>Badge Name:</b> <?php echo $ticket->badgeName ?><br>
                                <b>Days:</b> <br><?php
                                if ($ticket->isFriday() == true)
                                    echo "Friday ";

                                if ($ticket->isSaturday() == true)
                                    echo "Saturday ";

                                if ($ticket->isSunday() == true)
                                    echo "Sunday ";
                                ?>
                            </div>
                            <div class="col-xs-5">
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
                        <p>Subtotal : <?php echo "$ " . number_format($subTotal, 2); ?></p>
                    </div>
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