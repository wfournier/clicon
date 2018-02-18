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
                <?php
                $tickets = array();
                $tickets = $_SESSION["tickets"];
                foreach ($tickets as $ticket) {
                    ?>
                    <h4>Ticket #<?php echo $ticket->tempID ?></h4>
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
                            <p>$ <?php $ticket->price ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <hr>

            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>