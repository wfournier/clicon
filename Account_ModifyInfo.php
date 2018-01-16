<?php include "Shared/connection.php" ?>
<?php include "Functions/FilterData.php"; ?>
<?php include "Processes/ModifyProcess.php" ?>
<?php include "Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account_ModifyInfo</title>
    <?php include "Shared/Head.html"; ?>
    <link rel="stylesheet" type="text/css" href="Style/AccountStyle.css">
    <style>
    #AM {
        background-color: aliceblue;
    }
</style>
</head>
<body>
    <?php include "Shared/Header.php"; ?>
    <main>
        <?php include "Shared/AccountNavigation.html"; ?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="fnameMod" class="<?php echo $fnameModErr ? 'error' : '' ?>">First Name</label>
                            <input type="text" class="form-control" id="fnameMod" name="fnameMod"
                            value="<?php echo $fnameMod ?>" data-toggle="tooltip" title="First Name must only contain letters">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="lnameMod" class="<?php echo $lnameModErr ? 'error' : '' ?>">Last Name</label>
                            <input type="text" class="form-control" id="lnameMod" name="lnameMod"
                            value="<?php echo $lnameMod ?>"
                            data-toggle="tooltip" title="Last Name must only contain letters">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="phoneMod" class="<?php echo $phoneModErr ? 'error' : '' ?>">Phone Number</label>
                            <input type="tel" class="form-control" id="phoneMod" name="phoneMod"
                            value="<?php echo $phoneMod ?>"
                            data-toggle="tooltip" title="Phone number must be valid (i.e. 000-000-0000)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="countryIdMod"
                            class="<?php echo $countryIdModErr ? 'error' : '' ?>">Country</label>
                            <select class="form-control" id="countryIdMod" name="countryIdMod" data-toggle="tooltip" title="">
                                <?php
                                $get_countries_sql = "SELECT * FROM COUNTRIES";
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
                            <label for="stateCodeMod" class="<?php echo $stateCodeModErr ? 'error' : '' ?>">State/Province</label>
                            <input type="text" class="form-control" id="stateCodeMod" name="stateCodeMod" value="<?php echo $stateCodeMod ?>" data-toggle="tooltip" title="State code must be 2 characters long">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="cityMod" class="<?php echo $cityModErr ? 'error' : '' ?>">City</label>
                            <input type="text" class="form-control" id="cityMod" name="cityMod" value="<?php echo $cityMod ?>"
                            data-toggle="tooltip" title="City must only contain letters">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="addressMod" class="<?php echo $addressModErr ? 'error' : '' ?>">Address</label>
                            <input type="text" class="form-control" id="addressMod" name="addressMod" value="<?php echo $addressMod ?>" data-toggle="tooltip" title="Address must be valid">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="zipMod" class="<?php echo $zipModErr ? 'error' : '' ?>">Zip Code</label>
                            <input type="text" class="form-control" id="zipMod" name="zipMod" value="<?php echo $zipMod ?>"
                            data-toggle="tooltip" title="Zip code must be valid (i.e. A1B 2C3)">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="passMod" class="<?php echo $passModErr ? 'error' : '' ?>">Current Password</label>
                            <input type="Password" class="form-control" id="passMod" name="passMod" data-toggle="tooltip"
                            title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                        <div class="col-xs-6"><br>
                            <a href="Change_Password.php" class="btn btn-warning">Change Password</a>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-lg">Save</button>
                    </div>
                    <div class="row" style="height: 80px; padding: 10px;">
                        <p><span class="success"><?php echo($modOutput); ?></span></p>
                        <?php
                        if(isset($_GET["passChanged"])){
                            ?>
                            <p><span class="success"><?php echo("Password Changed Successfully!"); ?></span></p>
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
    <?php include "Shared/Footer.html"; ?>
</body>
</html>

