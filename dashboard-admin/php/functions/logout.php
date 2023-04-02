<?php session_start();
$_SESSION['is_admin'] = false;
header('Location: /webcapz-capstone-project/dashboard-admin/php/login.php');