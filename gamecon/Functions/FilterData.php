<?php

function clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}

function gut($string){
	$string = str_replace('-', '', $string);
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

	return $string;
}

?>