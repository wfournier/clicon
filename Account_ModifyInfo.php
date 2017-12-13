<?php include "Shared/connection.php" ?>
<?php include "Processes/RegisterProcess.php" ?>
<?php
if (!isset($_COOKIE["accountID"])) {
    header("######");
} else {
    $aut = "SELECT * FROM account WHERE ACCOUNT_ID == " . $_COOKIE["accountID"] . ";";
    $autResult = $con->query($aut);
    $pass = "";
    while ($row = $autResult->fetch_array()) {
        $pass = $row["PASSWORD"];
    }
    if ($pass != "" && $pass == $_COOKIE["password"]) {
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
        <?php include "Shared/Header.html"; ?>
        <main>
            <?php include "Shared/AccountNavigation.html"; ?>
            <?php

            $query = "Sel";
            ?>
            <div class="content row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="fname" class="<?php echo $fnameErr ? 'error' : '' ?>">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                       placeholder="Enter First Name"
                                       value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>"
                                       data-toggle="tooltip" title="First Name must only contain letters">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="lname" class="<?php echo $lnameErr ? 'error' : '' ?>">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                       placeholder="Enter Last Name"
                                       value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>"
                                       data-toggle="tooltip" title="Last Name must only contain letters">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="phone" class="<?php echo $phoneErr ? 'error' : '' ?>">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                       placeholder="Enter Phone Number"
                                       value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>"
                                       data-toggle="tooltip" title="Phone number must be valid (i.e. 000-000-0000)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="countryId"
                                       class="<?php echo $countryIdErr ? 'error' : '' ?>">Country</label>
                                <select class="form-control" id="countryId" name="countryId"
                                        placeholder="Select Country" data-toggle="tooltip" title="">
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
                                <label for="state" class="<?php echo $stateErr ? 'error' : '' ?>">State/Province</label>
                                <input type="text" class="form-control" id="state" name="state"
                                       placeholder="Enter State/Province Code"
                                       value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>"
                                       data-toggle="tooltip" title="State code must be 2 characters long">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="city" class="<?php echo $cityErr ? 'error' : '' ?>">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"
                                       value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>"
                                       data-toggle="tooltip" title="City must only contain letters">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="address" class="<?php echo $addressErr ? 'error' : '' ?>">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Enter Address"
                                       value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                                       data-toggle="tooltip" title="Address must be valid">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="zip" class="<?php echo $zipErr ? 'error' : '' ?>">Zip Code</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip Code"
                                       value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>"
                                       data-toggle="tooltip" title="Zip code must be valid (i.e. A1B 2C3)">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="pass" class="<?php echo $passErr ? 'error' : '' ?>">Password</label>
                                <input type="Password" class="form-control" id="pass" name="pass"
                                       placeholder="Enter Password" data-toggle="tooltip"
                                       title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success btn-lg">Register</button>
                            <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                        </div>
                        <div class="row" style="height: 80px; padding: 10px;">
                            <p><span class="error"><?php echo($errorMsg); ?></span></p>
                        </div>
                        <input type="hidden" name="process" value="register">
                    </form>
                </div>
                <div class="col-sm-3">
                    <p><span class="success"><?php echo($output); ?></span></p>
                </div>
            </div>
        </main>
        <?php include "Shared/Footer.html"; ?>
        </body>
        </html>
        <?php
    } else {
        header("######");
    }
}
?>