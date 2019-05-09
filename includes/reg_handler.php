<?php 

include_once 'db.php';

$error_msg = '';

session_start();

// Client
if(isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['username'], $_POST['h'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'h', FILTER_SANITIZE_STRING);
    // Hash Verification
	if(strlen($password) != 128){
		$error_msg = 'Hash Configuration Error';
		header("Location: ../VetFinder/signup.php?error=Password Configuration Error.");
		exit();
    }
    // Username Verification
	if($verify_username = $mysqli->prepare("SELECT id FROM Users WHERE username = ?")){
		$verify_username->bind_param('s', $username);
		$verify_username->execute();
		$verify_username->store_result();
		if($verify_username->num_rows() == 1){
			$error_msg = 'Username Taken';
			header("Location: ../VetFinder/signup.php?error=Username already taken.");
			exit();
		}
	}
	if(empty($error_msg)){
		$rand = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
		$password = hash('sha512', $password . $rand);
		if($register_stmt = $mysqli->prepare("INSERT INTO Users (name,email,phone,username,password,salt) VALUES (?,?,?,?,?,?)")){
			$register_stmt->bind_param('ssssss', $name, $email, $phone, $username, $password, $rand);
			if(!$register_stmt->execute()){
				header("Location: ../VetFinder/signup.php?error=Registration Failed");
				exit();
			}
		}
		header("Location: ../VetFinder/pre_success.php");
		exit();					
	}
}

// Vet
if(isset($_POST['bname'], $_POST['email'], $_POST['phone'], $_POST['username'], $_POST['h'])){
    $name = filter_input(INPUT_POST, 'bname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'h', FILTER_SANITIZE_STRING);
    // Hash Verification
	if(strlen($password) != 128){
		$error_msg = 'Hash Configuration Error';
		header("Location: ../VetFinder/signup.php?error=Password Configuration Error.");
        exit();
    }
    // Username Verification
	if($verify_username = $mysqli->prepare("SELECT id FROM Clinic WHERE username = ?")){
		$verify_username->bind_param('s', $username);
		$verify_username->execute();
		$verify_username->store_result();
		if($verify_username->num_rows() == 1){
			$error_msg = 'Username Taken';
			header("Location: ../VetFinder/signup.php?error=Username already taken.");
			exit();
		}
	}
	if(empty($error_msg)){
		$rand = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
		$password = hash('sha512', $password . $rand);
		if($register_stmt = $mysqli->prepare("INSERT INTO Clinic (name,address,email,phone,username,password,salt) VALUES (?,?,?,?,?,?,?)")){
			$register_stmt->bind_param('sssssss', $name, $address, $email, $phone, $username, $password, $rand);
			if(!$register_stmt->execute()){
				header("Location: ../VetFinder/signup.php?error=Registration Failed");
				exit();
			}
		}
		header("Location: ../VetFinder/pre_success.php");
		exit();					
	}
}


?>