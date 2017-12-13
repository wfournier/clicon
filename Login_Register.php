<?php include "Shared/connection.php" ?>
<?php include "Processes/RegisterProcess.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>GameCon_Login</title>
</head>
<body>
	<?php include "Shared/Header.php" ?>
	<style type="text/css">
	.row {
		margin-left: 0px;
		margin-right: 0px;
	}
</style>
<div class="content row">
	<div class="col-sm-3"></div>
	<div class="col-sm-3">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="email" class="<?php echo $emailErr ? 'error' : '' ?>">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" data-toggle="tooltip" title="Email must be a valid format (i.e. name@domain.com)">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="fname" class="<?php echo $fnameErr ? 'error' : '' ?>">First Name</label>
					<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" data-toggle="tooltip" title="First Name must only contain letters">
				</div>
				<div class="form-group col-xs-6">
					<label for="lname" class="<?php echo $lnameErr ? 'error' : '' ?>">Last Name</label>
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" data-toggle="tooltip" title="Last Name must only contain letters">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="pass" class="<?php echo $passErr ? 'error' : '' ?>">Password</label>
					<input type="Password" class="form-control" id="pass" name="pass" placeholder="Enter Password" data-toggle="tooltip" title="Password must contain be at least 8 characters long, contain numbers and at least 1 uppercase letter">
				</div>
				<div class="form-group col-xs-6">
					<label for="confirmPass" class="<?php echo $confirmPassErr ? 'error' : '' ?>">Confirm Password</label>
					<input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Enter Password Again" data-toggle="tooltip" title="Both passwords must match">
				</div>
			</div>
			<div class="row">
				<label class="<?php echo $dobErr ? 'error' : '' ?>">Date of Birth</label>
			</div>
			<div class="row">
				<div id="dob" class="form-group col-xs-6">
					<div class="form-group col-xs-3">
						<input type="text" class="form-control" id="dobDay" name="dobDay" placeholder="DD" maxlength="2" value="<?php echo isset($_POST['dobDay']) ? $_POST['dobDay'] : '' ?>" data-toggle="tooltip" title="Day must be between 1 and 31 inclusively">
					</div>
					<div class="form-group col-xs-3">
						<input type="text" class="form-control" id="dobMonth" name="dobMonth" placeholder="MM" maxlength="2" value="<?php echo isset($_POST['dobMonth']) ? $_POST['dobMonth'] : '' ?>" data-toggle="tooltip" title="Month must be between 1 and 12 inclusively">
					</div>
					<div class="form-group col-xs-6">
						<input type="text" class="form-control" id="dobYear" name="dobYear" placeholder="YYYY" minlength="4" maxlength="4" value="<?php echo isset($_POST['dobYear']) ? $_POST['dobYear'] : '' ?>" data-toggle="tooltip" title="Year must be valid">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="phone" class="<?php echo $phoneErr ? 'error' : '' ?>">Phone Number</label>
					<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" data-toggle="tooltip" title="Phone number must be valid (i.e. 000-000-0000)">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="countryId" class="<?php echo $countryIdErr ? 'error' : '' ?>">Country</label>
					<select class="form-control" id="countryId" name="countryId" placeholder="Select Country" data-toggle="tooltip" title="">
						<?php
						$get_countries_sql="SELECT * FROM COUNTRIES";
						$get_countries_res=$con->query($get_countries_sql) or die("get_countries_res: " .$con->error);

						if($get_countries_res->num_rows < 1){
							echo("<p><i>Invalid selection</i></p>");
						} else{
							while($countries = $get_countries_res->fetch_array()){
								$id=$countries["COUNTRY_ID"];
								$name=$countries["COUNTRY_NAME"];
								$selected="";
								if(isset($_POST["countryId"])){
									if($_POST["countryId"] == $id){
										$selected="selected";
									}
								}
								if($name == "Canada" || $name == "United States"){
									echo("<option value=\"" .$id ."\" " .$selected .">" .$name ."</option>");
								}
							}
						}
						$get_countries_res->free();
						?>
					</select>
				</div>
				<div class="form-group col-xs-6">
					<label for="stateCode" class="<?php echo $stateErr ? 'error' : '' ?>">State/Province</label>
					<input type="text" class="form-control" id="stateCode" name="stateCode" placeholder="Enter State/Province Code" maxlength="2" value="<?php echo isset($_POST['stateCode']) ? strtoupper($_POST['stateCode']) : '' ?>" data-toggle="tooltip" title="State code must be 2 characters long (i.e. FL)">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="city" class="<?php echo $cityErr ? 'error' : '' ?>">City</label>
					<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" data-toggle="tooltip" title="City must only contain letters (i.e. Anytown)">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="address" class="<?php echo $addressErr ? 'error' : '' ?>">Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" data-toggle="tooltip" title="Address must be valid (i.e. 123 Main Street)">
				</div>
				<div class="form-group col-xs-6">
					<label for="zip" class="<?php echo $zipErr ? 'error' : '' ?>">Zip Code</label>
					<input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip Code" value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" data-toggle="tooltip" title="Zip code must be valid (i.e. A1B 2C3)">
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
<?php include "Shared/Footer.html" ?>
</body>
</html>