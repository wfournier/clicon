<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Functions/FilterData.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/RegisterProcess.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/LoginProcess.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/CheckLogin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php" ?>
    <title>GameCon_Admission</title>
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
    <div class="row" style="text-align: center">
        <h1>Price Chart</h1>
        <table id="priceChart" align="center">
            <tr>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
                <th>3-Day</th>
            </tr>
            <tr>
                <td>25$</td>
                <td>40$</td>
                <td>35$</td>
                <td>55$</td>
            </tr>
        </table>
        <br>
        <table id="priceChart" align="center">
            <tr>
                <th>1 extra</th>
                <th>2 extra</th>
                <th>3 extra</th>
                <th>4 extra</th>
                <th>5+ extra</th>
            </tr>
            <tr>
                <td>10$</td>
                <td>17</td>
                <td>23$</td>
                <td>27$</td>
                <td>30$</td>
            </tr>
        </table>
        <br>
        <p>To get more info on ticket collection or to see opening hours. Checkout our <a href="Information.php#hours">info
                page</a></p>
    </div>
    <div class="content row">
        <div class="col-sm-1"></div>
        <div id="login" class="col-sm-4">
            <h2 class="page-header">LOGIN</h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="emailLogin">Email</label>
                        <input type="text" class="form-control" id="emailLogin" name="emailLogin"
                               value="<?php echo isset($_POST['emailLogin']) ? $_POST['emailLogin'] : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="passLogin">Password</label>
                        <input type="password" class="form-control" id="passLogin" name="passLogin">
                    </div>
                </div>
                <input type="hidden" name="process" value="login">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-lg">Login</button>
                    </div>
                    <div class="col-xs-6" style="text-align: right">
                        <a href="Account/Forgot_Password.php">Forgot Password?</a>
                    </div>
                </div>
                <div class="row" style="height: 80px; padding: 10px;">
                    <p><span class="success"><?php echo($loginOutput); ?></span></p>
                    <p><span class="error"><?php echo($loginErrMsg); ?></span></p>
                </div>
            </form>
            <h4>Account Advantages:</h4>
            <div id="register">
                <p>
                    - Make you transaction faster each year with an account.<br>
                    - Resolve issues faster.<br>
                    - Save time by selecting your badge name before the convention.
                </p><br>
                <a href="Login_Register.php">
                    <button class="btn btn-warning">Create Account</button>
                </a>
            </div>
        </div>
        <div class="col-sm-2"></div>
        <div id="register" class="col-sm-4">
            <h2 class="page-header">ONE-TIME USER</h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="emailRegister" class="<?php echo $emailErr ? 'error' : '' ?>">Email</label>
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
                        <label for="fname" class="<?php echo $fnameErr ? 'error' : '' ?>">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname"
                               value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" data-toggle="tooltip"
                               title="First Name must only contain letters">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="lname" class="<?php echo $lnameErr ? 'error' : '' ?>">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname"
                               value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" data-toggle="tooltip"
                               title="Last Name must only contain letters">
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="phone" class="<?php echo $phoneErr ? 'error' : '' ?>">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                               value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" data-toggle="tooltip"
                               title="Phone number must be valid (i.e. 000-000-0000)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="countryId" class="<?php echo $countryIdErr ? 'error' : '' ?>">Country</label>
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
                        <label for="stateCode" class="<?php echo $stateErr ? 'error' : '' ?>">State/Province</label>
                        <input type="text" class="form-control" id="stateCode" name="stateCode" maxlength="2"
                               value="<?php echo isset($_POST['stateCode']) ? strtoupper($_POST['stateCode']) : '' ?>"
                               data-toggle="tooltip" title="State code must be 2 characters long (i.e. FL)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="city" class="<?php echo $cityErr ? 'error' : '' ?>">City</label>
                        <input type="text" class="form-control" id="city" name="city"
                               value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" data-toggle="tooltip"
                               title="City must only contain letters (i.e. Anytown)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="address" class="<?php echo $addressErr ? 'error' : '' ?>">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                               value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"
                               data-toggle="tooltip" title="Address must be valid (i.e. 123 Main Street)">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="zip" class="<?php echo $zipErr ? 'error' : '' ?>">Zip Code</label>
                        <input type="text" class="form-control" id="zip" name="zip"
                               value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" data-toggle="tooltip"
                               title="Zip code must be valid (i.e. A1B 2C3)">
                    </div>
                </div>
                <input type="hidden" name="process" value="register">
                <div class="row">
                    <button type="submit" class="btn btn-success btn-lg">Continue as one-time user ></button>
                </div>
                <div class="row" style="height: 80px; padding: 10px;">
                    <p><span class="error"><?php echo($registerErrMsg); ?></span></p>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html" ?>
</body>
</html>