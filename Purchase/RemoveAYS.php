<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Classes/Ticket.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: /Login_Register.php");
}
session_start();
$arr = $_SESSION["tickets"];
if(!($_GET["id"] > 0) || empty($arr)){
    print("<script>console.log('Error Remove Ticket')</script>");
    header("Location: /Purchase/SetTickets.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AreYouSure?</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php";?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php";?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p>Do you really want to remove this ticket</p>
            <?php
            $c = $_GET["id"];
            $ticket = $arr["$c"];
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
            </div>
            <a class="btn btn-success" href="RemoveTicket.php?id=<?php echo $ticket->tempID ?>">Yes</a>
            <a class="btn btn-danger" href="SetTickets.php">No</a>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html";?>
</body>
</html>