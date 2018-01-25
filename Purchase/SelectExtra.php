<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_register.php");
}
session_start();

if ($_GET["id"] == null) {
    $_SESSION["Error_Edit"] = "An error occurred while processing extra. Please try again.";
    header("Location: /gamecon/Purchase/SetTickets.php");
} else
    $id = $_GET["id"];
    if (!isset($_SESSION["concert$id"]))
        $_SESSION["concert$id"] = null;
if (!isset($_SESSION["panel$id"]))
    $_SESSION["panel$id"] = null;
if (!isset($_SESSION["guest$id"]))
    $_SESSION["guest$id"] = null;
$_SESSION["Error_Ticket$id"] = null;
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
                    <div class="breadcrumbs"><a href="/gamecon/Purchase/SetTickets.php">Set Tickets </a>></div>
                    <div class="lowerbreadcrumbs"><a href="/gamecon/Purchase/SelectTicket.php?id=<?php echo $id?>">Select Ticket </a>>
                        <a href="/gamecon/Purchase/SelectExtra.php?id=<?php echo $id?>">Select Extra </a>></div>
                    <h1 style="margin-top: 0">Select extras for your ticket:</h1>
                    <p><i>Selecting all 3 days get you a 15$ off.</i></p>

                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="concert">Concert: </label><input id="concert" type="checkbox" name="concert"
                        <?php
                        $id = $_GET["id"];
                        if ($_SESSION["concert$id"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="panel">Special Panel: </label><input id="panel" type="checkbox" name="panel"
                        <?php if ($_SESSION["panel$id"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="guest">VIP Guest Autograph: </label><input id="guest" type="checkbox" name="guest"
                        <?php if ($_SESSION["guest$id"] == "something") {
                            echo "checked";
                        } ?>
                    >
                </div>
                <div class="row">
                    <a class="btn btn-warning" href="SelectTicket.php?id=<?php echo $_GET["id"] ?>">Back</a>
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