<?php

$forgotPassEmail = "";

$forgotPassEmailErr = false;
$error = false;

$forgotPassOutput = $forgotPassErrMsg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$p = $_POST;
	if($_POST["process"] == "forgotPass"){
		if(empty($p["forgotPassEmail"])){
			$forgotPassEmailErr = $error = true;
			$forgotPassErrMsg = "Invalid email";
		} else{
			if((bool)preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i", clean($p["forgotPassEmail"]))){
				$forgotPassEmail = $p["forgotPassEmail"];

				$get_email_sql = "SELECT * FROM ACCOUNT WHERE EMAIL = '" .clean($forgotPassEmail) ."'";
				$get_email_res = $con->query($get_email_sql) or die("get_email_res:" .$get_email_sql);

				if($get_email_res->num_rows == 1){
					$token = bin2hex(random_bytes(64/2));

					$account = $get_email_res->fetch_array();

					$insert_token_sql = "UPDATE ACCOUNT SET PASS_RESET_TOKEN = '" .$token ."', TOKEN_EXPIRY = '" .date('Y-m-d H:i:s', time() + 24 * 60 * 60) ."' WHERE EMAIL ='" .clean($forgotPassEmail) ."'";

					if($con->query($insert_token_sql) === TRUE){
						sendResetToken($account, $token);
						$forgotPassOutput = "An email with the recovery link was sent to your inbox";
					} else{
						$forgotPassErrMsg = nl2br("Failed to create recovery token \n Please try again");
					}
				} else{
					$forgotPassEmailErr = $error = true;
					$forgotPassErrMsg = "No account with this email";
				}
			} else{
				$forgotPassEmailErr = $error = true;
				$forgotPassErrMsg = "Invalid Email";
			}
		}
	}
}

function sendResetToken($account, $token){
	$fname = $account["FIRST_NAME"];
	$url = "localhost/gamecon/ResetPassword.php?token=" .$token;

	$to = $account["EMAIL"];
	$subject = "Gamecon Password Recovery";
	$message = nl2br("Dear " .$fname .",\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website.\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n<a href='$url'>Reset Password</a>\n\nPlease note that the link will expire in 24 hours.\n\nThank you,\nThe Administration");
	$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

	mail($to, $subject, $message, $headers);
}

?>