<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/Style/InformationStyle.css">
    <title>GameCon_Information</title>
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php"; ?>

<main>
    <div style="text-align: center">
        <h1><?php echo($lang("general_info")); ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4" id="hours">
            <h3><?php echo($lang("hours")); ?></h3>
            <br>
            <?php
                $start_time = "0";
                $end_time = "0";
                if($_COOKIE["current_language"] == "en"){
                    $start_time = "8";
                    $end_time = "10";
                } else if($_COOKIE["current_language"] == "fr"){
                    $start_time = "8";
                    $end_time = "22";
                }
            ?>
            <table align="center">
                <tr>
                    <th></th>
                    <th> <?php echo($lang("friday")); ?></th>
                    <th> <?php echo($lang("saturday")); ?></th>
                    <th> <?php echo($lang("sunday")); ?></th>
                </tr>
                <tr>
                    <th><?php echo($lang("registration")); ?></th>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                </tr>
                <tr>
                    <th><?php echo($lang("con_hours")); ?></th>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                </tr>
                <tr>
                    <th><?php echo($lang("retro_corner")); ?></th>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                </tr>
                <tr>
                    <th><?php echo($lang("arcade_games")); ?></th>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                </tr>
                <tr>
                    <th><?php echo($lang("lan")); ?></th>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                </tr>
                <tr>
                    <th><?php echo($lang("studios_hall")); ?></th>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                    <td><?php echo($lang("timeframe", $start_time, $end_time)); ?></td>
                </tr>
            </table>
            <br>
            <p style="color: red">*<?php echo("<b>" .$lang("thursday") . "</b>: " .$lang("registration_open")); ?></p>
        </div>
        <div class="col-lg-4" id="location">
            <h3><?php echo($lang("location")); ?></h3>
            <br>
            <p><?php echo($lang("clicon_hosted")); ?><br>
                <a href="http://placebonaventure.com" target="_blank">Place Bonaventure</a>
            </p>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Place_Bonaventure_04.JPG/1024px-Place_Bonaventure_04.JPG"
                 alt="PlaceBonaventure_Wikipedia" width="300px" height="auto" style="border: solid black 1px">
            <p>800 de la Gauchetière,<br><?php echo($lang("mtl")); ?>, QC H5A 1K6<br>(415) 397-2233<br><?php echo($lang("open_24h")); ?></p>
        </div>
    </div>
    <!--RULES-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse1" id="rules"><?php echo($lang("rules")); ?> <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse1" class="col-md-6 collapse">
            <p>
                <?php echo($lang("html_text", "rules_text")); ?>
            </p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--REGISTRATION-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse2" id="registration"><?php echo($lang("registration_policies")); ?>
            <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse2" class="col-md-6 collapse">
            <p>
                <?php echo($lang("html_text", "registration_policies_text")); ?>
            </p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--WEAPON-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse3" id="weapon"><?php echo($lang("weapon")); ?> <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse3" class="col-md-6 collapse">
            <p>
                <?php echo($lang("html_text", "weapon_policies_text")); ?>
            </p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--AUTOGRAPH-->
    <div class="row rules">
        <h1 style="text-align: center" data-toggle="collapse" href="#collapse4" id="autograph"><?php echo($lang("autograph")); ?> <span
                    class="plus glyphicon glyphicon-plus"></span></h1>
        <div class="col-md-3"></div>
        <div id="collapse4" class="col-md-6 collapse">
            <p>
                <?php echo($lang("html_text", "autograph_policies_text")); ?>
            </p>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script>
        hash = window.location.hash.substr(1);
        if (hash == "rules") {
            $("#collapse2").collapse("hide");
            $("#collapse3").collapse("hide");
            $("#collapse4").collapse("hide");
            $("#collapse1").collapse("show");
        }
        if (hash == "registration") {
            $("#collapse1").collapse("hide");
            $("#collapse3").collapse("hide");
            $("#collapse4").collapse("hide");
            $('#collapse2').collapse("show");
        }
        if (hash == "weapon") {
            $("#collapse1").collapse("hide");
            $("#collapse2").collapse("hide");
            $("#collapse4").collapse("hide");
            $('#collapse3').collapse("show");
        }
        if (hash == "autograph") {
            $("#collapse1").collapse("hide");
            $("#collapse2").collapse("hide");
            $("#collapse3").collapse("hide");
            $('#collapse4').collapse("show");
        }
    </script>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>