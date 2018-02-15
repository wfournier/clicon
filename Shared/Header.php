<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<header>
    <?php
    if(isset($_COOKIE["current_language"])){
        if($_COOKIE["current_language"] == "en"){
            ?>
            <div class="lang"><a href="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']) .'?lang=fr'); ?>">FR</a></div>
            <?php
        } else if($_COOKIE["current_language"] == "fr"){
            ?>
            <div class="lang"><a href="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']) .'?lang=en'); ?>">EN</a></div>
            <?php
        }
        ?>

        <?php
    }
    ?>
    <div class="row" id="bannerSec">

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
                <li><a href="/Index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                        <span class="glyphicon glyphicon-info-sign"></span> Information
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Information.php#hours">Opening Hours</a></li>
                            <li><a href="/Information.php#location">Location</a></li>
                            <li><a href="/Information.php#rules">Convention Rules</a></li>
                            <li><a href="/Information.php#registration">Registration Policies</a></li>
                            <li><a href="/Information.php#weapon">Weapon Policy</a></li>
                            <li><a href="/Information.php#autograph">Autograph Policy</a></li>
                        </ul>
                    </li>
                    <li><a href="/Admission.php"><span class="glyphicon glyphicon-bookmark"></span> Admission</a></li>
                    <li><a href="/Guests.php"><span class="glyphicon glyphicon-star"></span> Guests</a></li>
                    <li><a href="/Events.php"><span class="glyphicon glyphicon-bullhorn"></span> Events</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                            <span class="glyphicon glyphicon-flag"></span> Exhibitions
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/Exhibitions.php#retro">Retro Section</a></li>
                                <li><a href="/Exhibitions.php#arcade">Arcade Game</a></li>
                                <li><a href="/Exhibitions.php#lan">LAN Party</a></li>
                                <li><a href="/Exhibitions.php#aaa">AAA Studios</a></li>
                                <li><a href="/Exhibitions.php#indie">Indie studios</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--Right Side-->
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!(func::checkLogin($con))) {
                            echo "<li><a href='/Login_Register.php'><span class='glyphicon glyphicon-user'></span> Sign Up / Login</a></li>";
                        } else {
                            echo "<li class=\"dropdown\">
                            <a class=\"dropdown - toggle\" data-toggle=\"dropdown\" href=\"#\" id=\"navButtons\">
                            My Account
                            <span class=\"caret\" ></span ></a>
                            <ul class=\"dropdown-menu\" >
                            <li ><a href = \"/Account/ModifyInfo.php\" > View Info </a ></li >
                            <li ><a href = \"/Processes/Logout.php\" > Logout</a ></li >
                            </ul >
                            </li >";
                        }
                        ?>
                        <li><a style="margin-right: 30px" href="/Purchase/SetTickets.php">GET TICKET</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="/Scripts/ScriptStickyNavBar.js"></script>
    </header>
