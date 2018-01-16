<?php include "Shared/connection.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if(!func::checkLogin($con)){
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_PayPal</title>
    <?php include "Shared/Head.html";?>
</head>
<body>
<?php include "Shared/Header.php";?>

<main>

</main>
<?php include "Shared/Footer.html";?>
</body>
</html>