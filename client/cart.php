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
	<link rel="stylesheet" type="text/css" href="../components/table.css">
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
	background-image: url("../photos/1.jpg");
  background-repeat: no-repeat, repeat;
  
}
</style>
<body ng-app="vetApp">
<br>
<div class="ui container" ng-controller="vetController">
	<div class="ui large secondary pointing menu" style="border:0px;">
		<a class="toc item"><i class="sidebar icon"></i></a>
		<div class="left item">
			<a class="item" href="dashboard.php">Directory</a>
			<a class="active item" href="cart.php">Cart</a>
			<a class="item" href="inbox.php">Inbox</a>
		</div>
		<div class="right item">
			<a href="../includes/logout.php"><button class="ui tiny inverted red button" style="float:right;">Logout</button></a>
		</div>
	</div>

	<h1 class="alert alert-success">Payment:</h1>
	<h3 class="alert alert-info">BPI Account Number: 8989 8787 43 Deposit</h3>
	<h3 class="alert alert-info">BDO Deposit Number: 7878 7878 787</h3>

	<!-- <table class="ui celled table">-->

				<?php

					if($get_user = $mysqli->prepare("SELECT static,cleared FROM Users WHERE username = ?")){
						$get_user->bind_param('s', $_SESSION['username']);
						$get_user->execute();
						$get_user->store_result();
						$get_user->bind_result($static,$cleared);
						$get_user->fetch();
						if($static == false){
							echo '<table class="ui celled table"><thead><tr><th>Product</th><th>Price</th><th>Provider</th></tr></thead>';
							if($get_cart = "SELECT id,username,product_id,price FROM Carts"){
								$result = $mysqli->query($get_cart);
								while($row = $result->fetch_assoc()){
									if($row['username'] == $_SESSION['username']){
										if($get_details = $mysqli->prepare("SELECT name,vet_uname FROM Products WHERE id = ?")){
											$get_details->bind_param('s', $row['product_id']);
											$get_details->execute();
											$get_details->store_result();
											$get_details->bind_result($productname,$source);
											$get_details->fetch();
											echo '<tr>';
											echo '<td>'.$productname.'</td>';
											echo '<td>'.$row['price'].'</td>';
											echo '<td>'.$source.'</td>';
											echo '</tr>';
										}
									}
								}
								echo '</tbody></table>';
								echo '<a class="ui small blue button" style="float:right;" href="checkout.php">Checkout</a>';
							}
						}
						else{
							if($cleared == true){
								echo '<div class="ui success message">Your product is now on delivery.</div>';
							}else{
								echo '<div class="ui success message">Checkout successful. Send your payment to have your products delivered.</div>';
							}
						}
					}

					
				?>
</div>
</body>