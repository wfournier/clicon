<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account</title>
    <?php include "Shared/Head.html";?>
    <link rel="stylesheet" type="text/css" href="Style/AccountStyle.css">
    <style>
        #AVo {
            background-color: aliceblue;
        }
    </style>
</head>
<body>
<?php include "Shared/Header.php";?>

<main>
    <?php include "Shared/AccountNavigation.html";?>
</main>
<?php include "Shared/Footer.html";?>
</body>
</html>