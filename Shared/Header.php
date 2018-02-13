<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<header>
    <div class="lang"><a>FR</a></div>
    <div class="row" id="bannerSec">
        <a href="/gamecon/Index.php">
            <img id="logoMain" src="/gamecon/Resources/logoMain.png" alt="logo">
        </a>
    </div>
    <nav id="sticky" class="sticky navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse"
                        data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--Left Side-->
            <div class="collapse navbar-collapse navBarText" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="/gamecon/Index.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                            Information
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/gamecon/Information.php#location">Location</a></li>
                            <li><a href="/gamecon/Sponsors.php#other">Other</a></li>
                        </ul>
                    </li>
                    <li><a href="/gamecon/Admission.php">Admission</a></li>
                    <li><a href="/gamecon/Guests.php">Guests</a></li>
                    <li><a href="/gamecon/Events.php">Events</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                            Exhibitions
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/gamecon/Exhibitions.php#retro">Retro Section</a></li>
                            <li><a href="/gamecon/Exhibitions.php#arcade">Arcade Game</a></li>
                            <li><a href="/gamecon/Exhibitions.php#lan">LAN Party</a></li>
                            <li><a href="/gamecon/Exhibitions.php#aaa">AAA Studios</a></li>
                            <li><a href="/gamecon/Exhibitions.php#indie">Indie studios</a></li>
                        </ul>
                    </li>
                </ul>
                <!--Right Side-->
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!(func::checkLogin($con))) {
                        echo "<li><a href='/gamecon/Login_Register.php'><span class='glyphicon glyphicon-user'></span> Sign Up / Login</a></li>";
                    } else {
                        echo "<li class=\"dropdown\">
                            <a class=\"dropdown - toggle\" data-toggle=\"dropdown\" href=\"#\" id=\"navButtons\">
                                View Account
                            <span class=\"caret\" ></span ></a>
                            <ul class=\"dropdown-menu\" >
                                <li ><a href = \"/gamecon/Account/Overview.php\" > View Info </a ></li >
                                <li ><a href = \"/gamecon/Processes/Logout.php\" > Logout</a ></li >
                            </ul >
                        </li >";
                    }
                    ?>
                    <li><a style="margin-right: 30px" href="/gamecon/Purchase/SetTickets.php">GET TICKET</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="/gamecon/Scripts/ScriptStickyNavBar.js"></script>
</header>
