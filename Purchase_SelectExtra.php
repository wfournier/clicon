<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: Login_register.php");
}
session_start();
if($_POST == null){
    $_SESSION["Error_Ticket"] = "Please make sure you select a ticket";
    header("Location: Purchase_SelectTicket.php");
} else {
    $_SESSION["Error_Ticket"] = null;
    if(isset($_POST["friday"]))
        $_SESSION["friday"] = $_POST["friday"];
    else
        $_SESSION["friday"] = null;
    if(isset($_POST["saturday"]))
        $_SESSION["saturday"] = $_POST["saturday"];
    else
        $_SESSION["saturday"] = null;
    if(isset($_POST["sunday"]))
        $_SESSION["sunday"] = $_POST["sunday"];
    else
        $_SESSION["sunday"] = null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_ExtraSelection</title>
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
            <h1>Select extras for your ticket:</h1>
            <p><i>Selecting all 3 days get you a 15$ off.</i></p>
            <form method="post" action="Purchase_Confirm.php">
                <label>Concert: </label><input type="checkbox" name="concert"><br><br>
                <label>Special Panel: </label><input type="checkbox" name="panel"><br><br>
                <label>VIP Guest Autograph: </label><input type="checkbox" name="guest"><br><br>
                <button><a href="Purchase_SelectTicket.php">Back</a></button><input type="submit" value="Next" id="next">
            </form>
        </div>
    </div>
</main>
<?php include "Shared/Footer.html";?>
</body>
</html>