<?php

$fnameMod = $lnameMod = $phoneMod = $countryIdMod = $stateIdMod = $cityMod = $addressMod = $zipMod = $passMod = "";
$fnameModErr = $lnameModErr = $phoneModErr = $countryIdModErr = $stateIdModErr = $cityModErr = $addressModErr = $zipModErr = $passModErr = false;

$modPassErr = false;
$modErrMsg = $modOutput = "";
$error = false;

$get_account_info_sql = "SELECT a.FIRST_NAME, a.LAST_NAME, a.PHONE, a.COUNTRY_ID, s.STATE_CODE, a.CITY, a.ADDRESS, a.ZIP FROM ACCOUNT a, STATES s WHERE a.ACCOUNT_ID = " .$_COOKIE['account_id'] ." AND s.STATE_ID = a.STATE_ID";
$get_account_info_res = $con->query($get_account_info_sql) or die("get_account_info_res: " .$con->error);

while($account = $get_account_info_res->fetch_array()){
	$fnameMod = $account["FIRST_NAME"];
	$lnameMod = $account["LAST_NAME"];
	$phoneMod = $account["PHONE"];
	$countryIdMod = $account["COUNTRY_ID"];
	$stateIdMod = $account["STATE_CODE"];
	$cityMod = $account["CITY"];
	$addressMod = $account["ADDRESS"];
	$zipMod = $account["ZIP"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($p["process"] == "modify") {



	}
}
?>