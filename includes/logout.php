<?php 

include_once 'db.php';

require 'session_init.php';

session_start();

session_unset();
session_destroy();
header("Location: ../index.php");
exit();

?>