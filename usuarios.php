<?php include("Repositorios/repositorioBase.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("layout/head.html"); ?>
    <link rel="stylesheet" type="text/css" href="css/helper.css">
</head>
<body>
    <div class="ui grid container">
        <?php include("layout/navbar.html"); ?>    
        <div class="row">
            <div class="sixteen wide column">
                <div class="ui segment">
                <table class="ui fixed celled table">
                        <thead>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                                <th>
                                <button class="ui right floated green button adicionar ">
                                    <i class="add icon"></i>
                                        Adicionar
                                </button>
                            </th>
                        </thead>
                        <tbody>
                        <?php
                                $sql = "SELECT * FROM `usuario`";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row["Codigo"]."</td>";
                                        echo "<td>".$row["Nome"]."</td>";
                                        echo "<td>".$row["Cpf"]."</td>";
                                        echo "<td>".$row["Email"]."</td>";
                                        echo "<td>
                                        <div class='buttons-cell right'>
                                            <div class='ui vertical animated button edit' id='".$row["Codigo"]."'  tabindex='0'>
                                                <div class='hidden content edit' >Editar</div>
                                                <div class='visible content edit' >
                                                    <i class='edit icon'></i>
                                                </div>
                                            </div>
                                            <div class='ui vertical animated button excluir' tabindex='0'>
                                                <div class='hidden content '>Excluir</div>
                                                <div class='visible content'>
                                                    <i class='trash icon'></i>
                                                </div>
                                            </div>
                                        </div>  
                                    </td>"
                                    ;
                                    echo "</tr>";
                                    }
                                } else {
                                    echo '0 results';
                                }
                                $conn->close();
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </div>


<div class="ui mini test modal">
    <div class="header">
      Excluir Usuário
    </div>
    <div class="content">
      <p>Tem certeza que deseja excluir o usuário ?</p>
    </div>
    <div class="actions">
      <div class="ui negative button">
        Não
      </div>
      <div class="ui positive right labeled icon button confirm">
        Sim
        <i class="checkmark confirm icon"></i>
      </div>
    </div>
  </div>

    <!-- modal adicionar -->
    <div class="ui large modal modal-adicionar">
                <div class="header">
                    Adicionar novo usuário
                </div>
                <div class="content">
                    <form class="ui form" action="Repositorios/usuarioRepositorio.php" method="POST">
                        <input type="hidden" value="" id="codigo" name="codigo">
                        <h4 class="ui dividing header">Informações de Usuário</h4>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Nome</label >
                                    <input type="text" name="nome" id="nome" placeholder="Nome">
                                </div>
                                <div class="field">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" placeholder="CPF">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Email</label >
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <div class="field">
                                    <label>Senha</label>
                                    <input type="password" name="senha" placeholder="**********">
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="ui negative button">
                                Cancelar
                            </div>
                            <button type="submit" class="ui right labeled green icon button">
                            <i class="right arrow icon"></i>
                                Continuar
                            </button>
                          </div>
                    </form>
                </div> 
            </div>


<?php include("layout/scripts.html"); ?>
<script src="js/usuarios.js" ></script>
</body>
</html>
<?php
  function inserirDados(){
      echo $_POST['codigo'];
  }
//       if($_POST['codigo']== ""){
//             $sql = "INSERT INTO `usuario`(`Cpf`, `Email`, `Nome`, `Senha`) VALUES
//             ('".$_POST['cpf']."','". $_POST['email']."','".$_POST['nome'] ."','". $_POST['senha']."')";
            
//             if (mysqli_query($conn, $sql)) {
//                 echo "New record created successfully";
//             } else {
//                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//             }
//         }
//         else
//             $sql = "DELETE FROM `usuario` WHERE codigo = ".$_POST['codigo'];  

//             if (mysqli_query($conn, $sql)) {
//                 echo "New record created successfully";
//             } else {
//                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//             }  
//         echo $_POST['codigo'];
     
//   }
?>