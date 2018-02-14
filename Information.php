<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/gamecon/Style/InformationStyle.css">
    <title>GameCon_Home</title>
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
        <div class="col-xs-6" id="hours">
            <h3>Opening Hours</h3>
            <br>
            <table>
                <tr>
                    <th></th>
                    <th> Friday</th>
                    <th> Saturday</th>
                    <th> Sunday</th>
                </tr>
                <tr>
                    <th>Registration</th>
                    <td> 8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Convention Hours</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Retro Corner</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Arcade Games</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>LAN Party</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
                <tr>
                    <th>Studios' Hall</th>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                    <td>8 am - 10 pm</td>
                </tr>
            </table>
        </div>
        <div class="col-xs-6" id="location">
            <h3>Location</h3>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.308714889164!2d-73.56315758461096!3d45.50386373881725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a5a66841509%3A0x6434041e124a4c53!2sPalais+des+Congr%C3%A8s+in+Montreal!5e0!3m2!1sen!2sca!4v1518554781691"
                    width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>


</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>