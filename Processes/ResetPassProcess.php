<?php
$invalidToken = false;

$newPass = $confirmNewPass = "";
$newPassErr = $confirmNewPassErr = false;

$resetPassErrMsg = $resetPassOutput = "";
$error = false;

if(isset($_GET["token"])){
	$find_token_sql = "SELECT * FROM ACCOUNT WHERE PASS_RESET_TOKEN = '" .$_GET["token"] ."'";
	$find_token_res = $con->query($find_token_sql) or die("find_token_res:" .$con->error);

	if($find_token_res->num_rows < 1){
		$invalidToken = true;
	}

	$tokenExpiryDate = $find_token_res->fetch_array()["TOKEN_EXPIRY"];

	if(strtotime($tokenExpiryDate) < time()){
		$invalidToken = true;

		$delete_token_sql ="UPDATE ACCOUNT SET PASS_RESET_TOKEN = NULL, TOKEN_EXPIRY = NULL WHERE PASS_RESET_TOKEN = '" .$_GET["token"] ."'";
		$con->query($delete_token_sql) or die("delete_token:" .$con->error);
	}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$p=$_POST;
	if($p["process"] == "resetPass"){
		$resetToken = $_POST["token"];

		if(empty($p["newPass"])){
			$newPassErr = $newPassErr = true;
		} else{
			if(strlen($p["newPass"]) >= 8 && (bool)preg_match('/[A-Z]/', $p["newPass"]) && !ctype_alpha($p["newPass"]) && !ctype_digit($p["newPass"]) && !strpos($p["newPass"], " ")){
				$newPass = clean($p["newPass"]);
			} else{
				$newPassErr = $newPassErr = true;
			}
		}

		if(empty($p["confirmNewPass"]) || $p["newPass"] != $p["confirmNewPass"]){
			$confirmNewPassErr = $newPassErr = true;
		}

		if($newPassErr){
			$newPassErrMsg = nl2br("*Please fill out all fields correctly \n
				(Tip: Hover your mouse over a field to get help)");
		} else{
			$update_pass_sql = "UPDATE ACCOUNT SET PASS_HASH = '" .password_hash($newPass, PASSWORD_BCRYPT) ."' WHERE PASS_RESET_TOKEN = '" .$resetToken ."'";

			if ($con->query($update_pass_sql) === TRUE) {
				$get_id_sql = "SELECT ACCOUNT_ID FROM ACCOUNT WHERE PASS_RESET_TOKEN = '" .$resetToken ."'";
				$get_id_res = $con->query($get_id_sql) or die("get_id_res:" .$con->error);

				$account = $get_id_res->fetch_array();

				$delete_token_sql = "UPDATE ACCOUNT SET PASS_RESET_TOKEN = NULL, TOKEN_EXPIRY = NULL WHERE PASS_RESET_TOKEN = '" .$resetToken ."'";
				$con->query($delete_token_sql) or die("delete_token_sql:" .$con->error);

				$loginToken = random_bytes(25);
				setcookie("token", $loginToken, (time() + (89400 * 365)), "/");
				setcookie("account_id", $account["ACCOUNT_ID"], (time() + (89400 * 365)), "/");
				$set_sess = "INSERT INTO sessions (session_accountid, session_token) VALUES (" .
				$account['ACCOUNT_ID'] . ", '" . $loginToken . "');";
				$con->query($set_sess) or die("set session failed " . $con->error);
				header("Location: Index.php");
			} else {
				$changePassErrMsg = "Error: " . $update_pass_sql . "<br>" . $con->error;
			}
		}
	}
}
?>