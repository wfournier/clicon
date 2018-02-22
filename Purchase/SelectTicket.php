<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /Login_Register.php");
}
session_start();
$id = 0;
if ($_GET["id"] == null) {
    $_SESSION["Error_Edit"] = "An error occurred please try again";
    header("Location: /Purchase/SetTickets.php");
} else {
    $id = $_GET["id"];
    if (!isset($_SESSION["friday$id"]))
        $_SESSION["friday$id"] = null;
    if (!isset($_SESSION["saturday$id"]))
        $_SESSION["saturday$id"] = null;
    if (!isset($_SESSION["sunday$id"]))
        $_SESSION["sunday$id"] = null;
    $_SESSION["Error_Edit"] = null;
}
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
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <form method="post" action="ProcessingSelectTicket.php">
                <div class="row" style="height: 400px">
                    <div class="breadcrumbs"><a href="/Purchase/SetTickets.php">Set Tickets </a>></div>
                    <div class="lowerbreadcrumbs"><a href="/Purchase/SelectTicket.php?id=<?php echo $id ?>">Select
                            Ticket </a>>
                    </div>
                    <h1 style="margin-top: 0">Select dates for your ticket:</h1>
                    <table id="priceChart" align="center" style="color: white; margin: 0 0 20px 0">
                        <tr>
                            <th><?php echo($lang("friday")); ?></th>
                            <th><?php echo($lang("saturday")); ?></th>
                            <th><?php echo($lang("sunday")); ?></th>
                            <th><?php echo($lang("3day")); ?></th>
                        </tr>
                        <tr>
                            <td><?php echo($lang("currency", "25")); ?></td>
                            <td><?php echo($lang("currency", "40")); ?></td>
                            <td><?php echo($lang("currency", "35")); ?></td>
                            <td><?php echo($lang("currency", "55")); ?></td>
                        </tr>
                    </table>

                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="friday">Friday: </label>
                    <input id="friday" type="checkbox" name="friday"
                        <?php
                        $id = $_GET["id"];
                        if ($_SESSION["friday$id"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="saturday">Saturday: </label>
                    <input id="saturday" type="checkbox" name="saturday"
                        <?php if ($_SESSION["saturday$id"] == "something") {
                            echo "checked";
                        } ?>
                    ><br><br>
                    <label for="sunday">Sunday: </label>
                    <input id="sunday" type="checkbox" name="sunday"
                        <?php if ($_SESSION["sunday$id"] == "something") {
                            echo "checked";
                        } ?>
                    >
                    <br><br>
                    <p class="priceUTD">Ticket #<?php echo $id; ?>: $
                        <span id="price1">0</span>
                    </p>
                </div>
                <div class="row">
                    <a class="btn btn-warning" href="SetTickets.php">Cancel</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Next" id="next">
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
    <script src="/Scripts/PriceScriptTicket.js"></script>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>