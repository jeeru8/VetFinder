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
			<a class="item" href="dashboard.php">Profile</a>
			<a class="active item" href="settings.php">Settings</a>
		</div>
		<div class="right item">
			<a href="../includes/logout.php"><button class="ui tiny inverted red button" style="float:right;">Logout</button></a>
		</div>
	</div>

	<div class="ui center aligned segment">
	  <div class="ui two column very relaxed grid">
		  <?php
		  	if($check_verified = $mysqli->prepare("SELECT name,address,email,valid,picture,schedule_from,schedule_to,schedule_time,schedule_time2 ,description FROM Clinic WHERE username = ?")){
		  		$check_verified->bind_param('s', $_SESSION['username']);
		  		$check_verified->execute();
		  		$check_verified->store_result();
		  		$check_verified->bind_result($bname, $baddress, $email, $verified, $picture, $schedule_from, $schedule_to, $schedule_time, $schedule_time2, $description);
		  		$check_verified->fetch();
		  		echo '<div class="column"><img class="ui avatar image" src="vet_avatar/'.$picture.'" style="height:200px;width:200px;"><b>Business Description:</b> '.$description.'</div>';
		  	
		  		echo '<div class="column"><h3 class="header" style="margin-top:15%;margin-bottom:1%;">'.$bname.'</h3>';
		  		if(!empty($baddress)){
		  			echo '<a class="ui small blue label" style="margin-top:1%;">'.$baddress.'</a>';
		  		}
		  		if(!empty($email)){
		  			echo '<a class="ui small blue label" style="margin-top:1%;">'.$email.'</a>';
		  		}


		  		if($verified == true){
		  		echo '<div class="ui green label"><i class="ui check icon"></i>Verified Business</div></div>';
		  		}

		  		echo '<h1 class="alert alert-info">Schedule:</h1>';

		  		if(!empty($schedule_from)){
		  			echo '<h2 class="alert alert-success" style="margin-top:1%;">'.$schedule_from.'-'.$schedule_to.' <br>Time: '.$schedule_time.' to '.$schedule_time2.'</h2>';
		  		}

		  		
		  	}
		  ?>
	  </div>
	</div>
	<div class="ui segment">
		<div class="ui grid">
			<div class="four wide column">
				<form class="ui form" method="post" name="change_name" action="change_settings.php">
					<h3 class="ui dividing header">Name</h3>
					<input type="text" name="name" placeholder="Name" id="name">
					<br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>
			<div class="four wide column">
				<form class="ui form" method="post" name="change_address" action="change_settings.php">
					<h3 class="ui dividing header">Address</h3>
					<input type="text" name="address" placeholder="Address" id="address">
					<br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>
			<div class="four wide column">
				<form class="ui form" method="post" name="change_picture" action="change_settings.php" enctype="multipart/form-data">
					<h3 class="ui dividing header">Picture</h3>
					<input type="file" name="image" placeholder="Image" id="image">
					<br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>
			<div class="four wide column">
				<form class="ui form" method="post" name="change_email" action="change_settings.php">
					<h3 class="ui dividing header">Email</h3>
					<input type="text" name="email" placeholder="Email" id="email">
					<br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>

			<div class="four wide column">
				<form class="ui form" method="post" name="change_schedule1" action="change_settings.php">
					<h3 class="ui dividing header">Schedule From</h3>
					<select class="form-control" name="schedule_from">
						<option>Sunday</option>
						<option>Monday</option>
						<option>Tuesday</option>
						<option>Wednesday</option>
						<option>Thursday</option>
						<option>Friday</option>
						<option>Saturday</option>
					</select>
					<br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>


			<div class="four wide column">
				<form class="ui form" method="post" name="change_schedule2" action="change_settings.php">
					<h3 class="ui dividing header">Schedule To</h3>
					<select class="form-control" name="schedule_to">
						<option>Sunday</option>
						<option>Monday</option>
						<option>Tuesday</option>
						<option>Wednesday</option>
						<option>Thursday</option>
						<option>Friday</option>
						<option>Saturday</option>
					</select>
					<br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>

			<div class="four wide column">
				<form class="ui form" method="post" name="change_time1" action="change_settings.php">
					<h3 class="ui dividing header">Time From</h3>
					<input type="time" name="schedule_time" placeholder="Email" id="time">
					<br><br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>

			<div class="four wide column">
				<form class="ui form" method="post" name="change_time2" action="change_settings.php">
					<h3 class="ui dividing header">Time To</h3>
					<input type="time" name="schedule_time2" placeholder="Email" id="time">
					<br><br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>

			<div class="four wide column">
				<form class="ui form" method="post" name="change_description" action="change_settings.php">
					<h3 class="ui dividing header">Describe Your Product/Services Offered</h3>
					<textarea class="form-control" name="description"></textarea>
					<br><br><br>
					<input class="ui small green submit button" type="submit" name="submit"></input>
				</form>
			</div>

			
		</div>
	</div>
</div>
</body>