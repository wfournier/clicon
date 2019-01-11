<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php
if(!func::checkLogin()){
    header("Location: /gamecon/Login_Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_PayPal</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Head.php";?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Header.php";?>

<main>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Footer.html";?>
</body>
</html>