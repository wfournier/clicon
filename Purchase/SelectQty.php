<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php

if (!func::checkLogin()) {
    header("Location: /Login_Register.php");
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
    <style>
    label {
        width: 100px;
        margin-left: 30px;
    }

}
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>
    <main>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="SetTickets.php">
                    <div class="row" style="min-height: 400px">
                        <h1><?php echo($lang("select_qty")); ?></h1>
                        <p><i><?php echo($lang("under13")); ?></p>
                            <?php
                            if (isset($_SESSION["qty"])) {
                                $y = $_SESSION["qty"];
                            } else {
                                $y = 1;
                            }
                            ?>
                            <input style="color: black" type="number" value="<?php echo $y ?>" name="qty" min="1" max="50" required> <?php echo($lang("ticket")); ?>(s)
                        </div>
                        <div class="row">
                            <a class="btn btn-warning" href="../Account/ModifyInfo.php"><?php echo($lang("cancel")); ?></a>
                            <input class="btn btn-primary" type="submit" value="Next" id="next">
                        </div>
                    </form>
                    <?php
                    if (isset($_SESSION["Error_Quantity"])) {
                        echo "<p><i style='color: red'>" . $_SESSION["Error_Quantity"] . "</i></p>";
                        $_SESSION["Error_Quantity"] = null;
                    }
                    ?>
                </div>
            </div>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
    </body>
    </html>