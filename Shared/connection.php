<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="root";
$dbname="gamecon";

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
?>
