<?php 
session_start();
$_SESSION['logado'] = false;
header('location:/4lp/Login.php');
?>