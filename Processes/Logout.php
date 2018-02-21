<?php
include "../Shared/connection.php";
$query = "DELETE FROM sessions WHERE account_id = " . $con->real_escape_string($_COOKIE["account_id"]) . ";";
$con->query($query);
unset($_COOKIE['account_id']);
unset($_COOKIE['token']);
header("Location: ../Index.php");
?>