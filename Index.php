<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "Shared/Head.html" ?>
    <title>$Title$</title>
</head>
<body>
<?php include "Shared/Header.html" ?>
<nav class="navbar navbar-inverse mainNav">
    <div class="container-fluid" style="font-size: x-large">
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
</nav>
<main style="background-color: lightgray">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
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
        <div class="col-sm-3"></div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-3"></div>
    </div>
</main>

<?php include "Shared/Footer.html" ?>
</body>
</html>