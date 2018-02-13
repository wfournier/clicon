<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html"; ?>
    <title>GameCon_Home</title>
    <style>
        .row {
            margin-right: 0;
            margin-left: 0;
        }
    </style>
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
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php"; ?>

<main>
    <div style="text-align: center">
        <h1>General Information</h1>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <h3>Opening Hours</h3>
            <table>
                <tr>
                    <th></th><th>Friday</th><th>Saturday</th><Sunday></Sunday>
                </tr>
            </table>
        </div>
    </div>


</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>