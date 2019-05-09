<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

if(isset($_SESSION['username'], $_GET['user'])){
	$clear_user = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_STRING);
	$clearer = false;
	if($delete_stmt = $mysqli->prepare("UPDATE Users SET static = ?, cleared = ? WHERE username = ?")){
		$delete_stmt->bind_param('sss', $clearer, $clearer, $clear_user);
		$delete_stmt->execute();
	}
	if($clear_cart = "SELECT id, username FROM Carts"){
		$result = $mysqli->query($clear_cart);
		while($row = $result->fetch_assoc()){
			if($row['username'] == $clear_user){
				if($delete_purchase = $mysqli->prepare("DELETE FROM Carts WHERE id = ?")){
					$delete_purchase->bind_param('s', $row['id']);
					$delete_purchase->execute();
				}
			}
		}
	}
	header("Location: dashboard.php");
	exit();
}


?>