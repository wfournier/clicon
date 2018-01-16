<?php

$badgeName = $emergContact = "";

$error = $badgeNameErr = $emergContactErr = false;
$prefOutput = $prefErrMsg = "";

$get_pref_sql = "SELECT BADGE_NAME, EMERGENCY_CONTACT FROM ACCOUNT WHERE ACCOUNT_ID = " .$_COOKIE["account_id"];
$get_account_info_res = $con->query($get_pref_sql) or die("get_account_info_res: " .$con->error);

while($account = $get_account_info_res->fetch_array()){
	$badgeName = $account["BADGE_NAME"];
	$emergContact = $account["EMERGENCY_CONTACT"];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$p = $_POST;
	if($p["process"] == "pref"){
		if(!empty($p["badgeName"])){
			if((bool)preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $p["badgeName"]) != true && strpos($p["badgeName"], "/") != true){
				$badgeName = clean($p["badgeName"]);
			} else{
				$badgeNameErr = $error = true;
			}
		}

		if(!empty($p["emergContact"])){
			if((bool)preg_match('/^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/', clean($p["emergContact"]))){
				$emergContact = gut($p["emergContact"]);
			} else{
				$emergContactErr = $error = true;
			}
		}

		if($error){
			$prefErrMsg = nl2br("*Please fill out all fields correctly \n
				(Tip: Hover your mouse over a field to get help)");
		} else{
			$update_pref_sql = "UPDATE ACCOUNT SET BADGE_NAME = '" .$badgeName ."', EMERGENCY_CONTACT = '" .str_replace('-', '/', $emergContact) ."' WHERE ACCOUNT_ID = " .$_COOKIE['account_id'];

			if ($con->query($update_pref_sql) === TRUE) {
				$prefOutput = "Preferences Saved!";
			} else {
				$modErrMsg = "Error: " . $update_pref_sql . "<br>" . $con->error;
			}
		}
	}
}

?>