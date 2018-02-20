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
                <li><a href="/Index.php"><span class="glyphicon glyphicon-home"></span> <?php echo($lang("home")); ?></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo($lang("info")); ?>
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Information.php#hours"><?php echo($lang("hours")); ?></a></li>
                            <li><a href="/Information.php#location"><?php echo($lang("location")); ?></a></li>
                            <li><a href="/Information.php#rules"><?php echo($lang("rules")); ?></a></li>
                            <li><a href="/Information.php#registration"><?php echo($lang("registration_policies")); ?></a></li>
                            <li><a href="/Information.php#weapon"><?php echo($lang("weapon")); ?></a></li>
                            <li><a href="/Information.php#autograph"><?php echo($lang("autograph")); ?></a></li>
                        </ul>
                    </li>
                    <li><a href="/Admission.php"><span class="glyphicon glyphicon-bookmark"></span> <?php echo($lang("header_admission")); ?></a></li>
                    <li><a href="/Guests.php"><span class="glyphicon glyphicon-star"></span> <?php echo($lang("guests")); ?></a></li>
                    <li><a href="/Events.php"><span class="glyphicon glyphicon-bullhorn"></span> <?php echo($lang("events")); ?></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                            <span class="glyphicon glyphicon-flag"></span> <?php echo($lang("exhibitions")); ?>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/Exhibitions.php#retro"><?php echo($lang("retro")); ?></a></li>
                                <li><a href="/Exhibitions.php#arcade"><?php echo($lang("arcade")); ?></a></li>
                                <li><a href="/Exhibitions.php#lan"><?php echo($lang("lan")); ?></a></li>
                                <li><a href="/Exhibitions.php#aaa"><?php echo($lang("aaa")); ?></a></li>
                                <li><a href="/Exhibitions.php#indie"><?php echo($lang("indie")); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--Right Side-->
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!(func::checkLogin())) {
                            echo "<li><a href='/Login_Register.php'><span class='glyphicon glyphicon-user'></span> " .$lang("signup_login") ."</a></li>";
                        } else {
                            echo "<li class=\"dropdown\">
                            <a class=\"dropdown - toggle\" data-toggle=\"dropdown\" href=\"#\" id=\"navButtons\">
                            " .$lang('my_account') ."
                            <span class=\"caret\" ></span ></a>
                            <ul class=\"dropdown-menu\" >
                            <li ><a href = \"/Account/ModifyInfo.php\" > " .$lang('view_info') ."</a ></li >
                            <li ><a href = \"/Processes/Logout.php\" > " .$lang('logout') ."</a></li >
                            </ul >
                            </li >";
                        }
                        ?>
                        <li><a style="margin-right: 30px" href="/Purchase/SetTickets.php"><?php echo($lang("header_buy_ticket")); ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="/Scripts/ScriptStickyNavBar.js"></script>
    </header>
