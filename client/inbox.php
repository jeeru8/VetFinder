

<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';
require '../includes/session_init.php';

session_start();
session_regenerate_id();

if(!isset($_SESSION['username'])){
	http_response_code(401);
	header("Location: ../includes/logout.php");
	exit();
}

$clinic_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../components/reset.css">
	<link rel="stylesheet" type="text/css" href="../components/site.css">
	<link rel="stylesheet" type="text/css" href="../components/container.css">
	<link rel="stylesheet" type="text/css" href="../components/grid.css">
	<link rel="stylesheet" type="text/css" href="../components/header.css">
	<link rel="stylesheet" type="text/css" href="../components/image.css">
	<link rel="stylesheet" type="text/css" href="../components/menu.css">
	<link rel="stylesheet" type="text/css" href="../components/divider.css">
	<link rel="stylesheet" type="text/css" href="../components/dropdown.css">
	<link rel="stylesheet" type="text/css" href="../components/segment.css">
	<link rel="stylesheet" type="text/css" href="../components/button.css">
	<link rel="stylesheet" type="text/css" href="../components/card.css">
	<link rel="stylesheet" type="text/css" href="../components/label.css">
	<link rel="stylesheet" type="text/css" href="../components/reveal.css">
	<link rel="stylesheet" type="text/css" href="../components/rating.css">
	<link rel="stylesheet" type="text/css" href="../components/popup.css">
	<link rel="stylesheet" type="text/css" href="../components/dimmer.css">
	<link rel="stylesheet" type="text/css" href="../components/list.css">
	<link rel="stylesheet" type="text/css" href="../components/icon.css">
	<link rel="stylesheet" type="text/css" href="../components/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../components/transition.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/semantic.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../assets/library/jquery.min.js"></script>
	<script src="../js/angular.min.js"></script>
	<script src="../js/vet.js"></script>
	<script src="../components/popup.js"></script>
	<script src="../components/dimmer.js"></script>
	<script src="../components/rating.js"></script>
	<script src="../components/visibility.js"></script>
	<script src="../components/sidebar.js"></script>
	<script src="../components/transition.js"></script>
	<script src="../js/sha512.js"></script>
	<script src="../js/semantic.js"></script>
	<script src="../js/navbar_mod.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<style>
#directory-header{
	font-family: Roboto;
	font-size: 40px;
}
#directory-sub{
	font-family: Roboto;
	font-size: 30px;
}


body{
	background-image: url("../photos/2.jpg");
  background-repeat: no-repeat, repeat;
  
}
</style>
<body ng-app="vetApp">
<br>
<div class="ui container" ng-controller="vetController">
	<div class="ui large secondary pointing menu" style="border:0px;">
		<a class="toc item"><i class="sidebar icon"></i></a>
		<div class="left item">
			<a class="active item" href="dashboard.php">Consultation Inbox</a>
			
		</div>
		<div class="right item">
			<a href="dashboard.php" class="btn btn-info">Go Back</a>
			&nbsp;&nbsp;
			<a href="../includes/logout.php"><button class="ui tiny inverted red button" style="float:right;">Logout</button></a>
		</div>
	</div>


	<div class="services">
		<div class="row">
			<div class="col-md-12">
				<h3 class="ui dividing header">Approved Booked Consultations</h3>
				 <table class="table">
						    <thead>
						      <tr>
						        <th>ID</th>
						        <th>Message</th>
						        <th>Consultation Date</th>
						      </tr>
						    </thead>
						    <tbody>
						      <?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "ovcp";

									// Create connection
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									// Check connection
									if (!$conn) {
									    die("Connection failed: " . mysqli_connect_error());
									}

									$sql = "SELECT * FROM consult WHERE approve='1'";
									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) > 0) {
									    // output data of each row
									    while($row = mysqli_fetch_assoc($result)) {
									        
									        echo '<tr class="table-success">';
									        echo '<td>';
									        echo $row['id'];
									        echo '</td>';
									        echo '<td>';
									        echo $row['message'];
									        echo '</td>';
									        echo '<td>';
									        echo $row['consult_date'];
									        echo '</td>';
									        echo '</tr>';
									    }
									} else {
									    echo "0 results";
									}

									mysqli_close($conn);
									?>
						    </tbody>
						  </table>
				
			</div>
			
		</div>
	</div>
	<div class="inbox" ng-show="isInbox">
		Inbox
	</div>
	<div class="transactions" ng-show="isTransactions">
		Transactions
	</div>

</div>
</body>