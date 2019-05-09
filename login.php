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
$info = filter_input(INPUT_GET, 'info', $filter = FILTER_SANITIZE_STRING); 

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
    <script src="js/angular.min.js"></script>
	<script src="js/app.js"></script>
    <script src="components/popup.js"></script>
    <script src="components/dimmer.js"></script>
    <script src="components/rating.js"></script>
    <script src="components/visibility.js"></script>
    <script src="components/sidebar.js"></script>
    <script src="components/transition.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/navbar_mod.js"></script>
    <script src="js/sha512.js"></script>
    <script src="js/form_handler.js"></script>
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
<div class="container" style="background-image: url(img/wallpaper1.jpeg); background-size: auto; background-position: 90% 0%; padding-bottom: 320px;">
<div class="ui middle aligned center aligned container grid" ng-controller="loginController">

    <div class="ui segment" id="fader" style="margin-top:16em;">
    <img src="photos/client2.png" class="img-responsive" width="150" height="150"/>
     <h1 class="alert alert-success">LOGIN DETAILS</h1>   
    <div class="ui tabular menu" ng-init="activeItem = 'client'">
        <a class="item" ng-class="{'active':activeItem === 'client'}" ng-click="showCl(); activeItem = 'client'">Client</a>
        <a class="item" ng-class="{'active':activeItem === 'vet'}" ng-click="showVe(); activeItem = 'vet'">Veterinary</a>
    </div>
		<form class="ui form" ng-show="loginCl" method="post" action="includes/login_handler.php">
			<div class="field">
				<label>Username</label>
				<input type="text" name="c_username" placeholder="Username" id="c_username">
			</div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" id="password">
            </div>
			<input class=" btn btn-success btn-lg btn-block" type="button" value="Submit" onclick="return loginVerify(this.form,this.form.c_username,this.form.password)">
        </form>
        <form class="ui form" ng-show="loginVe" method="post" action="includes/login_handler.php">
			<div class="field">
				<label>Username</label>
				<input type="text" name="v_username" placeholder="Username" id="v_username">
			</div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" id="password">
            </div>
			<input class=" btn btn-success btn-lg btn-block" type="button" value="Submit" onclick="return loginVerify(this.form,this.form.v_username,this.form.password)">
        </form>
    </div>
</div>
<?php
    if(isset($_GET['error'])){
        echo '<center><br><br><a class="ui negative button" tabindex="0"><p>Login Error</p></a></center>';
    }
    if(isset($_GET['info'])){
        echo '<center><br><br><a class="ui blue button" tabindex="0"><p>' . $info . '</p></a></center>';
    }
?>
</body>