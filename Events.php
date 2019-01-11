<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Events</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/gamecon/Style/GuestEventStyle.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="boxIndex">
                <div class="row">
                    <div class="col-md-4">
                        <div id="event1"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b><?php echo($lang("panel")); ?> 1 - Assassin's Creed Origins</b></h3>
                        <p><?php echo($lang("assassins_creed")); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="boxIndex">
                <div class="row">
                    <div class="col-md-4">
                        <div id="event2"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b><?php echo($lang("panel")); ?> 2 - Half-Life 3</b></h3>
                        <p><?php echo($lang("half_life3")); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="boxIndex">
                <div class="row">
                    <div class="col-md-4">
                        <div id="event3"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b><?php echo($lang("masquerade")); ?> - Cosplay</b></h3>
                        <p><?php echo($lang("masquerade_desc")); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Footer.html"; ?>
</body>
</html>