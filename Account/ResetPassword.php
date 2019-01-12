<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/connection.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Functions/FilterData.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/Functions.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Processes/ResetPassProcess.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Head.php" ?>
	<title>Reset Password</title>
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
	<div class="content row">
		<div class="col-sm-2"></div>
		<div id="resetPassForm" class="col-sm-3">
			<?php
			if(isset($_GET["token"]) && $invalidToken != true){
				$token = $_GET["token"];
				?>
				<h2 class="page-header">RESET PASSWORD</h2><br>
				<form action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]) ."?token=$token"); ?>" method="post" class="form">
					<div class="row">
						<div class="form-group col-xs-12">
							<label for="newPass">New Password</label>
							<input type="Password" class="form-control" id="newPass" name="newPass"
							data-toggle="tooltip" data-placement="bottom"
							title="<?php echo($lang('tip_password')); ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
							<label for="confirmNewPass">Confirm New Password</label>
							<input type="Password" class="form-control" id="confirmNewPass" name="confirmNewPass"
							data-toggle="tooltip" data-placement="bottom" title="<?php echo($lang('tip_confirm_pass')); ?>">
						</div>
					</div>
					<input type="hidden" name="process" value="resetPass">
					<input type="hidden" name="token" value="<?php echo($token) ?>">
					<div class="row">
						<button type="submit" class="btn btn-success">Confirm</button>
					</div>
					<div class="row" style="height: 80px; padding: 10px;">
						<p><span class="success"><?php echo($resetPassOutput); ?></span></p>
						<p><span class="error"><?php echo($resetPassErrMsg); ?></span></p>
					</div>
				</form>
				<?php
			} else{
				?>
				<h3 class="error">INVALID/EXPIRED RESET TOKEN</h3>
				<?php
			}
			?>
		</div>
	</main>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/clicon" . "/Shared/Footer.html" ?>
</body>
</html>