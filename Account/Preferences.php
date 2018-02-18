<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clicon_Account</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Head.php";?><?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/connection.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Functions/FilterData.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/Functions.php" ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Processes/PreferencesProcess.php" ?>
    <?php
    if (!func::checkLogin($con)) {
        header("Location: /Login_Register.php");
    }
    ?>
    <link rel="stylesheet" type="text/css" href="../Style/AccountStyle.css">
    <style>
    #AP {
        background-color: lawngreen;
    }
</style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Header.php";?>
    <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/AccountNavigation.php";?>
        <div class="content row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="row">
                    <p><?php echo($lang("optional_msg")); ?></p>
                </div>
                <hr>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="badgeName" class="<?php echo $badgeNameErr ? 'error' : '' ?>"><?php echo($lang("pref_badge_name")); ?></label>
                            <input type="text" class="form-control" id="badgeName" name="badgeName" value="<?php echo $badgeName ?>" maxlength="20" data-toggle="tooltip" title="<?php echo($lang('tip_pref_badge_name')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="emergContact" class="<?php echo $emergContactErr ? 'error' : '' ?>"><?php echo($lang("emerg_contact_phone")); ?></label>
                            <input type="tel" class="form-control" id="emergContact" name="emergContact" value="<?php echo $emergContact ?>" data-toggle="tooltip" title="<?php echo($lang('tip_emerg_contact_phone')); ?>">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="emergContactName" class="<?php echo $emergContactNameErr ? 'error' : '' ?>"><?php echo($lang("emerg_contact_name")); ?></label>
                            <input type="tel" class="form-control" id="emergContactName" name="emergContactName" value="<?php echo $emergContactName ?>" data-toggle="tooltip" title="<?php echo($lang('tip_emerg_contact_name')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-lg"><?php echo($lang("save")); ?></button>
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
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Shared/Footer.html";?>
</body>
</html>