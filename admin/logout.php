<?php 
include '../includes/config.php';

session_start();
session_unset();
session_destroy();
header("Location: {$location}/admin/login.php");
 ?>