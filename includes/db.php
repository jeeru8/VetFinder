<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'OVCP';

$mysqli = mysqli_connect($host,$user,$pass,$database);
if($mysqli->connect_error){
	header("Location: http://localhost/VetFinder/error.php?err=Unable to connect to MySQL");
	exit();
}


?>