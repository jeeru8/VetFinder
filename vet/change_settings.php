<?php

include_once '../includes/db.php';
include_once '../includes/backend_core.php';

require '../includes/session_init.php';

session_start();

define('MB', 1048576);

if(isset($_SESSION['username'], $_POST['submit'], $_FILES['image'])){
    $username = $_SESSION['username'];
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
                $newname = $username . "_" . mt_rand(1,99) . "." . $actualExtension;
                $destination = 'vet_avatar/' . $newname;
                move_uploaded_file($fileTmp, $destination);
                if($prod_insert = $mysqli->prepare("UPDATE Clinic SET picture = ? WHERE username = ?")){
                    $prod_insert->bind_param('ss', $newname, $username);
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

if(isset($_SESSION['username'], $_POST['submit'], $_POST['name'])){
    $newname = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET name = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newname, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}

if(isset($_SESSION['username'], $_POST['submit'], $_POST['address'])){
    $newaddress = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET address = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newaddress, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}

if(isset($_SESSION['username'], $_POST['submit'], $_POST['email'])){
    $newemail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET email = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newemail, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}


if(isset($_SESSION['username'], $_POST['submit'], $_POST['schedule_from'])){
    $newschedule = filter_input(INPUT_POST, 'schedule_from', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET schedule_from = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newschedule, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}


if(isset($_SESSION['username'], $_POST['submit'], $_POST['schedule_to'])){
    $newschedule2 = filter_input(INPUT_POST, 'schedule_to', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET schedule_to = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newschedule2, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}

if(isset($_SESSION['username'], $_POST['submit'], $_POST['schedule_time'])){
    $newschedule3 = filter_input(INPUT_POST, 'schedule_time', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET schedule_time = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newschedule3, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}

if(isset($_SESSION['username'], $_POST['submit'], $_POST['schedule_time2'])){
    $newschedule4 = filter_input(INPUT_POST, 'schedule_time2', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET schedule_time2 = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newschedule4, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}


if(isset($_SESSION['username'], $_POST['submit'], $_POST['description'])){
    $newschedule4 = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $username = $_SESSION['username'];
    if($change_name = $mysqli->prepare("UPDATE Clinic SET description = ? WHERE username = ?")){
        $change_name->bind_param('ss', $newschedule4, $username);
        if(!$change_name->execute()){
            header("Location: settings.php?error=Failed.");
            exit();
        }
        header("Location: settings.php");
        exit();
    }
}


?>