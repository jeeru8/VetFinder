<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

if(isset($_SESSION['username'], $_GET['id'])){
	$vet_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
	if($delete_stmt = $mysqli->prepare("DELETE FROM Products WHERE id = ?")){
		$delete_stmt->bind_param('s', $vet_id);
		$delete_stmt->execute();
	}
	header("Location: dashboard.php");
	exit();
}


?>