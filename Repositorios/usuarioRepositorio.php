<?php include("repositorioBase.php") ?>
<?php
 
 $sql = "INSERT INTO `usuario`(`Cpf`, `Email`, `Nome`, `Senha`) VALUES
('".$_POST['cpf']."','". $_POST['email']."','".$_POST['nome'] ."','". $_POST['senha']."')";
 

 if (mysqli_query($conn, $sql)) {
 header('Location: ../Usuarios.php');
 } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
?>