<?php include("repositorioBase.php") ?>
<?php 
if($_POST['codigo']== ""){
      $sql = "INSERT INTO `usuario`(`Cpf`, `Email`, `Nome`, `Senha`) VALUES
      ('".$_POST['cpf']."','". $_POST['email']."','".$_POST['nome'] ."','". $_POST['senha']."')";
}
else if($_POST['codigo']>0){
      $sql = "DELETE FROM `usuario` WHERE codigo = ".$_POST['codigo'];  
}
else{
    $sql= "UPDATE `usuario` SET `Cpf`=".$_POST['cpf'].",`Email`='".$_POST['email']."',`Nome`='".$_POST['nome']."',`Senha`='".$_POST['senha']."' WHERE codigo=".-$_POST['codigo']."";
}

 if (mysqli_query($conn, $sql)) {
 header('Location: ../Usuarios.php');
 } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
?>