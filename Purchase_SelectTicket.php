<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: Login_register.php");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <?php include "Shared/Head.html";?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }}
    </style>
</head>
<body>
<?php include "Shared/Header.php";?>
<main>
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <h1>Select dates for your ticket:</h1>
            <p><i>Selecting all 3 days get you a 15$ off.</i></p>
            <form method="post" action="Purchase_SelectExtra.php">
                <label>Friday: </label><input type="checkbox" name="friday"
                    <?php if(isset($_SESSION["friday"])) echo "checked" ?>
                ><br><br>
                <label>Saturday: </label><input type="checkbox" name="friday"
                    <?php if(isset($_SESSION["saturday"])) echo "checked" ?>
                ><br><br>
                <label>Sunday: </label><input type="checkbox" name="friday"
                    <?php if(isset($_SESSION["sunday"])) echo "checked" ?>
                ><br><br>
                <button><a href="Account_View.php">Cancel</a></button>
                <input type="submit" value="Next" id="next">
            </form>
            <?php
            $_SESSION["friday"] = null;
            $_SESSION["saturday"] = null;
            $_SESSION["sunday"] = null;
            if(isset($_SESSION["Error_Ticket"]))
                echo"<p><i style='color: red'>" . $_SESSION["Error_Ticket"] . "</i></p>"
            ?>
        </div>
    </div>
</main>
<?php include "Shared/Footer.html";?>
</body>
</html>