<?php
$p = $_POST;

$loginEmailErr = $loginPassErr = false;
$loginErrMsg = $loginOutput = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if($p["process"] == "login"){
		if(empty($p["emailLogin"])){
			$loginEmailErr = $error = true;
			$loginErrMsg = "Invalid email/password";
		} else{
			$get_account_sql = "SELECT * FROM ACCOUNT WHERE EMAIL = '" .clean($p["emailLogin"]) ."'";
			$get_account_res=$con->query($get_account_sql) or die("get_account_res: " .$con->error);

			if($get_account_res->num_rows < 1){
				$loginEmailErr = $error = true;
				$loginErrMsg = "No account with this email";
			} else{
				if(empty($p["passLogin"])){
					$loginPassErr = $error = true;
					$loginErrMsg = "Invalid Password 1";
				} else{
					$password = $p["passLogin"];
					$hash = password_hash($password, PASSWORD_BCRYPT);

					while($account = $get_account_res->fetch_array()){
						if(password_verify($password, $hash)){
							$loginOutput = "Login Successful!";
						} else{
							$loginErrMsg = "Invalid Password 2";
						}
					}
				}
			}
			$get_account_res->free();
		}
	}
}

?>