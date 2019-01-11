<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/connection.php" ?>
<script src="/gamecon/Scripts/MainScript.js"></script>
<header>
    <?php
    if(isset($_COOKIE["current_language"])){
        if($_COOKIE["current_language"] == "en"){
            ?>
            <div class="lang"><button id="changeLang" class="btn btn-default btn-sm" onclick="setLanguage('current_language', 'fr')"><div class="flag flag-fr"></div></button></div>
            <?php
        } else if($_COOKIE["current_language"] == "fr"){
            ?>
            <div class="lang"><button id="changeLang" class="btn btn-default btn-sm" onclick="setLanguage('current_language', 'en')"><div class="flag flag-us"></div></button></div>
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
                <li><a href="/gamecon/Index.php"><span class="glyphicon glyphicon-home"></span> <?php echo($lang("home")); ?></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo($lang("info")); ?>
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/gamecon/Information.php#hours" ><?php echo($lang("hours")); ?></a></li>
                            <li><a href="/gamecon/Information.php#location"><?php echo($lang("location")); ?></a></li>
                            <li><a onclick='window.location.reload(true);' href="/gamecon/Information.php#rules"><?php echo($lang("rules")); ?></a></li>
                            <li><a onclick='window.location.reload(true);' href="/gamecon/Information.php#registration"><?php echo($lang("registration_policies")); ?></a></li>
                            <li><a onclick='window.location.reload(true);' href="/gamecon/Information.php#weapon"><?php echo($lang("weapon")); ?></a></li>
                            <li><a onclick='window.location.reload(true);' href="/gamecon/Information.php#autograph"><?php echo($lang("autograph")); ?></a></li>
                        </ul>
                    </li>
                    <li><a href="/gamecon/Admission.php"><span class="glyphicon glyphicon-bookmark"></span> <?php echo($lang("header_admission")); ?></a></li>
                    <li><a href="/gamecon/Guests.php"><span class="glyphicon glyphicon-star"></span> <?php echo($lang("guests")); ?></a></li>
                    <li><a href="/gamecon/Events.php"><span class="glyphicon glyphicon-bullhorn"></span> <?php echo($lang("events")); ?></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                            <span class="glyphicon glyphicon-flag"></span> <?php echo($lang("exhibitions")); ?>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/gamecon/Exhibitions.php#retro"><?php echo($lang("retro")); ?></a></li>
                                <li><a href="/gamecon/Exhibitions.php#arcade"><?php echo($lang("arcade")); ?></a></li>
                                <li><a href="/gamecon/Exhibitions.php#lan"><?php echo($lang("lan")); ?></a></li>
                                <li><a href="/gamecon/Exhibitions.php#aaa"><?php echo($lang("aaa")); ?></a></li>
                                <li><a href="/gamecon/Exhibitions.php#indie"><?php echo($lang("indie")); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--Right Side-->
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!(func::checkLogin())) {
                            echo "<li><a href='/gamecon/Login_Register.php'><span class='glyphicon glyphicon-user'></span> " .$lang("signup_login") ."</a></li>";
                        } else {
                            echo "<li class=\"dropdown\">
                            <a class=\"dropdown - toggle\" data-toggle=\"dropdown\" href=\"#\" id=\"navButtons\">
                            " .$lang('my_account') ."
                            <span class=\"caret\" ></span ></a>
                            <ul class=\"dropdown-menu\" >
                            <li ><a href = \"/gamecon/Account/ModifyInfo.php\" > " .$lang('view_info') ."</a ></li >
                            <li ><a href = \"/gamecon/Processes/Logout.php\" > " .$lang('logout') ."</a></li >
                            </ul >
                            </li >";
                        }
                        ?>
                        <li><a style="margin-right: 30px" href="/gamecon/Purchase/SetTickets.php"><?php echo($lang("header_buy_ticket")); ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="/gamecon/Scripts/ScriptStickyNavBar.js"></script>
    </header>
