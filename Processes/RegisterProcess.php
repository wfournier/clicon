<?php

$email = $fname = $lname = $pass = $dob = $dobDay = $dobMonth = $dobYear = $isAdult = $phone = $country = $countryId = $stateCode = $stateId = $city = $address = $zip = "";
$emailErr = $fnameErr = $lnameErr = $passErr = $confirmPassErr = $dobErr = $phoneErr = $countryIdErr = $stateErr = $cityErr = $addressErr = $zipErr = false;

$registerErrMsg = $registerOutput = $emailExists = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$p = $_POST;
	if($p["process"] == "register"){
		if(empty($p["emailRegister"])){
			$emailErr = $error = true;
		} else{
			$get_emails_sql="SELECT * FROM ACCOUNT WHERE EMAIL = '" .clean($p["emailRegister"]) ."'";
			$get_emails_res=$con->query($get_emails_sql) or die("get_emails_res: " .$con->error);

			if($get_emails_res->num_rows < 1){
				if((bool)preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", clean($p["emailRegister"]))){
					$email = clean($p["emailRegister"]);
				} else{
					$emailErr = $error = true;
				}
			} else{
				$emailErr = $error = true;
				$emailExists = "Email is already in use";
			}
			$get_emails_res->free();
			
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

		if(empty($p["passRegister"])){
			$passErr = $error = true;
		} else{
			if(strlen($p["passRegister"]) >= 8 && (bool)preg_match('/[A-Z]/', $p["passRegister"]) && !ctype_alpha($p["passRegister"]) && !ctype_digit($p["passRegister"]) && !strpos($p["passRegister"], " ")){
				$pass = clean($p["passRegister"]);
			} else{
				$passErr = $error = true;
			}
		}

		if(empty($p["confirmPass"]) || $p["passRegister"] != $p["confirmPass"]){
			$confirmPassErr = $error = true;
		}

		if(empty($p["dobDay"]) || empty($p["dobMonth"]) || empty($p["dobYear"])){
			$dobErr = $error = true;
		} else{
			if(checkdate($p["dobMonth"], $p["dobDay"], $p["dobYear"])){
				$dobDay = $p["dobDay"];
				$dobMonth = $p["dobMonth"];
				$dobYear = $p["dobYear"];

				$dob = date('Y-m-d', mktime(0, 0, 0, $dobMonth, $dobDay, $dobYear));
				$major = strtotime("-18 years");

				if($dob < $major){
					$isAdult = "TRUE";
				} else{
					$isAdult = "FALSE";
				}
			} else{
				$dobErr = $error = true;
			}
		}

		if(empty($p["phone"])){
			$phoneErr = $error = true;
		} else{
			if((bool)preg_match('/^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/', clean($p["phone"]))){
				$phone = gut($p["phone"]);
			} else{
				$phoneErr = $error = true;
			}
		}

		if(empty($p["countryId"])){
			$countryErr = $error = true;
		} else{
			$countryId = $p["countryId"];
		}

		if(empty($p["stateCode"])){
			$stateErr = $error = true;
		} else{
			if(strlen($p["stateCode"]) == 2 && ctype_alpha(gut($p["stateCode"]))){
				$get_states_sql="SELECT * FROM STATES WHERE COUNTRY_ID = " .$countryId ." AND STATE_CODE = '" .strtoupper($p["stateCode"]) ."'";
				$get_states_res=$con->query($get_states_sql) or die("get_states_res: " .$con->error);

				if($get_states_res->num_rows < 1){
					$stateErr = $error = true;
				} else{
					while($states = $get_states_res->fetch_array()){
						$stateId = $states["STATE_ID"];
						$stateCode = $states["STATE_CODE"];
					}
				}
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
			if((bool)preg_match("~[0-9]~", $p["address"] && (bool)preg_match("/[a-z]/i", $p["address"]) && strpos($p["address"], " "))){
				$address = clean($p["address"]);
			} else{
				$addressErr = $error = true;
			}
		}

		if(empty($p["zip"])){
			$zipErr = $error = true;
		} else{
			if((bool)preg_match("/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/", str_replace(' ', '', strtolower(clean($p["zip"]))))){
				$zip = clean($p["zip"]);
			} else{
				$zipErr = $error = true;
			}
		}

		if($error){
			$registerErrMsg = nl2br("*Please fill out all fields correctly \n
				(Tip: Hover your mouse over a field to get help)");
		} else{
			$insertSql = "INSERT INTO ACCOUNT (ACCOUNT_ID, LAST_NAME, FIRST_NAME, EMAIL, PASS_HASH, DATE_OF_BIRTH, PHONE, ADDRESS, CITY, ZIP, COUNTRY_ID, STATE_ID, IS_ADULT) VALUES (NULL, '" .ucwords(strtolower($lname), " ") ."', '" .ucwords(strtolower($fname), " ") ."', '" .$email ."', '" .password_hash($pass, PASSWORD_BCRYPT) ."', '" .date('Y-m-d', strtotime(str_replace('-', '/', $dob))) ."', '" .str_replace('-', '/', $phone) ."', '" .ucwords(strtolower($address), " ") ."', '" .ucwords(strtolower($city), " ") ."', '" .strtoupper(str_replace(' ', '', $zip)) ."', " .$countryId .", " .$stateId .", '" .$isAdult ."')";

			if ($con->query($insertSql) === TRUE) {
				$registerOutput = "Registered Successfully!";
			} else {
				$registerErrMsg = "Error: " . $insertSql . "<br>" . $con->error;
			}
		}
	}
}

?>