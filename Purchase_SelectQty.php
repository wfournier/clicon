<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
session_start();
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
                <h1>Select quantity of tickets.</h1>
                <p><i>Children under 13 years old don't need a ticket.<br>
                        Their admission is free.</i></p>
                <form method="post" action="Purchase_SetTickets.php">
                    <?php
                    if (isset($_SESSION["qty"])) {
                        $y = $_SESSION["qty"];
                    } else {
                        $y = 1;
                    }
                    ?>
                    <input type="number" value="<?php echo $y ?>" name="qty" min="1" max="50" required> Ticket(s)
            </div>
            <div class="row">
                <a class="btn btn-warning" href="Account_View.php">Cancel</a>
                <input class="btn btn-warning" type="submit" value="Next" id="next">
            </div>
            </form>
            <?php
            if (isset($_SESSION["Error_Quantity"])) {
                echo "<p><i style='color: red'>" . $_SESSION["Error_Quantity"] . "</i></p>";
                $_SESSION["Error_Quantity"] = null;
            }
            ?>
        </div>
    </div>
</main>
<?php include "Shared/Footer.html"; ?>
</body>
</html>