

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


<?php

if(isset($_REQUEST['consult_submit'])){

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

$message = $_REQUEST['message'];
$consult_date = $_REQUEST['consult_date'];
$consult_by= $_REQUEST['consult_by'];




$sql = "INSERT INTO consult (message,consult_date,consult_by,approve)
VALUES ('$message', '$consult_date', '$consult_by','0')";

if (mysqli_query($conn, $sql)) {
    echo "New booking created successfully";
    echo '<a href="dashboard.php" class="btn btn-success">Go BACK</a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
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
</style>
<body ng-app="vetApp">
<br>
<div class="ui container" ng-controller="vetController">
	<div class="ui large secondary pointing menu" style="border:0px;">
		<a class="toc item"><i class="sidebar icon"></i></a>
		<div class="left item">
			<a class="active item" href="dashboard.php">Profile</a>
			<a class="item" href="cart.php">Cart</a>
			<a class="item" href="inbox.php">Inbox</a>
		</div>
		<div class="right item">
			<a href="../includes/logout.php"><button class="ui tiny inverted red button" style="float:right;">Logout</button></a>
		</div>
	</div>

	<div class="ui center aligned segment">
	  <div class="ui two column very relaxed grid">
		  <?php
		  	if($check_verified = $mysqli->prepare("SELECT name,address,email,valid,picture FROM Clinic WHERE id = ?")){
		  		$check_verified->bind_param('s', $clinic_id);
		  		$check_verified->execute();
		  		$check_verified->store_result();
		  		$check_verified->bind_result($bname, $baddress, $email, $verified, $picture);
		  		$check_verified->fetch();
		  		echo '<div class="column"><img class="ui avatar image" src="../vet/vet_avatar/'.$picture.'" style="height:200px;width:200px;"></div>';
		  		echo '<div class="column"><h3 class="header" style="margin-top:15%;margin-bottom:1%;">'.$bname.'</h3>';
		  		if(!empty($baddress)){
		  			echo '<a class="ui tiny blue label" style="margin-top:1%;">'.$baddress.'</a>';
		  		}
		  		if(!empty($email)){
		  			echo '<a class="ui tiny blue label" style="margin-top:1%;">'.$email.'</a>';
		  		}
		  		if($verified == true){
		  		echo '<div class="ui green label"><i class="ui check icon"></i>Verified Business</div></div>';
		  		}
		  		
		  	}
		  ?>
	  </div>
	</div>
	<br>

	<div class="row">
	<div class="col-md-6">
				<form class="ui form" method="post" name="consultation" action="vet.php">
					<h3 class="ui dividing header">Consultation</h3>
					<input type="text" name="message" placeholder="(Place Your Message Here)" id="name">
					<br><br>
					<input type="date" name="consult_date" placeholder="Date" id="name">
					<br><br>
					<input type="text" name="consult_by" placeholder="Your Fullname" id="name">
					<br><br>
					<input class="ui small green submit button" type="submit" name="consult_submit"></input>
				</form>
	</div>
	</div>
	<div class="services">
		<div class="ui grid">
			<div class="six wide column">
				<h3 class="ui dividing header">Veterinarians</h3>
				<div class="ui ordered list">
					<?php

						if($get_designation = $mysqli->prepare("SELECT username FROM Clinic WHERE id = ?")){
							$get_designation->bind_param('s', $clinic_id);
							$get_designation->execute();
							$get_designation->store_result();
							$get_designation->bind_result($designation);
							$get_designation->fetch();
							if($get_vets = "SELECT name, avatar, academe, vet_uname FROM Vet ORDER BY id DESC"){
								$result = $mysqli->query($get_vets);
								while($row = $result->fetch_assoc()){
									if($row['vet_uname'] == $designation){
										echo '<div class="item" id="doctor">';
										echo '<img class="ui avatar image" src="../img/vet_avatar/'.$row['avatar'].'">';
										echo '<div class="content"><div class="header">'.$row['name'].'</div>'.$row['academe'];
										echo '</div></div>';
									}
								}
							}
						}

					?>
                </div>
			</div>
			<div class="ten wide column">
				<h3 class="ui dividing header">Products</h3>
				<div class="ui three stackable cards">
					<?php

						if($get_designation = $mysqli->prepare("SELECT username FROM Clinic WHERE id = ?")){
							$get_designation->bind_param('s', $clinic_id);
							$get_designation->execute();
							$get_designation->store_result();
							$get_designation->bind_result($designation);
							$get_designation->fetch();
							if($get_products = "SELECT id, name, price, image, vet_uname FROM Products ORDER BY id DESC"){
								$result = $mysqli->query($get_products);
								while($row = $result->fetch_assoc()){
									if($row['vet_uname'] == $designation){
										echo '<div class="card"><div class="ui image"><img src="../img/product_img/'.$row['image'].'"></div>';
										echo '<div class="content"><div class="header">'.$row['name'].'</div>';
										echo '<div class="description"><a class="ui tiny right floated blue label">P '.$row['price'].'</a></div></div>';
										echo '<br><br><a class="ui bottom attached button" href="add_cart.php?pid='.$row['id'].'"><i class="plus icon"></i>Add to Cart</a>';
										echo '</div>';
									}
								}
							}
						}

					?>
				</div>
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