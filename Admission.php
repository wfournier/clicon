<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Functions/FilterData.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/RegisterProcess.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/LoginProcess.php" ?>
    <?php
    if (func::checkLogin()) {
        header("Location: /clicon/Purchase/SelectQty.php");
    }
    ?>
    <title>Clicon_Admission</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php" ?>
    <style type="text/css">
    .row {
        margin-left: 0px;
        margin-right: 0px;
    }
</style>
<main>
    <div class="row" style="text-align: center">
        <h1><?php echo($lang("price_chart")); ?></h1>
        <table id="priceChart" align="center" style="color: white;">
            <tr>
                <th><?php echo($lang("friday")); ?></th>
                <th><?php echo($lang("saturday")); ?></th>
                <th><?php echo($lang("sunday")); ?></th>
                <th><?php echo($lang("3day")); ?></th>
            </tr>
            <tr>
                <td><?php echo($lang("currency", "25")); ?></td>
                <td><?php echo($lang("currency", "40")); ?></td>
                <td><?php echo($lang("currency", "35")); ?></td>
                <td><?php echo($lang("currency", "55")); ?></td>
            </tr>
        </table>
        <br>
        <table id="priceChart" align="center" style="color: white;">
            <tr>
                <th>1 extras</th>
                <th>2 extras</th>
                <th>3 extras</th>
                <th>4 extras</th>
                <th>5+ extras</th>
            </tr>
            <tr>
                <td><?php echo($lang("currency", "10")); ?></td>
                <td><?php echo($lang("currency", "17")); ?></td>
                <td><?php echo($lang("currency", "23")); ?></td>
                <td><?php echo($lang("currency", "27")); ?></td>
                <td><?php echo($lang("currency", "30")); ?></td>
            </tr>
        </table>
        <br>
        <p><?php echo($lang("more_info")); ?></p>
    </div>
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
            <h4><?php echo($lang("account_advantages")); ?></h4>
            <div id="register">
                <ul>
                    <li><?php echo($lang("faster_transaction")); ?></li>
                    <li><?php echo($lang("resolve_issues")); ?></li>
                    <li><?php echo($lang("save_time")); ?></li>
                </ul><br>
                <a href="/clicon/Login_Register.php">
                    <button class="btn btn-warning">Create Account</button>
                </a>
            </div>
        </div>
        <div class="col-sm-2"></div>
        <div id="register" class="col-sm-4">
            <h2 class="page-header"><?php echo(strtoupper($lang("one_time_user"))); ?></h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="emailRegister" class="<?php echo $emailErr ? 'error' : '' ?>"><?php echo($lang("email")); ?></label>
                        <input type="text" class="form-control" id="emailRegister" name="emailRegister"
                        value="<?php echo isset($_POST['emailRegister']) ? $_POST['emailRegister'] : '' ?>"
                        data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_email')); ?>">
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
                        value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" data-toggle="tooltip" data-placement="bottom"
                        title="<?php echo($lang('tip_first_name')); ?>">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="lname" class="<?php echo $lnameErr ? 'error' : '' ?>"><?php echo($lang("last_name")); ?></label>
                        <input type="text" class="form-control" id="lname" name="lname"
                        value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" data-toggle="tooltip" data-placement="bottom"
                        title="<?php echo($lang('tip_last_name')); ?>">
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="phone" class="<?php echo $phoneErr ? 'error' : '' ?>"><?php echo($lang("phone")); ?></label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                        value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" data-toggle="tooltip" data-placement="bottom"
                        title="<?php echo($lang('tip_phone')); ?>">
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
                        data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_state')); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="city" class="<?php echo $cityErr ? 'error' : '' ?>"><?php echo($lang("city")); ?></label>
                        <input type="text" class="form-control" id="city" name="city"
                        value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" data-toggle="tooltip" data-placement="bottom"
                        title="<?php echo($lang('tip_city')); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="address" class="<?php echo $addressErr ? 'error' : '' ?>"><?php echo($lang("address")); ?></label>
                        <input type="text" class="form-control" id="address" name="address"
                        value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                        data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_address')); ?>">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="zip" class="<?php echo $zipErr ? 'error' : '' ?>"><?php echo($lang("zip")); ?></label>
                        <input type="text" class="form-control" id="zip" name="zip"
                        value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" data-toggle="tooltip" data-placement="bottom"
                        title="<?php echo($lang('tip_zip')); ?>">
                    </div>
                </div>
                <input type="hidden" name="process" value="register">
                <div class="row">
                    <button type="submit" class="btn btn-success btn-lg"><?php echo($lang("continue_one_time")); ?></button>
                </div>
                <div class="row" style="height: 80px; padding: 10px;">
                    <p><span class="error"><?php echo($registerErrMsg); ?></span></p>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html" ?>
</body>
</html>