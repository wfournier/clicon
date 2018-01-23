<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Functions/FilterData.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/ModifyProcess.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Processes/CheckLogin.php" ?>
<?php
if (!func::checkLogin($con)) {
    header("Location: Login_register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account_ModifyInfo</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Head.html"; ?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AM {
        background-color: aliceblue;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Header.php"; ?>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/AccountNavigation.html"; ?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="currPass" class="<?php echo $currPassErr ? 'error' : '' ?>">Current Password</label>
                            <input type="Password" class="form-control" id="currPass" name="currPass" data-toggle="tooltip" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="newPass" class="<?php echo $newPassErr ? 'error' : '' ?>">New Password</label>
                            <input type="Password" class="form-control" id="newPass" name="newPass" data-toggle="tooltip" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="confirmNewPass" class="<?php echo $confirmNewPassErr ? 'error' : '' ?>">Confirm New Password</label>
                            <input type="Password" class="form-control" id="confirmNewPass" name="confirmNewPass" data-toggle="tooltip" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-lg">Confirm</button>
                    </div>
                    <div class="row" style="height: 80px; padding: 10px;">
                        <p><span class="error"><?php echo($changePassErrMsg); ?></span></p>
                    </div>
                    <input type="hidden" name="process" value="changePassword">
                </form>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon/Shared/Footer.html"; ?>
</body>
</html>

