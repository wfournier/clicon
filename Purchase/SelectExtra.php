<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_register.php");
}
session_start();
if(!isset($_SESSION["concert"]))
    $_SESSION["concert"] = null;
if(!isset($_SESSION["panel"]))
    $_SESSION["panel"] = null;
if(!isset($_SESSION["guest"]))
    $_SESSION["guest"] = null;
if ($_GET["id"] == null) {
    $_SESSION["Error_Edit"] = "An error occurred while processing extra. Please try again.";
    header("Location: /gamecon/Purchase/SetTickets.php");
} else
    $_SESSION["Error_Ticket"] = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_ExtraSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html"; ?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="ProcessingSelectExtra.php">
                <div class="row" style="height: 400px">
                    <h1>Select extras for your ticket:</h1>
                    <p><i>Selecting all 3 days get you a 15$ off.</i></p>

                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="concert">Concert: </label><input id="concert" type="checkbox" name="concert"
                        <?php if ($_SESSION["concert"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="panel">Special Panel: </label><input id="panel" type="checkbox" name="panel"
                        <?php if ($_SESSION["panel"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="guest">VIP Guest Autograph: </label><input id="guest" type="checkbox" name="guest"
                        <?php if ($_SESSION["guest"] == "something") {
                            echo "checked";
                        } ?>
                    >
                </div>
                <div class="row">
                    <a class="btn btn-warning" href="SelectTicket.php">Back</a>
                    <input class="btn btn-warning" type="submit" value="Next" id="next">
                </div>
                <?php
                if (isset($_SESSION["Error_Extra"])) {
                    echo "<p><i style='color: red'>" . $_SESSION["Error_Extra"] . "</i></p>";
                    $_SESSION["Error_Extra"] = null;
                }
                ?>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>