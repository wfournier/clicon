<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html";?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
        #AVo {
            background-color: aliceblue;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php";?>

<main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/AccountNavigation.html";?>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html";?>
</body>
</html>