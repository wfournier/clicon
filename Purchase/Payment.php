<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php
if(!func::checkLogin()){
    header("Location: /clicon/Login_Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_PayPal</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php";?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php";?>

<main>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html";?>
</body>
</html>