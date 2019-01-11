<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /gamecon/Login_Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Account</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Head.php";?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
        #AVo {
            background-color: lawngreen;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Header.php";?>

<main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/AccountNavigation.php";?>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Footer.html";?>
</body>
</html>