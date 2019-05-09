<?php

include_once 'db.php';
include_once 'backend_core.php';

require('session_init.php');

session_start();

if(isset($_POST['c_username'], $_POST['h'])){
	$username = filter_input(INPUT_POST, 'c_username', FILTER_SANITIZE_STRING);
	$password = $_POST['h'];
	if($stmt = $mysqli->prepare("SELECT id,username,password,salt FROM Users WHERE username = ? LIMIT 1")){
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($uid, $db_uname, $db_password, $db_salt);
		$stmt->fetch();
		$passwd = hash('sha512', $password . $db_salt);
		if($stmt->num_rows == 1){
			if($passwd == $db_password){
				$user_browser = $_SERVER['HTTP_USER_AGENT'];
				$uid = preg_replace("/[^0-9]+/","",$uid);
				$_SESSION['user_id'] = $uid;
				$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
				$_SESSION['username'] = $db_uname;
				$_SESSION['login_string'] = hash('sha512', $passwd . $user_browser);
				header("Location: ../client/dashboard.php");
				exit();
			}else{
				header("Location: ../login.php?error=1");
				exit();
			}
		}else{
			header("Location: ../login.php?error=1");
			exit();
		}
	}else{
		header("Location: ../login.php?error=1");
		exit();
	}
}

if(isset($_POST['v_username'], $_POST['h'])){
	$username = filter_input(INPUT_POST, 'v_username', FILTER_SANITIZE_STRING);
	$password = $_POST['h'];
	if($stmt = $mysqli->prepare("SELECT id,username,password,salt FROM Clinic WHERE username = ? LIMIT 1")){
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($uid, $db_uname, $db_password, $db_salt);
		$stmt->fetch();
		$passwd = hash('sha512', $password . $db_salt);
		if($stmt->num_rows == 1){
			if($passwd == $db_password){
				$user_browser = $_SERVER['HTTP_USER_AGENT'];
				$uid = preg_replace("/[^0-9]+/","",$uid);
				$_SESSION['user_id'] = $uid;
				$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
				$_SESSION['username'] = $db_uname;
				$_SESSION['login_string'] = hash('sha512', $passwd . $user_browser);
				header("Location: ../vet/dashboard.php");
				exit();
			}else{
				header("Location: ../login.php?error=1");
				exit();
			}
		}else{
			header("Location: ../login.php?error=1");
			exit();
		}
	}else{
		header("Location: ../login.php?error=1");
		exit();
	}
}