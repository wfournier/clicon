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
    <title>Payment_Invoice</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/Style/ReceiptStyle.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>
<main>
    <div class="row" style="min-height: 400px">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <p style="color: lawngreen; margin-top: 20px"><b><i>Payment Successful</i></b></p>
            <div class="boxIndex" id="invoice">
                <?php
                if (isset($_SESSION["Error_Edit"])) {
                    echo "<p><i style='color: red'>" . $_SESSION["Error_Edit"] . "</i></p>";
                    $_SESSION["Error_Edit"] = null;
                }
                ?>
                <h1>Invoice</h1>
                <hr>
                <h4>Emailed to: <?php echo func::getFromTable("email", "account"); ?></h4>
                <br>
                <?php
                $tickets = $_SESSION["tickets"];
                $subTotal = 0;
                foreach ($tickets as $ticket) {
                    ?>
                    <h4>Ticket #<?php echo $ticket->ticketID ?></h4>
                    <b>Badge Name:</b> <?php echo $ticket->badgeName ?>
                    <div class="row">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <b>Days:</b> <br><?php
                            if ($ticket->isFriday() == true)
                                echo "Friday ";

                            if ($ticket->isSaturday() == true)
                                echo "Saturday ";

                            if ($ticket->isSunday() == true)
                                echo "Sunday ";
                            ?>
                        </div>
                        <div class="col-xs-3">
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
                        <div class="col-xs-2" style="text-align: right">
                            <p>
                                <?php echo "$ " . number_format($ticket->price, 2);
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
                    <?php
                    $taxes = $subTotal * 0.15;
                    $total = $subTotal + $taxes;
                    ?>
                    <p>Taxes : <?php echo "$ " . number_format($taxes, 2); ?></p>
                    <p>Total : <?php echo "$ " . number_format($total, 2); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <?php session_destroy(); ?>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>