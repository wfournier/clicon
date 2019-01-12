<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Classes/Ticket.php" ?>
<?php

if(!func::checkLogin()){
    header("Location: /clicon/Login_Register.php");
}
session_start();
$arr = $_SESSION["tickets"];
if(!($_GET["id"] > 0) || empty($arr)){
    print("<script>console.log('Error Remove Ticket')</script>");
    header("Location: /clicon/Purchase/SetTickets.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AreYouSure?</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php";?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php";?>
    <main>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p><?php echo($lang("delete_prompt")); ?></p>
                <?php
                $c = $_GET["id"];
                $ticket = $arr["$c"];
                ?>
                <div class="row">
                    <hr>
                    <div class="col-xs-6">
                        <h4><?php echo($lang("ticket")); ?> #<?php echo $c ?></h4>
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
                </div>
                <a class="btn btn-success" href="RemoveTicket.php?id=<?php echo $ticket->ticketID ?>"><?php echo($lang("yes_btn")); ?></a>
                <a class="btn btn-danger" href="SetTickets.php"><?php echo($lang("no_btn")); ?></a>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html";?>
</body>
</html>