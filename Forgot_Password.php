<?php include "Shared/connection.php" ?>
<?php include "Functions/FilterData.php"; ?>
<?php include "Processes/CheckLogin.php" ?>
<?php include "Processes/ForgotPassProcess.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>Forgot Password</title>
</head>
<body>
	<?php include "Shared/Header.php" ?>
	<style type="text/css">
	.row {
		margin-left: 0px;
		margin-right: 0px;
	}
</style>
<main>
	<div class="content row">
		<div class="col-sm-2"></div>
		<div id="forgotPassForm" class="col-sm-3">
			<h2 class="page-header">RESET PASSWORD</h2><br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
				<div class="row">
					<div class="form-group col-xs-12">
						<label for="forgotPassEmail" class="<?php echo $forgotPassEmailErr ? 'error' : '' ?>">Email</label>
						<input type="text" class="form-control" id="forgotPassEmail" name="forgotPassEmail" value="<?php echo isset($_POST['forgotPassEmail']) ? $_POST['forgotPassEmail'] : '' ?>" data-toggle="tooltip" title="Email linked to your account (i.e. name@domain.com)">
					</div>
				</div>
				<input type="hidden" name="process" value="forgotPass">
				<div class="row">
					<button type="submit" class="btn btn-success">Confirm</button>
				</div>
				<div class="row" style="height: 80px; padding: 10px;">
					<p><span class="success"><?php echo($forgotPassOutput); ?></span></p>
					<p><span class="error"><?php echo($forgotPassErrMsg); ?></span></p>
				</div>
			</form>
		</div>
	</main>
	<?php include "Shared/Footer.html" ?>
</body>
</html>