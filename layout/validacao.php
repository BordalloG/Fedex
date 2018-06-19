<?php 
session_start();
 if(!$_SESSION['logado'])
    header('location:/4lp/Login.php');
?>