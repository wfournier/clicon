<?php include "Shared/connection.php" ?>
<?php include "Functions/FilterData.php"; ?>
<?php include "Processes/CheckLogin.php" ?>
<?php include "Processes/PreferencesProcess.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account</title>
    <?php include "Shared/Head.html";?>
    <link rel="stylesheet" type="text/css" href="Style/AccountStyle.css">
    <style>
    #AP {
        background-color: aliceblue;
    }
</style>
</head>
<body>
    <?php include "Shared/Header.php";?>
    <main>
        <?php include "Shared/AccountNavigation.html";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="row">
                    <p>This section is optional to fill out</p>
                </div>
                <hr>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="badgeName" class="<?php echo $badgeNameErr ? 'error' : '' ?>">Badge Name</label>
                            <input type="text" class="form-control" id="badgeName" name="badgeName" value="<?php echo $badgeName ?>" maxlength="20" data-toggle="tooltip" title="Your badge name will appear on your ticket (No special characters allowed)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="emergContact" class="<?php echo $emergContactErr ? 'error' : '' ?>">Emergency Contact Phone #</label>
                            <input type="tel" class="form-control" id="emergContact" name="emergContact" value="<?php echo $emergContact ?>" data-toggle="tooltip" title="Phone # to be called in case of emergency (i.e. 000-000-0000)">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="emergContactName" class="<?php echo $emergContactNameErr ? 'error' : '' ?>">Emergency Contact Full Name</label>
                            <input type="tel" class="form-control" id="emergContactName" name="emergContactName" value="<?php echo $emergContactName ?>" data-toggle="tooltip" title="Full name of the person to be called in case of emergency (This should be filled if an Emergency Contact Phone # is entered)">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-lg">Save</button>
                    </div>
                    <div class="row" style="height: 80px; padding: 10px;">
                        <p><span class="success"><?php echo($prefOutput); ?></span></p>
                        <p><span class="error"><?php echo($prefErrMsg); ?></span></p>
                    </div>
                    <input type="hidden" name="process" value="pref">
                </form>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </main>
    <?php include "Shared/Footer.html";?>
</body>
</html>