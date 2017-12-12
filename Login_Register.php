<?php include "Shared/connection.php" ?>
<?php include "Processes/registerProcess.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>GameCon_Login</title>
</head>
<body>
	<?php include "Shared/Header.html" ?>
	<div class="content row">
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
				<p><span class="error"><?php echo($errorMsg); ?></span></p>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
					</div>
					<div class="form-group col-xs-6">
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="pass">Password</label>
						<input type="Password" class="form-control" id="pass" name="pass" placeholder="Enter Password">
					</div>
					<div class="form-group col-xs-6">
						<label for="confirmPass">Confirm Password</label>
						<input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Enter Password Again" >
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="dob">Date of Birth</label>
						<input type="date" class="form-control" id="dob" name="dob">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="phone">Phone Number</label>
						<input type="tel" class="form-control" id="phone" name="phone" placeholder="i.e. (999) 999-9999">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="country">Country</label>
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
									if(isset($_GET["countryId"])){
										if($_GET["countryId"] == $id){
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
						<label for="state">State/Province</label>
						<input type="text" class="form-control" id="state" name="state" placeholder="Enter State/Province Code" minlength="2" maxlength="2">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
					</div>
					<div class="form-group col-xs-6">
						<label for="zip">Zip Code</label>
						<input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip Code (Case Sensitive)">
					</div>
				</div>
				<div class="row">
					<button type="submit" class="btn btn-success btn-lg">Register</button>
					<button type="reset" class="btn btn-warning btn-lg">Reset</button>
				</div>
			</form>
		</div>
	</div>
	<?php include "Shared/Footer.html" ?>
</body>
</html>