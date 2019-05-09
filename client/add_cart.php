<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

$productId = filter_input(INPUT_GET, 'pid', $filter = FILTER_SANITIZE_STRING);

if(isset($_SESSION['username'])){
    // Check if there is a pending transaction
    if($checkout_verify = $mysqli->prepare("SELECT static FROM Users WHERE username = ?")){
        $checkout_verify->bind_param('s', $_SESSION['username']);
        $checkout_verify->execute();
        $checkout_verify->store_result();
        $checkout_verify->bind_result($checkout_tmp);
        $checkout_verify->fetch();
        if($checkout_tmp == false){
        	if($get_price = $mysqli->prepare("SELECT price FROM Products WHERE id = ?")){
        		$get_price->bind_param('s', $productId);
        		$get_price->execute();
        		$get_price->store_result();
        		$get_price->bind_result($productprice);
        		$get_price->fetch();
				if($add_to_cart = $mysqli->prepare("INSERT INTO Carts (username,product_id,price) VALUES (?,?,?)")){
	                $add_to_cart->bind_param('sss', $_SESSION['username'], $productId, $productprice);
	                $add_to_cart->execute();
            	}
        	}
        }
        header("Location: cart.php");
        exit();
    }
}

?>