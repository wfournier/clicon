<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: /gamecon/Login_register.php");
}
session_start();
if($_POST == null){
    $_SESSION["Error_Ticket"] = "Please make sure you select a ticket";
    header("Location: /gamecon/Purchase/SelectTicket.php");
} else {
    $_SESSION["Error_Ticket"] = null;
    if(isset($_POST["friday"]))
        $_SESSION["friday"] = "something";
    if(isset($_POST["saturday"]))
        $_SESSION["saturday"] = "something";
    if(isset($_POST["sunday"]))
        $_SESSION["sunday"] = "something";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_ExtraSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html";?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }}
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php";?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row" style="height: 400px">

            <h1>Select extras for your ticket:</h1>
            <p><i>Selecting all 3 days get you a 15$ off.</i></p>
            <form method="post" action="Confirm.php">
                <label>Concert: </label><input type="checkbox" name="concert"><br><br>
                <label>Special Panel: </label><input type="checkbox" name="panel"><br><br>
                <label>VIP Guest Autograph: </label><input type="checkbox" name="guest">
            </div>
            <div class="row">
                <a class="btn btn-warning" href="SelectTicket.php">Back</a>
                <input class="btn btn-warning" type="submit" value="Next" id="next">
            </div>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html";?>
</body>
</html>