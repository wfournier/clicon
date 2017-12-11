<?php include "Shared/connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>$Title$</title>
</head>
<body>
	<?php include "Shared/Header.html" ?>
	<div class="content row">
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
			<form action="Processes/registerProcess.php" method="post" class="form">
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="email">*Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="firstName">*First Name:</label>
						<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required="required">
					</div>
					<div class="form-group col-xs-6">
						<label for="lastName">*Last Name:</label>
						<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="pass">*Password:</label>
						<input type="Password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required="required">
					</div>
					<div class="form-group col-xs-6">
						<label for="confirmPass">*Confirm Password:</label>
						<input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Enter Password Again" required="required" >
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="dob">*Date of Birth:</label>
						<input type="date" class="form-control" id="dob" name="dob">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="phone">*Phone Number:</label>
						<input type="tel" class="form-control" id="phone" name="phone" pattern="^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$
						" placeholder="i.e. 999-999-9999">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="address">*Address:</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="country">*Country:</label>
						<select class="form-control" id="country" name="country" placeholder="Select Country" required="required">
							<?php
							$get_countries_sql="SELECT * FROM COUNTRIES";
							$get_countries_res=$con->query($get_countries_sql) or die("get_countries_res: " .$con->error);

							if($get_countries_res->num_rows < 1){
								echo("<p><i>Invalid selection</i></p>");
							} else{
								while($country = $get_countries_res->fetch_array()){
									$id=$country["COUNTRY_ID"];
									$name=$country["COUNTRY_NAME"];
									$code=$country["COUNTRY_CODE"];
									$selected="";
									if(isset($_GET["countryCode"])){
										if($_GET["countryCode"] == $code){
											$selected="selected";
										}
									}
									echo("<option value=\"" .$code ."\" " .$selected .">" .$name ."</option>");
								}
							}																	

							$get_countries_res->free();
							?>
						</select>
					</div>
					<div class="form-group col-xs-6">
						<label for="prov">*Province/State:</label>
						<select class="form-control" id="prov" name="prov" placeholder="Select Province/State" required="required">

						</select>
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