<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Guests</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/clicon/Style/GuestEventStyle.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php"; ?>
<main>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="boxIndex">
                <div class="row">
                    <div class="col-md-4">
                        <div id="guest1"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b>Shigeru Miyamoto - Nintendo</b></h3>
                        <p><?php echo($lang("shigeru_miyamoto")); ?></p>
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
                        <div id="guest2"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b>Todd Howard - Bethesda</b></h3>
                        <p><?php echo($lang("todd_howard")); ?></p>
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
                        <div id="guest3"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b>Hideo Kojima - Kojima Production</b></h3>
                        <p><?php echo($lang("hideo_kojima")); ?></p>
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
                        <div id="guest4"></div>
                    </div>
                    <div class="col-md-8">
                        <h3><b>Sid Meier - Civilization</b></h3>
                        <p><?php echo($lang("sid_meier")); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html"; ?>
</body>
</html>