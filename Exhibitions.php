<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Exhibitions</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/Style/ExhibitionStyle.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>
<main>
    <!--    RETRO / AAA-->
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-5" style="padding: 0">
            <div class="boxIndex" id="retro">
                <h3>
                    <b>Play the games of your childhood at the <br>Retro Gaming Station</b>
                </h3>
            </div>
        </div>
        <div class="col-lg-5" style="padding: 0">
            <div class="boxIndex" id="aaa">
                <h3>
                    <b>Come and see the latest games from<br> Montreal's AAA studios</b>
                </h3>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <!--    LAN PARTY-->
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10" style="padding: 0">
            <div class="boxIndex" id="lan" style="background-position: center center">
                <h3>
                    <b>Compete against your friends and other gamers at the LAN party</b>
                </h3>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <!--    ARCADE / INDIE-->
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-5" style="padding: 0">
            <div class="boxIndex" id="arcade">
                <h3>
                    <b>Don't spend all your money,<br> as our arcade section is free!</b>
                </h3>
            </div>
        </div>
        <div class="col-lg-5" style="padding: 0">
            <div class="boxIndex" id="indie">
                <h3>
                    <b>Meet your favorite indie studios</b>
                </h3>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>