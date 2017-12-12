<?php include "Shared/connection.php" ?>
<?php include "Processes/registerProcess.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>$Title$</title>
</head>
<body>
	<?php include "Shared/Header.html" ?>
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
					<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" data-toggle="tooltip" title="Email mustbe a valid format (i.e. name@domain.com)">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="fname" class="<?php echo $fnameErr ? 'error' : '' ?>">First Name</label>
					<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>">
				</div>
				<div class="form-group col-xs-6">
					<label for="lname" class="<?php echo $lnameErr ? 'error' : '' ?>">Last Name</label>
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="pass" class="<?php echo $passErr ? 'error' : '' ?>">Password</label>
					<input type="Password" class="form-control" id="pass" name="pass" placeholder="Enter Password">
				</div>
				<div class="form-group col-xs-6">
					<label for="confirmPass" class="<?php echo $confirmPassErr ? 'error' : '' ?>">Confirm Password</label>
					<input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Enter Password Again">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="dob" class="<?php echo $dobErr ? 'error' : '' ?>">Date of Birth</label>
					<input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="phone" class="<?php echo $phoneErr ? 'error' : '' ?>">Phone Number</label>
					<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="country" class="<?php echo $countryErr ? 'error' : '' ?>">Country</label>
					<select class="form-control" id="country" name="country" placeholder="Select Country">
						<?php
						$get_countries_sql="SELECT * FROM COUNTRIES";
						$get_countries_res=$con->query($get_countries_sql) or die("get_countries_res: " .$con->error);

						if($get_countries_res->num_rows < 1){
							echo("<p><i>Invalid selection</i></p>");
						} else{
							while($country = $get_countries_res->fetch_array()){
								$id=$country["COUNTRY_ID"];
								$countryCode=$country["COUNTRY_CODE"];
								$name=$country["COUNTRY_NAME"];
								$selected="";
								if(isset($_POST["country"])){
									if($_POST["country"] == $id){
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
					<label for="state" class="<?php echo $stateErr ? 'error' : '' ?>">State/Province</label>
					<input type="text" class="form-control" id="state" name="state" placeholder="Enter State/Province Code" minlength="2" maxlength="2" value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="city" class="<?php echo $cityErr ? 'error' : '' ?>">City</label>
					<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label for="address" class="<?php echo $addressErr ? 'error' : '' ?>">Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>">
				</div>
				<div class="form-group col-xs-6">
					<label for="zip" class="<?php echo $zipErr ? 'error' : '' ?>">Zip Code</label>
					<input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip Code" value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>">
				</div>
			</div>
			<div class="row">
				<button type="submit" class="btn btn-success btn-lg">Register</button>
				<button type="reset" class="btn btn-warning btn-lg">Reset</button>
			</div>
			<div class="row" style="height: 80px; padding: 10px;">
				<p><span class="error"><?php echo($errorMsg); ?></span></p>
			</div>
		</form>
	</div>
</div>
<?php include "Shared/Footer.html" ?>
</body>
</html>