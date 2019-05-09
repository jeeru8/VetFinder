<?php 

include_once 'includes/reg_handler.php';
include_once 'includes/backend_core.php';

session_start();
session_regenerate_id();
require 'session_init.php';

if(isset($_SESSION['username'])){
    header("Location: dashboard/profile.php");
    exit();
}

$error = filter_input(INPUT_GET, 'error', $filter = FILTER_SANITIZE_STRING); 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="components/reset.css">
    <link rel="stylesheet" type="text/css" href="components/site.css">
    <link rel="stylesheet" type="text/css" href="components/container.css">
    <link rel="stylesheet" type="text/css" href="components/grid.css">
    <link rel="stylesheet" type="text/css" href="components/header.css">
    <link rel="stylesheet" type="text/css" href="components/image.css">
    <link rel="stylesheet" type="text/css" href="components/menu.css">
    <link rel="stylesheet" type="text/css" href="components/divider.css">
    <link rel="stylesheet" type="text/css" href="components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="components/segment.css">
    <link rel="stylesheet" type="text/css" href="components/button.css">
    <link rel="stylesheet" type="text/css" href="components/card.css">
    <link rel="stylesheet" type="text/css" href="components/label.css">
    <link rel="stylesheet" type="text/css" href="components/reveal.css">
    <link rel="stylesheet" type="text/css" href="components/rating.css">
    <link rel="stylesheet" type="text/css" href="components/popup.css">
    <link rel="stylesheet" type="text/css" href="components/dimmer.css">
    <link rel="stylesheet" type="text/css" href="components/list.css">
    <link rel="stylesheet" type="text/css" href="components/icon.css">
    <link rel="stylesheet" type="text/css" href="components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="components/transition.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="assets/library/jquery.min.js"></script>
	<!-- Form Handling -->
	<script src="js/form_handler.js"></script>
	<script src="js/sha512.js"></script>
	<!-- Angular -->
	<script src="js/angular.min.js"></script>
	<script src="js/app.js"></script>
	<!-- Semantic JS Deps -->
    <script src="components/popup.js"></script>
    <script src="components/dimmer.js"></script>
    <script src="components/rating.js"></script>
    <script src="components/visibility.js"></script>
    <script src="components/sidebar.js"></script>
    <script src="components/transition.js"></script>
    <script src="js/semantic.js"></script>
	<script src="js/navbar_mod.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
	<style>
		#fader{
			animation: fade 1s;
		}
		@keyframes fade{
			from{opacity:0;}
			to{opacity:1;}
		}
	</style>
</head>
<body ng-app="signupApp">

<!-- Navbar -->
<div class="ui large top fixed menu">
  <div class="ui container">
    <a class="toc item"><i class="sidebar icon"></i></a>
    <div class="left menu">
      <a class="item" href="index.php">Home</a>
        <a class="item" href="services.php">Services</a>
    </div>
    <div class="right menu" style="padding-top:5px;padding-bottom:5px;padding-right:30px;">
        <div class="ui large buttons">
            <a class="ui green button" href="signup.php">Signup</a>
            <div class="or"></div>
            <a class="ui blue button" href="login.php">Log in</a>
        </div>
    </div>
  </div>
</div>
<!-- Sidebar -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item" href="#">Home</a>
    <a class="item" href="services.php">Services</a>
    <a class="item" href="signup.php">Signup</a>
    <a class="item" href="login.php">Login</a>
</div>
<!-- Main Container -->
<div class="container" style="background-image: url(img/wallpaper2.jpg); background-size: auto; background-position: 90% 0%;padding-bottom: 400px;">

<div class="ui middle aligned center aligned container grid" ng-controller="signupController" >
	<div class="ui placeholder segment" ng-hide="isAny" id="fader" style="margin-top:20em;" align="center">
		<h1 class="alert alert-success">Choose Type of User</h1>
		<div class="row" align="center">
			
			<div class="col-md-6">
				<img src="photos/client2.png" class="img-responsive" width="100" height="100"/>
				<a class="btn btn-success btn-lg btn-block" ng-click="showClient();">
					Pet Owner
				</a>
			</div>
			<div class="col-md-6" ng-click="showVet();">
				<img src="photos/doctor.png" class="img-responsive" width="100" height="100"/>
				<a class="btn btn-info btn-lg btn-block">
					Veterinarian
				</a>
			</div>
		</div>
		<div>
			<?php
			if(isset($_GET['error'])){
				echo '<br><a class="ui negative button" tabindex="0"><p>' . $error . '</p></a>';
			}
			?>
		</div>
	</div>
	<div class="ui segment" ng-show="isVet" id="fader" style="margin-top:10em;">
		<img src="photos/doctor.png" class="img-responsive" width="200" height="200"/>
		<h1 class="alert alert-info">Veterinarian</h1>
		<form class="ui form" method="post" name="signup" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
			<div class="field">
				<label>Business</label>
				<!--
				<select class="ui fluid dropdown">
					<option value=""></option>
					<option value="Vet A">Vet A</option>
					<option value="Vet B">Vet B</option>
					<option value="Vet C">Vet C</option>
				</select>-->
				<input type="text" name="bname" placeholder="Business" id="bname">
			</div>
			<div class="two fields">
				<div class="field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" id="email">
				</div>
				<div class="field">
					<label>Phone</label>
					<input type="text" name="phone" placeholder="Phone Number" id="phone">
				</div>
			</div>
			<div class="field">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" id="username">
			</div>
			<div class="field">
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" id="password">
			</div>
			<input class="btn btn-success btn-lg btn-block" type="button" value="Submit" onclick="return bsignup(this.form, this.form.bname, this.form.email, this.form.phone, this.form.username, this.form.password);">
		</form>
	</div>
	<div class="ui segment" ng-show="isClient" id="fader" style="margin-top:13em;">
		<img src="photos/client2.png" class="img-responsive" width="200" height="200"/>
		<h1 class="alert alert-info">Pet Owner</h1>
		<form class="ui form" method="post" name="signup" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
			<div class="field">
				<label>Name</label>
				<input type="text" name="name" placeholder="Name" id="name">
			</div>
			<div class="two fields">
				<div class="field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" id="email">
				</div>
				<div class="field">
					<label>Phone</label>
					<input type="text" name="phone" placeholder="Phone Number" id="phone">
				</div>
			</div>
			<div class="field">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" id="username">
			</div>
			<div class="field">
				<label>Password</label>
				<input type="password" name="password" placeholder="Password" id="password">
			</div>
			<input class="btn btn-success btn-lg btn-block" type="button" value="Submit" onclick="return csignup(this.form, this.form.name, this.form.email, this.form.phone, this.form.username, this.form.password);">
		</form>
	</div>
</div>
</body>