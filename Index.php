<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="gamecon";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "Shared/Head.html" ?>
	<title>$Title$</title>
</head>
<body>
	<?php include "Shared/Header.html" ?>

	<p>Test</p>

	<?php include "Shared/Footer.html" ?>
</body>
</html>