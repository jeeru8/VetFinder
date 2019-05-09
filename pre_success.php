<?php 

session_start();
session_regenerate_id();

require 'session_init.php';

session_unset();
session_destroy();

header("Location: login.php?info=Registration Success.");
exit();

?>