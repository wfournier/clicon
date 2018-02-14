<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Classes/Ticket.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: /gamecon/Login_Register.php");
}
session_start();
if ($_GET["id"] == null) {
    $_SESSION["Error_Edit"] = "An error occurred while processing extra. Please try again.(3)";
    header("Location: /gamecon/Purchase/SetTickets.php");
} else
    $id = $_GET["id"];
    if (!isset($_SESSION["badge$id"]))
        $_SESSION["badge$id"] = "";
    $_SESSION["Error_Edit"] = null;
$tickets = $_SESSION["tickets"];
$id = $_GET["id"];
if ($tickets["$id"]->getBadgeName() != null && $tickets["$id"]->getBadgeName() != "") {
    $_SESSION["badge$id"] = $tickets["$id"]->getBadgeName();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment_SetBadgeName</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.php"; ?>
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
            <form method="post" action="ProcessingBadgeName.php">
                <div class="row" style="height: 400px">
                    <div class="breadcrumbs"><a href="/gamecon/Purchase/SetTickets.php">Set Tickets </a>></div>
                    <div class="lowerbreadcrumbs"><a href="/gamecon/Purchase/SelectTicket.php?id=<?php echo $id?>">Select Ticket </a>>
                        <a href="/gamecon/Purchase/SelectExtra.php?id=<?php echo $id?>">Select Extra </a>>
                        <a href="/gamecon/Purchase/SetBadgeName.php?id=<?php echo $id?>">Set Badge Name </a></div>
                    <h1 style="margin-top: 0">Select your badge name:</h1>
                    <p><i style="color: red">Please avoid any inappropriate name as it will be checked and modified if
                            needed at pickup.</i></p>

                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="badge">Badge Name: </label><input id="badge" type="text" name="badge"
                        <?php
                        $id = $_GET["id"];
                        if ($_SESSION["badge$id"] != null && $_SESSION["badge$id"] != "") {
                            echo "value = '" . $_SESSION["badge$id"] . "'";
                        } ?>
                    > This option is optional*
                </div>
                <div class="row">
                    <a class="btn btn-warning" href="SelectExtra.php?id=<?php echo $_GET["id"] ?>">Back</a>
                    <input class="btn btn-warning" type="submit" value="Finish" id="next">
                </div>
                <?php
                if (isset($_SESSION["Error_BadgeName"])) {
                    echo "<p><i style='color: red'>" . $_SESSION["Error_BadgeName"] . "</i></p>";
                    $_SESSION["Error_BadgeName"] = null;
                }
                ?>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>