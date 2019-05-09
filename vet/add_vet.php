<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

define('MB', 1048576);

if(isset($_SESSION['username'], $_POST['submit'], $_POST['name'], $_POST['academe'], $_FILES['image'])){
    $username = $_SESSION['username'];
    $name = filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING);
    $academe = filter_input(INPUT_POST, 'academe', $filter = FILTER_SANITIZE_STRING);
    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmp = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $fileError = $_FILES['image']['error'];

    $extension = explode('.', $fileName);
    $actualExtension = strtolower(end($extension));
    
    if($actualExtension == 'jpeg' || $actualExtension == 'jpg' || $actualExtension == 'png'){
        if($fileError == 0){
            if($fileSize < 20*MB){
                $newname = $name . "_" . mt_rand(1,99) . "." . $actualExtension;
                $destination = '../img/vet_avatar/' . $newname;
                move_uploaded_file($fileTmp, $destination);
                if($prod_insert = $mysqli->prepare("INSERT INTO Vet (name, avatar, academe, vet_uname) VALUES (?,?,?,?)")){
                    $prod_insert->bind_param('ssss', $name, $newname, $academe, $username);
                    if(!$prod_insert->execute()){
                        header("Location: dashboard.php?error=An Unknown Error Occured.");
                        exit();
                    }else{
                        header("Location: dashboard.php?uploadStatus=Success.");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard.php?error=File size too large (>20MB).");
                exit();
            }
        }else{
            header("Location: dashboard.php?error=Upload Error.");
            exit();
        }
    }else{
        header("Location: dashboard.php?error=Invalid Format.");
        exit();
    }
}

?>