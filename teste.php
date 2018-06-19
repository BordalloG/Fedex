<?php include("layout/validacao.php"); ?>
<?php include("Repositorios/repositorioBase.php") ?>
<?php


$info = json_decode($_POST['info']);
    $sql ="SELECT `EndeDestino` as Dest, `EndeOrigem` as Ori FROM `encomenda` WHERE Codigo =".$info->codEnco;
    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $Ori = $row["Ori"];
            $Dest = $row["Dest"];
        }
    } 
  $sql = "INSERT INTO `fase_encomenda`(`CodigoEncomenda`, `CodigoFase`, `EndeOrigem`, `EndeDestino`, `Data`) VALUES (".$info->codEnco.",".$info->codFase.",".
$Ori.",".$Dest.",now())";
  $conn->query($sql);



?>