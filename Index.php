<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php"; ?>
    <link rel="stylesheet" href="/Style/IndexStyle.css">
    <title>Clicon_Home</title>
    <style>
        .row {
            margin-right: 0;
            margin-left: 0;
        }
    </style>
    <script src="/Scripts/Countdown.js"></script>
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
    <!--CAROUSEL-------------------->
    <div class="row">
        <div class="col-xs-12" id="carouselCol">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="hover">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" id="carousel">
                    <div id="carousel1" class="item active">
                        <a href="About.php">
                            <div class="carousel-caption">
                                <h3>About</h3>
                            </div>
                        </a>
                    </div>

                    <div id="carousel2" class="item">
                        <a href="Admission.php">
                            <div class="carousel-caption">
                                <h3>Admission</h3>
                            </div>
                        </a>
                    </div>

                    <div id="carousel3" class="item">
                        <a href="Information.php">
                            <div class="carousel-caption">
                                <h3>Information</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!--CONTENT--------------------->
    <div class="row">
        <div class="col-md-8" id="countdown">
            <div class="boxIndex" style="height: 290px;">
                <h1 id="countdownTitle">Clicon, Montreal</h1>
                <p>Coming Soon - Pre Order Opens in
                <h2 id="countdownclock"></h2></p>
                <h2>The biggest video game convention in Quebec</h2>
            </div>
        </div>
        <div class="col-md-4" id="app">
            <div class="boxIndex" style="height: 290px;">
                <h3>Get the official Otakuthon
                    Mobile Schedule!</h3>
                <p><img
                            src="http://otakuthon.com/2017/images/2014/guidebook-devices.png"></p><br>
                <p>
                    <a href='https://play.google.com/store/apps/details?id=com.guidebook.android&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'
                       target="_blank">
                        <img width="45%" height="auto" alt='Get it on Google Play'
                             src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Get_it_on_Google_play.svg/2000px-Get_it_on_Google_play.svg.png'/>
                    </a>
                    <a href="https://itunes.apple.com/us/app/guidebook/id428713847?mt=8" target="_blank">
                        <img width="45%" height="auto"
                             src="https://linkmaker.itunes.apple.com/assets/shared/badges/en-us/appstore-lrg.svg">
                    </a>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id="arcadeBox">
            <div class="boxIndex" style="color: lawngreen; height: 350px;background-size: cover;
            background-image: url('http://www.entertainmentbuddha.com/blog/wp-content/uploads/2014/11/NewRetroArcadeHD_1.jpg')">

                <h3 style="border-radius: 10px ;background-color: rgba(104, 104, 104, 0.8) ;margin-top: 250px">Enjoy the
                    Retro and Arcade Sections!</h3>

            </div>
        </div>
        <div class="col-md-6" id="aaaBox">
            <div class="boxIndex" style="color: black; height: 350px;background-size: cover;
            background-image: url('http://www.bdcwire.com/wp-content/uploads/2014/04/2013-03-23T190257Z_01_BOS110_RTRMDNP_3_USA1.jpg')">

                <h3 style="border-radius: 10px ;background-color: rgba(104, 104, 104, 0.8) ;margin-top: 250px"><b>Meet
                        you favorite developper from Indie and AAA studios!</b></h3>

            </div>
        </div>
        <!--        <div class="col-md-5" style="padding: 30px">-->
        <!--            <div class="fb-page" data-href="https://www.facebook.com/HexagonalStudio/" data-tabs="timeline"-->
        <!--                 data-height="700px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"-->
        <!--                 data-show-facepile="true">-->
        <!--                <blockquote cite="https://www.facebook.com/HexagonalStudio/" class="fb-xfbml-parse-ignore"><a-->
        <!--                            href="https://www.facebook.com/HexagonalStudio/">HexaGonal Studio</a></blockquote>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html"; ?>
</body>
</html>