<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php include "Classes/Ticket.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
session_start();
if ($_POST == null) {
    $_SESSION["Error_Quantity"] = "You must at least purchase one ticket";
    header("Location: Purchase_SelectQty.php");
} else {
    $_SESSION["Error_Quantity"] = null;
    if (isset($_POST["qty"])) {
        $_SESSION["qty"] = $_POST["qty"];
    }
}

//Creating default tickets object
if(!isset($_SESSION["tickets"])) {
    echo "hello";
    $tickets = array();
    $defaultTicket = new Ticket();
    $defaultTicket->setBadgeName("something"); //GET BADGE NAME FROM DATABASE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $tickets["default"] = $defaultTicket;

    for ($i = 0; $i < $_SESSION["qty"]-1; $i++) {
        $ticket = new Ticket();
        $w = $i+2;
        $tickets["$w"] = $ticket;
    }
    $_SESSION["tickets"] = $tickets;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <?php include "Shared/Head.html"; ?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
<?php include "Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row" style="min-height: 400px">
                <h1>Set your tickets.</h1>
                <p><i>Admission for children under 13 years old is free.<br>
                        A ticket is not required</i></p>
                <form method="post" action="Purchase_SelectTicket.php">
                    <?php
                    $c = 0;
                    $tickets = array();
                    $tickets = $_SESSION["tickets"];
                    foreach($tickets as $ticket){
                        $c++
                        ?>
                        <hr>
                        <h4>Ticket #<?php echo $c ?></h4>
                        Badge Name: <?php echo $ticket->badgeName ?><br>
                        Days: <?php if($ticket->friday == true){
                            echo "F ";
                        } else {
                            echo "- ";
                        }
                        if($ticket->saturday == true){
                            echo "S ";
                        } else {
                            echo "- ";
                        }
                        if($ticket->sunday == true){
                            echo "S ";
                        } else {
                            echo "- ";
                        }?>
                        <br>
                        Extras: <?php if($ticket->extra1 == true){
                            echo "<p>Concert</p>";
                        }
                        if($ticket->extra2 == true){
                            echo "<p>Extra Panel</p>";
                        }
                        if($ticket->extra3 == true){
                            echo "<p>Special Guest Autograph</p>";
                        }
                        if($ticket->extra1 == false && $ticket->extra2 == false && $ticket->extra3 == false){
                            echo "none";
                        }
                        ?>
                        <?php
                    }
                    ?>
            </div>
            <div class="row" style="margin: 20px 0 20px 0">
                <a class="btn btn-warning" href="Purchase_SelectQty.php">Back</a>
                <input class="btn btn-warning" type="submit" value="Next" id="next">
            </div>
            </form>
        </div>
    </div>
</main>
<?php include "Shared/Footer.html"; ?>
</body>
</html>