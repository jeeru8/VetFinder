<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

if(isset($_SESSION['username'])){
	$status = true;
	if($set_checkout = $mysqli->prepare("UPDATE Users SET static = ? WHERE username = ?")){
		$set_checkout->bind_param('ss', $status, $_SESSION['username']);
		$set_checkout->execute();
	}
	header("Location: cart.php");
	exit();
}