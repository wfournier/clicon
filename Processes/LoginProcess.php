<?php

$loginEmailErr = $loginPassErr = false;
$loginErrMsg = $loginOutput = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$p = $_POST;
	if ($p["process"] == "login") {
		if (empty($p["emailLogin"])) {
			$loginEmailErr = $error = true;
			$loginErrMsg = "Invalid email/password";
		} else {
			$get_account_sql = "SELECT * FROM account WHERE EMAIL = '" . $con->real_escape_string(clean($p["emailLogin"])) . "'";
			$get_account_res = $con->query($get_account_sql) or die("get_account_res: " . $con->error);

			if ($get_account_res->num_rows < 1) {
				$loginEmailErr = $error = true;
				$loginErrMsg = "No account with this email";
			} else {
				if (empty($p["passLogin"])) {
					$loginPassErr = $error = true;
					$loginErrMsg = "Invalid Password";
				} else {
					$password = $p["passLogin"];

					while ($account = $get_account_res->fetch_array()) {
						if (password_verify($password, $account["PASS_HASH"])) {
							func::login($account["ACCOUNT_ID"]);
						} else {
							$loginErrMsg = "Invalid Password";
						}
					}
				}
			}
			$get_account_res->free();
		}
	}
}

?>