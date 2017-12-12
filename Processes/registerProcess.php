<?php
$email = $fname = $lname = $pass = $confirmPass = $dob = $phone = $country = $state = $city = $address = $zip = "";
$emailErr = $fnameErr = $lnameErr = $passErr = $confirmPassErr = $dobErr = $phoneErr = $countryErr = $stateErr = $cityErr = $addressErr = $zipErr = "";
$errorMsg = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["email"])){
		$emailErr = "Email is required";
		$error = true;
	} else{

	}

	if(empty($_POST["fname"])){
		$fnameErr = "First Name is required";
		$error = true;
	} else{

	}

	if(empty($_POST["lname"])){
		$lnameErr = "Last Name is required";
		$error = true;
	} else{

	}
	
	if(empty($_POST["pass"])){
		$passErr = "Password is required";
		$error = true;
	} else{

	}

	if(empty($_POST["dob"])){
		$dobErr = "Date of Birth is required";
		$error = true;
	} else{

	}

	if(empty($_POST["phone"])){
		$phoneErr = "Phone Number is required";
		$error = true;
	} else{

	}

	if(empty($_POST["country"])){
		$countryErr = "Country is required";
		$error = true;
	} else{

	}

	if(empty($_POST["state"])){
		$stateErr = "State/Province is required";
		$error = true;
	} else{

	}

	if(empty($_POST["city"])){
		$cityErr = "City is required";
		$error = true;
	} else{

	}

	if(empty($_POST["address"])){
		$addressErr = "Address is required";
		$error = true;
	} else{

	}

	if(empty($_POST["zip"])){
		$zipErr = "Zip Code is required";
		$error = true;
	} else{

	}

	if($error){
		$errorMsg = "* Please fill out all fields correctly\n
					(Tip: Hover your mouse over a field to get help)";
	}
}

?>