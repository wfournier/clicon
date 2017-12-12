<?php
$p = $_POST;

$email = $fname = $lname = $pass = $dob = $phone = $countryId = $state = $city = $address = $zip = "";
$emailErr = $fnameErr = $lnameErr = $passErr = $confirmPassErr = $dobErr = $phoneErr = $countryIdErr = $stateErr = $cityErr = $addressErr = $zipErr = false;

$errorMsg = $output = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if($p["process"] == "register"){
		if(empty($p["email"])){
			$emailErr = $error = true;
		} else{
			if((bool)preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", clean($p["email"]))){
				$email = clean($p["email"]);
			} else{
				$emailErr = $error = true;
			}
		}

		if(empty($p["fname"])){
			$fnameErr = $error = true;
		} else{
			if(ctype_alpha(gut($p["fname"]))){
				$fname = clean($p["fname"]);
			} else{
				$fnameErr = $error = true;
			}
		}

		if(empty($p["lname"])){
			$lnameErr = $error = true;
		} else{
			if(ctype_alpha(gut($p["lname"]))){
				$lname = clean($p["lname"]);
			} else{
				$lnameErr = $error = true;
			}
		}

		if(empty($p["pass"])){
			$passErr = $error = true;
		} else{
			if(strlen($p["pass"]) >= 8 && (bool)preg_match('/[A-Z]/', $p["pass"]) && !ctype_alpha($p["pass"]) && !ctype_digit($p["pass"]) && !strpos($p["pass", " ")){
				$pass = clean($clean($p["pass"]));
			} else{
				$passErr = $error = true;
			}
		}

		if(empty($p["confirmPass"]) || $p["pass"] != $p["confirmPass"]){
			$passErr = $error = true;
		}

		if(empty($p["dob"])){
			$dobErr = $error = true;
		} else{
			$time = strtotime($p["dob"]);
			if($time != false){
				$dob = date('Y-m-d', $time);
			} else{
				$dobErr = $error = true;
			}
		}

		if(empty($p["phone"])){
			$phoneErr = $error = true;
		} else{
			if((bool)preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/', $p["phone"])){
				$phone = clean($p["phone"]);
			}
		}

		if(empty($p["countryId"])){
			$countryErr = $error = true;
		} else{
			$countryId = $p["countryId"];
		}

		if(empty($p["state"])){
			$stateErr = $error = true;
		} else{
			if(strlen($p["state"]) == 2 && gut(ctype_alpha($p["state"]))){
				$state = clean($p["state"]);
			} else{
				$stateErr = $error = true;
			}
		}

		if(empty($p["city"])){
			$cityErr = $error = true;
		} else{
			if(ctype_alpha(gut($p["city"]))){
				$city = clean($p["city"]);
			} else{
				$cityErr = $error = true;
			}
		}

		if(empty($p["address"])){
			$addressErr = $error = true;
		} else{
			if((bool)preg_match('\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\.', $p["address"])){
				$address = clean($p["address"]);
			} else{
				$addressErr = $error = true;
			}
		}

		if(empty($p["zip"])){
			$zipErr = $error = true;
		} else{
			if((bool)preg_match('(^\d{5}(-\d{4})?$)|(^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$)', $p["zip"])){
				$zip = clean($p["zip"]);
			} else{
				$zipErr = $error = true;
			}
		}

		if($error){
			$errorMsg = nl2br("*Please fill out all fields correctly \n
				(Tip: Hover your mouse over a field to get help)");
		} else{
			$output = "Success!";
		}
	}
}

function clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}

function gut($string){
	$string = str_replace('-', '', $string);
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

	return $string;
}

?>