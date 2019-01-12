<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Account_ModifyInfo</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php"; ?><?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Functions/FilterData.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/ModifyProcess.php" ?>
    <?php
    if (!func::checkLogin()) {
        header("Location: /clicon/Login_Register.php");
    }
    ?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AVi {
        background-color: lawngreen;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Header.php"; ?>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/AccountNavigation.php"; ?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1><?php echo($lang("personal_info")); ?></h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="fnameMod" class="<?php echo $fnameModErr ? 'error' : '' ?>"><?php echo($lang("first_name")); ?></label>
                            <input type="text" class="form-control" id="fnameMod" name="fnameMod"
                            value="<?php echo $fnameMod ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_first_name')); ?>">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="lnameMod" class="<?php echo $lnameModErr ? 'error' : '' ?>"><?php echo($lang("last_name")); ?></label>
                            <input type="text" class="form-control" id="lnameMod" name="lnameMod"
                            value="<?php echo $lnameMod ?>"
                            data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_last_name')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="phoneMod" class="<?php echo $phoneModErr ? 'error' : '' ?>"><?php echo($lang("phone")); ?></label>
                            <input type="tel" class="form-control" id="phoneMod" name="phoneMod"
                            value="<?php echo $phoneMod ?>"
                            data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_phone')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="countryIdMod"
                            class="<?php echo $countryIdModErr ? 'error' : '' ?>"><?php echo($lang("country")); ?></label>
                            <select class="form-control" id="countryIdMod" name="countryIdMod" data-toggle="tooltip" data-placement="bottom" title="">
                                <?php
                                $get_countries_sql = "SELECT * FROM countries";
                                $get_countries_res = $con->query($get_countries_sql) or die("get_countries_res: " . $con->error);

                                if ($get_countries_res->num_rows < 1) {
                                    echo("<p><i>Invalid selection</i></p>");
                                } else {
                                    while ($country = $get_countries_res->fetch_array()) {
                                        $id = $country["COUNTRY_ID"];
                                        $countryCode = $country["COUNTRY_CODE"];
                                        $name = $country["COUNTRY_NAME"];
                                        $selected = "";
                                        if ($countryIdMod == $id) {
                                            $selected = "selected";
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
                            <label for="stateCodeMod" class="<?php echo $stateCodeModErr ? 'error' : '' ?>"><?php echo($lang("state")); ?></label>
                            <input type="text" class="form-control" id="stateCodeMod" name="stateCodeMod" value="<?php echo $stateCodeMod ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_state')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="cityMod" class="<?php echo $cityModErr ? 'error' : '' ?>"><?php echo($lang("city")); ?></label>
                            <input type="text" class="form-control" id="cityMod" name="cityMod" value="<?php echo $cityMod ?>"
                            data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_city')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="addressMod" class="<?php echo $addressModErr ? 'error' : '' ?>"><?php echo($lang("address")); ?></label>
                            <input type="text" class="form-control" id="addressMod" name="addressMod" value="<?php echo $addressMod ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_address')); ?>">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="zipMod" class="<?php echo $zipModErr ? 'error' : '' ?>"><?php echo($lang("zip")); ?></label>
                            <input type="text" class="form-control" id="zipMod" name="zipMod" value="<?php echo $zipMod ?>"
                            data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_zip')); ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="passMod" class="<?php echo $passModErr ? 'error' : '' ?>"><?php echo($lang("current_pass")); ?></label>
                            <input type="Password" class="form-control" id="passMod" name="passMod" data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo($lang('tip_validate_pass')); ?>">
                        </div>
                        <div class="col-xs-6"><br>
                            <a href="Change_Password.php" class="btn btn-warning"><?php echo($lang('change_pass')); ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-lg"><?php echo($lang('save')); ?></button>
                    </div>
                    <div class="row" style="height: 80px; padding: 10px;">
                        <p><span class="success"><?php echo($modOutput); ?></span></p>
                        <?php
                        if(isset($_GET["passChanged"])){
                            ?>
                            <p><span class="success"><?php echo($lang('pass_changed_success')); ?></span></p>
                            <?php
                        }
                        ?>
                        <p><span class="error"><?php echo($modErrMsg); ?></span></p>
                    </div>
                    <input type="hidden" name="process" value="modify">
                </form>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html"; ?>
</body>
</html>

