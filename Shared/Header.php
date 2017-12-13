<header>
    <div class="row" id="bannerSec">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse"
                            data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a style="padding-left: 30px" class="navbar-brand" data-toggle="collapse" href="Index.php">GameCon</a>
                </div>
                <!--Left Side-->
                <div class="collapse navbar-collapse navBarText" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="Index.php">Home</a></li>
                        <li><a href="About.php">About</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navButtons">
                                Partners/Sponsors
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="Partners.php">Partners</a></li>
                                <li><a href="Sponsors.php">Sponsors</a></li>
                            </ul>
                        </li>
                        <li><a href="Exhibitors.php">Exhibitors</a></li>
                    </ul>
                    <!--Right Side-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">FR</a></li>
                        <?php
                        if(!func::checkLogin($con)){
                            echo "<li><a href='Login_Register.php'><span class='glyphicon glyphicon-user'></span> Sign Up / Login</a></li>";
                        } else {
                            echo "<li><a href='Account_View.php'><span class='glyphicon glyphicon-user'></span> View Account </a></li>";
                        }
                        ?>

                        <li><a style="margin-right: 30px" href="Admission.php">GET TICKET</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>