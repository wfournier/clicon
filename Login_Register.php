
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Functions/FilterData.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/RegisterProcess.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/LoginProcess.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
    <title>GameCon_Login</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php" ?>
    <style type="text/css">
    .row {
        margin-left: 0px;
        margin-right: 0px;
    }
</style>
<main>
    <div class="content row">
        <div class="col-sm-1"></div>
        <div id="login" class="col-sm-4">
            <h2 class="page-header"><?php echo(strtoupper($lang("login"))); ?></h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="emailLogin"><?php echo($lang("email")); ?></label>
                        <input type="text" class="form-control" id="emailLogin" name="emailLogin"
                        value="<?php echo isset($_POST['emailLogin']) ? $_POST['emailLogin'] : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="passLogin"><?php echo($lang("password")); ?></label>
                        <input type="password" class="form-control" id="passLogin" name="passLogin">
                    </div>
                </div>
                <input type="hidden" name="process" value="login">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-lg"><?php echo($lang("login")); ?></button>
                    </div>
                    <div class="col-xs-6" style="text-align: right">
                        <a href="Account/Forgot_Password.php"><?php echo($lang("forgot_pass")); ?></a>
                    </div>
                </div>
                <div class="row" style="height: 80px; padding: 10px;">
                    <p><span class="success"><?php echo($loginOutput); ?></span></p>
                    <p><span class="error"><?php echo($loginErrMsg); ?></span></p>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
        <div id="register" class="col-sm-4">
            <h2 class="page-header"><?php echo(strtoupper($lang("register"))); ?></h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="emailRegister" class="<?php echo $emailErr ? 'error' : '' ?>"><?php echo($lang("email")); ?></label>
                        <input type="text" class="form-control" id="emailRegister" name="emailRegister"
                        value="<?php echo isset($_POST['emailRegister']) ? $_POST['emailRegister'] : '' ?>"
                        data-toggle="tooltip" title="Email must be a valid format (i.e. name@domain.com)">
                    </div>
                    <div class="form-group col-xs-6">
                        <br>
                        <p><span class="error"><?php echo($emailExists); ?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="fname" class="<?php echo $fnameErr ? 'error' : '' ?>"><?php echo($lang("first_name")); ?></label>
                        <input type="text" class="form-control" id="fname" name="fname"
                        value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" data-toggle="tooltip"
                        title="First Name must only contain letters">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="lname" class="<?php echo $lnameErr ? 'error' : '' ?>"><?php echo($lang("last_name")); ?></label>
                        <input type="text" class="form-control" id="lname" name="lname"
                        value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" data-toggle="tooltip"
                        title="Last Name must only contain letters">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="passRegister" class="<?php echo $passErr ? 'error' : '' ?>"><?php echo($lang("password")); ?></label>
                        <input type="Password" class="form-control" id="passRegister" name="passRegister"
                        data-toggle="tooltip"
                        title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="confirmPass" class="<?php echo $confirmPassErr ? 'error' : '' ?>"><?php echo($lang("confirm_pass")); ?></label>
                        <input type="password" class="form-control" id="confirmPass" name="confirmPass"
                        data-toggle="tooltip" title="Both passwords must match">
                    </div>
                </div>
                <div class="row">
                    <label class="<?php echo $dobErr ? 'error' : '' ?>"><?php echo($lang("dob")); ?></label>
                </div>
                <div id="dob" class="row">
                    <div class="form-group col-xs-3">
                        <!-- <input type="text" class="form-control" id="dobDay" name="dobDay" maxlength="2" value="<?php echo isset($_POST['dobDay']) ? $_POST['dobDay'] : '' ?>" data-toggle="tooltip" title="Day must be between 1 and 31 inclusively"> -->
                        <p><?php echo($lang("day")); ?></p>
                        <select class="form-control" id="dobDay" name="dobDay">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                if ($_POST["dobDay"] == $i) {
                                    echo("<option value=\"" . $i . "\" selected>" . $i . "</option>");
                                } else {
                                    echo("<option value=\"" . $i . "\">" . $i . "</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-3">
                        <!-- <input type="text" class="form-control" id="dobMonth" name="dobMonth" maxlength="2" value="<?php echo isset($_POST['dobMonth']) ? $_POST['dobMonth'] : '' ?>" data-toggle="tooltip" title="Month must be between 1 and 12 inclusively"> -->
                        <p><?php echo($lang("month")); ?></p>
                        <select class="form-control" id="dobMonth" name="dobMonth">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                if ($_POST["dobMonth"] == $i) {
                                    echo("<option value=\"" . $i . "\" selected>" . $i . "</option>");
                                } else {
                                    echo("<option value=\"" . $i . "\">" . $i . "</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-6">
                        <!-- <input type="text" class="form-control" id="dobYear" name="dobYear" minlength="4" maxlength="4" value="<?php echo isset($_POST['dobYear']) ? $_POST['dobYear'] : '' ?>" data-toggle="tooltip" title="Year must be valid"> -->
                        <p><?php echo($lang("year")); ?></p>
                        <select class="form-control" id="dobYear" name="dobYear">
                            <?php
                            for ($i = date("Y"); $i >= 1900; $i--) {
                                if ($_POST["dobYear"] == $i) {
                                    echo("<option value=\"" . $i . "\" selected>" . $i . "</option>");
                                } else {
                                    echo("<option value=\"" . $i . "\">" . $i . "</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="phone" class="<?php echo $phoneErr ? 'error' : '' ?>"><?php echo($lang("phone")); ?></label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                        value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" data-toggle="tooltip"
                        title="Phone number must be valid (i.e. 000-000-0000)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="countryId" class="<?php echo $countryIdErr ? 'error' : '' ?>"><?php echo($lang("country")); ?></label>
                        <select class="form-control" id="countryId" name="countryId">
                            <?php
                            $get_countries_sql = "SELECT * FROM countries";
                            $get_countries_res = $con->query($get_countries_sql) or die("get_countries_res: " . $con->error);

                            if ($get_countries_res->num_rows < 1) {
                                echo("<p><i>Invalid selection</i></p>");
                            } else {
                                while ($countries = $get_countries_res->fetch_array()) {
                                    $id = $countries["COUNTRY_ID"];
                                    $name = $countries["COUNTRY_NAME"];
                                    $selected = "";
                                    if (isset($_POST["countryId"])) {
                                        if ($_POST["countryId"] == $id) {
                                            $selected = "selected";
                                        }
                                    }
                                    if ($name == "Canada" || $name == "United States") {
                                        echo("<option value=\"" . $id . "\" " . $selected . ">" . $name . "</option>");
                                    }
                                }
                            }
                            $get_countries_res->free();
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="stateCode" class="<?php echo $stateErr ? 'error' : '' ?>"><?php echo($lang("state")); ?></label>
                        <input type="text" class="form-control" id="stateCode" name="stateCode" maxlength="2"
                        value="<?php echo isset($_POST['stateCode']) ? strtoupper($_POST['stateCode']) : '' ?>"
                        data-toggle="tooltip" title="State code must be 2 characters long (i.e. FL)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="city" class="<?php echo $cityErr ? 'error' : '' ?>"><?php echo($lang("city")); ?></label>
                        <input type="text" class="form-control" id="city" name="city"
                        value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" data-toggle="tooltip"
                        title="City must only contain letters (i.e. Anytown)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="address" class="<?php echo $addressErr ? 'error' : '' ?>"><?php echo($lang("address")); ?></label>
                        <input type="text" class="form-control" id="address" name="address"
                        value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                        data-toggle="tooltip" title="Address must be valid (i.e. 123 Main Street)">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="zip" class="<?php echo $zipErr ? 'error' : '' ?>"><?php echo($lang("zip")); ?></label>
                        <input type="text" class="form-control" id="zip" name="zip"
                        value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" data-toggle="tooltip"
                        title="Zip code must be valid (i.e. A1B 2C3)">
                    </div>
                </div>
                <input type="hidden" name="process" value="register">
                <div class="row">
                    <button type="submit" class="btn btn-success btn-lg"><?php echo($lang("register")); ?></button>
                    <button type="reset" class="btn btn-warning btn-lg"><?php echo($lang("reset")); ?></button>
                </div>
                <div class="row" style="height: 80px; padding: 10px;">
                    <p><span class="success"><?php echo($registerOutput); ?></span></p>
                    <p><span class="error"><?php echo(nl2br($registerErrMsg)); ?></span></p>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html" ?>
</body>
</html>