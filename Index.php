<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "Shared/Head.html" ?>
    <title>$Title$</title>
</head>
<body>
<?php include "Shared/Header.html" ?>
<nav class="navbar navbar-inverse navbar-static-top mainNav">
    <div class="container-fluid mainNavBarText">
        <div class="navbar-header">
            <a class="navbar-brand" id="menuTitle">Main Menu</a>
        </div>
        <div class="collapse navbar-collapse in">
            <ul class="nav navbar-nav" style="text-align: center">
                <li><a class="mainNavBtn" href="#">Home</a></li>
                <li><a class="mainNavBtn" href="#">Admission</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle mainNavBtn" data-toggle="dropdown" href="#" id="navButtons">
                        General Info
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle mainNavBtn" data-toggle="dropdown" href="#" id="navButtons">
                        Guests
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle mainNavBtn" data-toggle="dropdown" href="#" id="navButtons">
                        Events
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle mainNavBtn" data-toggle="dropdown" href="#" id="navButtons">
                        Programming
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle mainNavBtn" data-toggle="dropdown" href="#" id="navButtons">
                        Exhibition
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle mainNavBtn" data-toggle="dropdown" href="#" id="navButtons">
                        Services
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main style="background-color: lightgray">
    <style>
        .row {
            margin-right: 0;
            margin-left: 0;
        }
    </style>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" id="indexContent">
            <div class="row">
                <div class="col-xs-12" id="carouselCol">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="Resources/carousel1.png" alt="Los Angeles">
                            </div>

                            <div class="item">
                                <img src="Resources/carousel2.jpg" alt="Chicago">
                            </div>

                            <div class="item">
                                <img src="Resources/carousel3.png" alt="New York">
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
            <div class="row">
                <div class="col-md-6" style="padding: 30px">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href='https://play.google.com/store/apps/details?id=com.guidebook.android&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img
                                        width="45%" height="auto" alt='Get it on Google Play'
                                        src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Get_it_on_Google_play.svg/2000px-Get_it_on_Google_play.svg.png'/></a>
                            <a href="https://itunes.apple.com/us/app/guidebook/id428713847?mt=8"><img width="45%"
                                                                                                      height="auto"
                                                                                                      src="https://linkmaker.itunes.apple.com/assets/shared/badges/en-us/appstore-lrg.svg"></a>

                        </div>
                    </div>
                    <div class="row" style="padding: 30px 10px 20px 10px">
                        <div class="col-xs-12">
                            <div id="News" class="panel panel-primary">
                                <div class="panel-body" style="max-height: 450px;overflow-y: scroll;">
                                    <h3>News</h3>
                                    <ul>
                                        <li>
                                            <p>Here the Gamecon can put different news with the date to inform people
                                                about
                                                ongoing
                                                things on the event</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                        <li>
                                            <p>They will be able to do this in many bullet point</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="padding: 30px">
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="https://www.facebook.com/HexagonalStudio/" data-tabs="timeline"
                         data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                         data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/HexagonalStudio/"
                                    class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/HexagonalStudio/">HexaGonal Studio</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</main>

<?php include "Shared/Footer.html" ?>
</body>
</html>