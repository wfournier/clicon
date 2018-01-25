<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: /gamecon/Login_register.php");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_ConfirmSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html";?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php";?>

<main>
    <?php
    $tickets = $_SESSION["tickets"];
    foreach ($tickets as $ticket) {
        $c++;
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
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html";?>
</body>
</html>