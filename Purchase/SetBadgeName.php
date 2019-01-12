<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Classes/Ticket.php" ?>
<?php

if (!func::checkLogin()) {
    header("Location: /clicon/Login_Register.php");
}
session_start();
if ($_GET["id"] == null) {
    $_SESSION["Error_Edit"] = "An error occurred while processing extra. Please try again.(3)";
    header("Location: /clicon/Purchase/SetTickets.php");
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
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php"; ?>
    <style>
        label {
            width: 100px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="ProcessingBadgeName.php">
                <div class="row" style="min-height: 500px">
                    <div class="breadcrumbs"><a href="/clicon/Purchase/SetTickets.php"><?php echo($lang("bread_set_ticket")); ?> </a>></div>
                    <div class="lowerbreadcrumbs"><a href="/clicon/Purchase/SelectTicket.php?id=<?php echo $id?>"><?php echo($lang("bread_select_ticket")); ?> </a>>
                        <a href="/clicon/Purchase/SelectExtra.php?id=<?php echo $id?>"><?php echo($lang("bread_select_extra")); ?> </a>>
                        <a href="/clicon/Purchase/SetBadgeName.php?id=<?php echo $id?>"><?php echo($lang("bread_set_badge_name")); ?> </a></div>
                    <h1 style="margin-top: 0"><?php echo($lang("set_badge_name")); ?>:</h1>
                    <p><i style="color: red"><?php echo($lang("avoid_alert")); ?></i></p>

                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="badge"><?php echo($lang("ticket_badge_name")); ?>: </label><input style="color: black" id="badge" type="text" name="badge"
                        <?php
                        $id = $_GET["id"];
                        if ($_SESSION["badge$id"] != null && $_SESSION["badge$id"] != "") {
                            echo "value = '" . $_SESSION["badge$id"] . "'";
                        } ?>
                    > *<?php echo($lang("is_optional")); ?>
                </div>
                <div class="row" style="margin-bottom: 30px">
                    <a class="btn btn-warning" href="SelectExtra.php?id=<?php echo $_GET["id"] ?>"><?php echo($lang("back")); ?></a>
                    <input class="btn btn-primary" type="submit" value="<?php echo($lang('finish')); ?>" id="next">
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
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html"; ?>
</body>
</html>