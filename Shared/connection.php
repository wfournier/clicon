<?php
$host="localhost";
$user="root";
$password="";
$dbname="gamecon";

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());

?>
