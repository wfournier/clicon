<?php
$email = $fname = $lname = $pass = $confirmPass = $dob = $phone = $country = $state = $city = $address = $zip = "";
$emailErr = $fnameErr = $lnameErr = $passErr = $confirmPassErr = $dobErr = $phoneErr = $countryErr = $stateErr = $cityErr = $addressErr = $zipErr = false;
$errorMsg = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["email"])){
		$emailErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["fname"])){
		$fnameErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["lname"])){
		$lnameErr = true;
		$error = true;
	} else{

	}
	
	if(empty($_POST["pass"])){
		$passErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["dob"])){
		$dobErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["phone"])){
		$phoneErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["country"])){
		$countryErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["state"])){
		$stateErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["city"])){
		$cityErr = "City is required";
		$error = true;
	} else{

	}

	if(empty($_POST["address"])){
		$addressErr = true;
		$error = true;
	} else{

	}

	if(empty($_POST["zip"])){
		$zipErr = true;
		$error = true;
	} else{

	}

	if($error){
		$errorMsg = nl2br("* Please fill out all fields correctly \n
					(Tip: Hover your mouse over a field to get help)");
	}
}

?>