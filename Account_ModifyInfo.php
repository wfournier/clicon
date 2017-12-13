<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account_ModifyInfo</title>
    <?php include "Shared/Head.html";?>
    <link rel="stylesheet" type="text/css" href="Style/AccountStyle.css">
    <style>
        #AM {
            background-color: aliceblue;
        }
    </style>
</head>
<body>
<?php include "Shared/Header.html";?>
<?php include "Shared/AccountNavigation.html";?>
<main>
    <form action="Processes/ModifyInfo.php" method="post">
        <label>First Name: </label><input type="text" name="">
    </form>
</main>
<?php include "Shared/Footer.html";?>
</body>
</html>