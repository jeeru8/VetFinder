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
			<a class="active item" href="dashboard.php">Directory</a>
			<a class="item" href="cart.php">Cart</a>
			<a class="item" href="inbox.php">Online Consultation</a>
			<a class="item" href="sick.php">List of Animal Sickness</a>

		</div>
		<div class="right item">
			<a href="../includes/logout.php"><button class="btn btn-danger btn-lg" style="float:right;">Logout</button></a>
		</div>
	</div>
	<?php
		if($get_all = "SELECT id,name,address,email,phone,username,valid, schedule_from,schedule_to,schedule_time,schedule_time2,description FROM Clinic"){
			$result = $mysqli->query($get_all);
			while($row = $result->fetch_assoc()){
				echo '<div class="ui segment"><div class="ui center aligned grid"><div class="six wide column">';
				echo '<img class="ui avatar image" src="../photos/doctor.png" style="height:150px;width:150px;">';
				echo '<h3 class="ui dividing header">'.$row['name'].'</h3>';
				if(!empty($row['address'])){
					echo '<a class="ui small blue label" href="location.php"><i class="home icon"></i>'.$row['address'].'</a>';
				}
				if(!empty($row['email'])){
					echo '<a class="ui small blue label"><i class="mail icon"></i>'.$row['email'].'</a>';
				}

				echo '<h1 class="alert alert-info">Schedule:</h1>';

				if(!empty($row['schedule_from'])){
		  			echo '<h2 class="alert alert-success">'.$row['schedule_from'].'-'.$row['schedule_to'].' <br>Time: '.$row['schedule_time'].' to '.$row['schedule_time2'].'</h2>';
		  		}

		  		echo '<h1 class="alert alert-info">Business Description:</h1>';

				if(!empty($row['description'])){
		  			echo '<p class="alert alert-success">'.$row['description'].'</p>';
		  		}

	

				echo '</div>';
				echo '<div class="five wide column">';
				echo '<h4 class="ui dividing header">Products and Services</h4>';
				echo '<div class="ui unordered list">';
				if($get_products = "SELECT id,name,price,image,vet_uname FROM Products LIMIT 2"){
					$prod = $mysqli->query($get_products);
					while($product = $prod->fetch_assoc()){
						if($product['vet_uname'] == $row['username']){
							echo '<div class="ui message"><div class="item">';
							echo '<img class="ui avatar image" src="../img/product_img/'.$product['image'].'" style="height:50px;width:50px;">';
							echo '<div class="content"><p>'.$product['name'].'</p>';
							echo '</div></div></div>';
						}
					}					
				}
				echo '</div><a class="btn btn-info btn-lg" href="vet.php?id='.$row['id'].'">See all Products and Services</a></div>';
				echo '<div class="five wide column">';
				echo '<h4 class="ui dividing header">Veterinarians</h4>';
				echo '<div class="ui ordered list">';
				if($get_vets = "SELECT name, avatar, academe, vet_uname FROM Vet ORDER BY id DESC LIMIT 2"){
					$result_vets = $mysqli->query($get_vets);
					while($vets = $result_vets->fetch_assoc()){
						if($vets['vet_uname'] == $row['username']){
							echo '<div class="item">';
							echo '<img class="ui avatar image" src="../img/vet_avatar/'.$vets['avatar'].'" style="height:50px;width:50px;">';
							echo '<div class="content"><div class="header">'.$vets['name'].'</div>'.$vets['academe'];
							echo '</div></div><br>';
						}
					}
				}
				echo '</div><a class="btn btn-danger btn-lg btn-block" href="vet.php?id='.$row['id'].'">See all Veterinarians</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-lg btn-block" href="vet.php?id='.$row['id'].'">Book Consultation</a></div>';
				echo '</div></div>';






			}
		}
	?>
	<br>
</div>
</body>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4TJ7uWp6hog-VzYEJgGcwC-hLG8mUXZk&callback=myMap"></script>