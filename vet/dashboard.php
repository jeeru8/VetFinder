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
			<a class="active item" href="dashboard.php">Profile</a>
			<a class="item" href="settings.php">Settings</a>
		</div>
		<div class="right item">
			<a href="../includes/logout.php"><button class="ui tiny inverted red button" style="float:right;">Logout</button></a>
		</div>
	</div>

	<div class="ui center aligned segment">
	  <div class="ui two column very relaxed grid">
		  <?php
		  	if($check_verified = $mysqli->prepare("SELECT name,address,email,valid,picture,schedule_from,schedule_to,schedule_time,schedule_time2 FROM Clinic WHERE username = ?")){
		  		$check_verified->bind_param('s', $_SESSION['username']);
		  		$check_verified->execute();
		  		$check_verified->store_result();
		  		$check_verified->bind_result($bname, $baddress, $email, $verified, $picture, $schedule_from, $schedule_to, $schedule_time, $schedule_time2);
		  		$check_verified->fetch();
		  		echo '<div class="column"><img class="ui avatar image" src="vet_avatar/'.$picture.'" style="height:200px;width:200px;"></div>';
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
	<div class="ui three item menu" ng-init="activeItem = 'services'">
		<a class="item" ng-class="{'active':activeItem === 'services'}" ng-click="showServices(); activeItem = 'services'">Services</a>
		<a class="item" ng-class="{'active':activeItem === 'inbox'}" ng-click="showInbox(); activeItem = 'inbox'">Inbox</a>
		<a class="item" ng-class="{'active':activeItem === 'transactions'}" ng-click="showTransactions(); activeItem = 'transactions'">Transactions</a>
	</div>
	<br>
	<div class="services" ng-show="isServices">
		<div class="ui grid">
			<div class="six wide column">
				<a class="ui tiny blue inverted button" style="float:right;" ng-click="addVet();">Add</a>
				<h3 class="ui dividing header">Veterinarians</h3>
				<div class="ui segment" ng-show="isAddVet">
					<form class="ui form" method="post" name="add_vet" action="add_vet.php" enctype="multipart/form-data">
						<h3>Name</h3>
						<input type="text" placeholder="Name" name="name" id="name"/>
						<h3>Academe</h3>
						<input type="text" placeholder="Academe" name="academe" id="academe"/>
						<h3>Avatar/Picture</h3>
						<input type="file" placeholder="Avatar" name="image" id="image"/>
						<div>
                        	<br>
                        	<input class="ui small green submit button" type="submit" name="submit"></input>
                        	<a class="ui small inverted red button" ng-click="addVetCancel();">Cancel</a>
                    	</div>
					</form>
				</div>
				<div class="ui ordered list" ng-hide="isAddVet">
					<?php

						if($get_vets = "SELECT id, name, avatar, academe, vet_uname FROM Vet ORDER BY id DESC"){
							$result = $mysqli->query($get_vets);
							while($row = $result->fetch_assoc()){
								if($row['vet_uname'] == $_SESSION['username']){
									echo '<br><div class="item" id="doctor">';
									echo '<img class="ui avatar image" src="../img/vet_avatar/'.$row['avatar'].'">';
									echo '<div class="content"><div class="header">'.$row['name'].'</div>'.$row['academe'];
									echo '</div><a class="ui inverted red tiny button" style="float:right;" href="delete_vet.php?id='.$row['id'].'">Delete</a></div><br>';
								}
							}
						}

					?>
                </div>
			</div>
			<div class="ten wide column">
				<a class="ui tiny blue inverted button" style="float:right;" ng-click="addProduct();">Add</a>
				<h3 class="ui dividing header">Products/Service</h3>
				<div class="ui segment" ng-show="isAddProduct">
					<form class="ui form" method="post" name="add_vet" action="add_product.php" enctype="multipart/form-data">
						<h3>Produc Name / Service Name</h3>
						<input type="text" placeholder="Name" name="name" id="name"/>
						<h3>Cost</h3>
						<input type="text" placeholder="Price" name="price" id="price"/>
						<h3>Picture</h3>
						<input type="file" placeholder="Picture" name="image" id="image"/>
						<div>
                        	<br>
                        	<input class="ui small green submit button" type="submit" name="submit"></input>
                        	<a class="ui small inverted red button" ng-click="addProductCancel();">Cancel</a>
                    	</div>
					</form>
				</div>
				<div class="ui three stackable cards" ng-hide="isAddProduct">
					<?php

						if($get_products = "SELECT id, name, price, image, vet_uname FROM Products ORDER BY id DESC"){
							$result = $mysqli->query($get_products);
							while($row = $result->fetch_assoc()){
								if($row['vet_uname'] == $_SESSION['username']){
									echo '<div class="card"><div class="ui image"><img src="../img/product_img/'.$row['image'].'"></div>';
									echo '<div class="content"><div class="header">'.$row['name'].'</div>';
									echo '<div class="description"><a class="ui tiny right floated blue label">P '.$row['price'].'</a></div></div>';
									echo '<br><br><a class="ui bottom red attached button" href="delete_product.php?id='.$row['id'].'"><i class="minus icon"></i>Delete</a>';
									echo '</div>';
								}
							}
						}

					?>
				</div>
			</div>
		</div>
	</div>
	<div class="inbox" ng-show="isInbox">
		<div class="row">
			<div class="col-md-12">
				<h3 class="ui dividing header">Approve Book Consultations</h3>
				 <table class="table">
						    <thead>
						      <tr>
						        <th>ID</th>
						        <th>Message</th>
						        <th>Consultation Date</th>
						        <th>Status</th>
						        <th>Actions</th>
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

									$sql = "SELECT * FROM consult";
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
									        echo '<td>';
									        if($row['approve']=='1'){
									        	echo "Approved";
									        }

									        else{
									        	echo "Declined";
									        }
									        
									        echo '</td>';
									        echo '<td>';
									        echo '<a class="btn btn-success" href="approve.php?id='.$row['id'].'">Approve</a>';
									        echo '<a class="btn btn-danger" href="approve2.php?id='.$row['id'].'">Decline</a>';
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
	<div class="transactions" ng-show="isTransactions">
		<?php

			if($get_user = "SELECT username,static,cleared FROM Users"){
				$usr_res = $mysqli->query($get_user);
				while($usr = $usr_res->fetch_assoc()){
					if($usr['static'] == true){
						echo '<div class="ui segment"><h3>'.$usr['username'].'</h3>';
						if($usr['cleared'] == false){
							echo '<table class="ui celled table"><thead><tr><th>Product</th><th>Price</th><th>Provider</th></tr></thead><tbody>';
							if($get_purchases = "SELECT username,product_id,price FROM Carts"){
								$pur_res = $mysqli->query($get_purchases);
								while($pur = $pur_res->fetch_assoc()){
									if($get_product = $mysqli->prepare("SELECT name,price,vet_uname FROM Products WHERE id = ?")){
										$get_product->bind_param('s', $pur['product_id']);
										$get_product->execute();
										$get_product->store_result();
										$get_product->bind_result($productname, $pprice, $source);
										$get_product->fetch();
										if($source == $_SESSION['username']){
											echo '<tr>';
											echo '<td>'.$productname.'</td>';
											echo '<td>'.$pprice.'</td>';
											echo '<td>'.$source.'</td>';
											echo '</tr>';
										}
									}
								}
							}
							echo '</tbody></table>';
							echo '<a class="ui green inverted button" href="verify.php?user='.$usr['username'].'">Verify</a></div>';
						}else{
							echo '<div class="ui success message">Transaction Verified</div>';
							echo '<a class="ui red inverted button" href="clear.php?user='.$usr['username'].'">Clear</a></div>';
						}
					}
				}
			}
						
			/*
			if($get_users = "SELECT name, username, static, cleared FROM Users"){
				$result = $mysqli->query($get_users);
				while($row = $result->fetch_assoc()){
					echo '<div class="ui segment">';
					echo '<h3>'.$row['username'].'</h3>';
					echo '<table class="ui celled table">';
					echo '<thead><tr><th>Product</th><th>Price</th><th>Provider</th></tr></thead>';
					echo '<tbody>';
					if($row['cleared'] == false){
						if($get_cart = "SELECT id,username,product_id,price,static,cleared FROM Carts")){
							$getc = $mysqli->query($get_cart);
							$
						}
					}
					echo '</tbody>';
					echo '</table>';
					echo '</div>';
				}
			}
			*/
		?>
	</div>

</div>
</body>