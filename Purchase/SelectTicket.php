<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_register.php");
}
session_start();
if(!isset($_SESSION["friday"]))
    $_SESSION["friday"] = null;
if(!isset($_SESSION["saturday"]))
    $_SESSION["saturday"] = null;
if(!isset($_SESSION["sunday"]))
    $_SESSION["sunday"] = null;
if ($_GET["id"] == null) {
    $_SESSION["Error_Edit"] = "An error occurred please try again";
    header("Location: /gamecon/Purchase/SetTickets.php");
} else {
    $_SESSION["Error_Edit"] = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_TicketSelection</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html"; ?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }

        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="ProcessingSelectTicket.php">
                <div class="row" style="height: 400px">
                    <h1>Select dates for your ticket:</h1>
                    <p><i>Selecting all 3 days get you a 15$ off.</i></p>

                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="friday">Friday: </label>
                    <input id="friday" type="checkbox" name="friday"
                        <?php if ($_SESSION["friday"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="saturday">Saturday: </label>
                    <input id="saturday" type="checkbox" name="saturday"
                        <?php if ($_SESSION["saturday"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="sunday">Sunday: </label>
                    <input id="sunday" type="checkbox" name="sunday"
                        <?php if ($_SESSION["sunday"] == "something") {
                            echo "checked";
                        } ?>
                    >
                </div>
                <div class="row">
                    <a class="btn btn-warning" href="SetTickets.php">Cancel</a>
                    <input class="btn btn-warning" type="submit" name="submit" value="Next" id="next">
                </div>
            </form>
            <?php
            if (isset($_SESSION["Error_Ticket"])) {
                echo "<p><i style='color: red'>" . $_SESSION["Error_Ticket"] . "</i></p>";
                $_SESSION["Error_Ticket"] = null;
            }
            ?>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>