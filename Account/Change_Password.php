<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Functions/FilterData.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Processes/ModifyProcess.php" ?>
<?php
if (!func::checkLogin()) {
    header("Location: /gamecon/Login_Register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameCon_Account_ModifyInfo</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AM {
        background-color: lawngreen;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Header.php"; ?>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/AccountNavigation.php"; ?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="currPass" class="<?php echo $currPassErr ? 'error' : '' ?>"><?php echo($lang("current_pass")); ?></label>
                            <input type="Password" class="form-control" id="currPass" name="currPass" data-toggle="tooltip" data-placement="bottom" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="newPass" class="<?php echo $newPassErr ? 'error' : '' ?>"><?php echo($lang("new_pass")); ?></label>
                            <input type="Password" class="form-control" id="newPass" name="newPass" data-toggle="tooltip" data-placement="bottom" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="confirmNewPass" class="<?php echo $confirmNewPassErr ? 'error' : '' ?>"><?php echo($lang("confirm_new_pass")); ?></label>
                            <input type="Password" class="form-control" id="confirmNewPass" name="confirmNewPass" data-toggle="tooltip" data-placement="bottom" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-lg"><?php echo($lang("save")); ?></button>
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
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gamecon" . "/Shared/Footer.html"; ?>
</body>
</html>

