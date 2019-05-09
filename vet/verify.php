<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

if(isset($_SESSION['username'], $_GET['user'])){
	$user = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_STRING);
	$status = true;
	if($set_checkout = $mysqli->prepare("UPDATE Users SET cleared = ? WHERE username = ?")){
		$set_checkout->bind_param('ss', $status, $user);
		$set_checkout->execute();
	}
	header("Location: dashboard.php");
	exit();
}