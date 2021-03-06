<?php
$fnameMod = $lnameMod = $phoneMod = $countryIdMod = $stateCodeMod = $stateIdMod = $cityMod = $addressMod = $zipMod = $passMod = $passHash = "";
$fnameModErr = $lnameModErr = $phoneModErr = $countryIdModErr = $stateCodeModErr = $cityModErr = $addressModErr = $zipModErr = $passModErr = false;

$currPass = $newPass = $confirmNewPass = "";
$currPassErr = $newPassErr = $confirmNewPassErr = false;

$modPassErr = $changePassErr = false;
$modErrMsg = $modOutput = $changePassErrMsg = "";
$error = false;

$get_account_info_sql = "SELECT a.FIRST_NAME, a.LAST_NAME, a.PHONE, a.COUNTRY_ID, s.STATE_CODE, a.CITY, a.ADDRESS, a.ZIP, a.PASS_HASH FROM account a, states s WHERE a.ACCOUNT_ID = " . func::getConnection()->real_escape_string($_COOKIE['account_id']) ." AND s.STATE_ID = a.STATE_ID";
$get_account_info_res = func::getConnection()->query($get_account_info_sql) or die("get_account_info_res: " .func::getConnection()->error);

while($account = $get_account_info_res->fetch_array()){
	$fnameMod = $account["FIRST_NAME"];
	$lnameMod = $account["LAST_NAME"];
	$phoneMod = $account["PHONE"];
	$countryIdMod = $account["COUNTRY_ID"];
	$stateCodeMod = $account["STATE_CODE"];
	$cityMod = $account["CITY"];
	$addressMod = $account["ADDRESS"];
	$zipMod = $account["ZIP"];
	$passHash = $account["PASS_HASH"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$p = $_POST;
	if ($p["process"] == "modify") {
		if(empty($p["fnameMod"]))
			$fnameModErr = $error = true;
		else{
			if(ctype_alpha(gut($p["fnameMod"])))
				$fnameMod = clean($p["fnameMod"]);
			else
				$fnameModErr = $error = true;

		}

		if(empty($p["lnameMod"]))
			$lnameModErr = $error = true;
		else{
			if(ctype_alpha(gut($p["lnameMod"])))
				$lnameMod = clean($p["lnameMod"]);
			else
				$lnameModErr = $error = true;

		}

		if(empty($p["phoneMod"]))
			$phoneModErr = $error = true;
		else{
			if((bool)preg_match('/^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/', clean($p["phoneMod"])))
				$phoneMod = gut($p["phoneMod"]);
			else
				$phoneModErr = $error = true;

		}

		if(empty($p["countryIdMod"]))
			$countryErr = $error = true;
		else
			$countryIdMod = $p["countryIdMod"];

		if(empty($p["stateCodeMod"]))
			$stateCodeModErr = $error = true;
		else{
			if(strlen($p["stateCodeMod"]) == 2 && ctype_alpha(gut($p["stateCodeMod"]))){
				$get_states_sql="SELECT * FROM states WHERE COUNTRY_ID = " . func::getConnection()->real_escape_string($countryIdMod) ." AND STATE_CODE = '" . func::getConnection()->real_escape_string(strtoupper($p["stateCodeMod"])) ."'";
				$get_states_res=func::getConnection()->query($get_states_sql) or die("get_states_res: " .func::getConnection()->error);

				if($get_states_res->num_rows < 1)
					$stateCodeModErr = $error = true;
				else{
					while($states = $get_states_res->fetch_array()){
						$stateIdMod = $states["STATE_ID"];
						$stateCodeMod = $states["STATE_CODE"];
					}
				}
			} else
				$stateCodeModErr = $error = true;
		}

		if(empty($p["cityMod"]))
			$cityModErr = $error = true;
		else{
			if(ctype_alpha(gut($p["cityMod"])))
				$cityMod = clean($p["cityMod"]);
			else
				$cityModErr = $error = true;
		}

		if(empty($p["addressMod"]))
			$addressModErr = $error = true;
		else{
			if((bool)preg_match("~[0-9]~", $p["addressMod"] && (bool)preg_match("/[a-z]/i", $p["addressMod"]) && strpos($p["addressMod"], " ")))
				$addressMod = clean($p["addressMod"]);
			else
				$addressModErr = $error = true;
		}

		if(empty($p["zipMod"]))
			$zipModErr = $error = true;
		else{
			if((bool)preg_match("/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/", str_replace(' ', '', strtolower(clean($p["zipMod"])))))
				$zipMod = clean($p["zipMod"]);
			else
				$zipModErr = $error = true;

		}

		if($error)
			$modErrMsg = nl2br($lang("err_msg"));
		else{
			$passMod = $p["passMod"];
			if(password_verify($passMod, $passHash)){
                $lname = ucwords(strtolower($lnameMod), " ");
                $fname = ucwords(strtolower($fnameMod), " ");
                $phone = str_replace('-', '/', $phoneMod);
                $address = ucwords(strtolower($addressMod), " ");
                $city = ucwords(strtolower($cityMod), " ");
                $zip = strtoupper(str_replace(' ', '', $zipMod));

                $worked = func::UpdateAccount($lname, $fname, $phone, $address, $city, $zip, $countryIdMod, $stateIdMod);
                if ($worked)
					$modOutput = $lang("changes_saved");
				else
					$modErrMsg = "Error: " . $updateSql . "<br>" . func::getConnection()->error;
			} else{
				$passModErr = $error = true;
				$modErrMsg = "Password is incorrect";
			}
		}
	} else if($p["process"] == "changePassword"){
		$currPass = $p["currPass"];
		if(password_verify($currPass, $passHash)){
			if(empty($p["newPass"]))
				$newPassErr = $changePassErr = true;
			else{
				if(strlen($p["newPass"]) >= 8 && (bool)preg_match('/[A-Z]/', $p["newPass"]) && !ctype_alpha($p["newPass"]) && !ctype_digit($p["newPass"]) && !strpos($p["newPass"], " "))
					$newPass = clean($p["newPass"]);
                else
					$newPassErr = $changePassErr = true;
			}

			if(empty($p["confirmNewPass"]) || $p["newPass"] != $p["confirmNewPass"]){
				$confirmNewPassErr = $changePassErr = true;
			}

			if($changePassErr)
				$changePassErrMsg = nl2br($lang("err_msg"));
			else{

				$worked1 = func::UpdatePass(password_hash($newPass, PASSWORD_BCRYPT));
				if ($worked1)
					header("Location: /clicon/Account/ModifyInfo.php?passChanged=true");
				else
					$changePassErrMsg = "Error: " . $update_pass_sql . "<br>" . func::getConnection()->error;
				
			}
		} else{
			$currPassErr = true;
			$changePassErrMsg = $lang("incorrect_curr_pass");
		}
	}
}
?>