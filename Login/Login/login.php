<?php
include("../Repositorios/repositorioBase.php");
 if(isset( $_POST['email']) && isset( $_POST['password']) ){
     $email = $_POST['email'];
     $senha = $_POST['password'];
     $sql = "SELECT * FROM usuario where email='".$email."' and Senha='".$senha."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        session_start();
        $_SESSION['logado'] = true;
        header('location:../index.php'); 
    } 
    else{
        header('location: ../login.php');
    }
}

?>