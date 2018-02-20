<?php
include "../Shared/connection.php";
$query = "DELETE FROM sessions WHERE session_accountid = " . $con->real_escape_string($_COOKIE["account_id"]) . ";";
$con->query($query);
unset($_COOKIE['account_id']);
unset($_COOKIE['token']);
header("Location: ../Index.php");
?>