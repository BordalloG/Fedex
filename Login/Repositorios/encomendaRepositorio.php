<?php include("repositorioBase.php") ?>
<?php
$encomenda = json_decode($_POST['enco']);

$codigoEndereco;
$codigoEndereco2;
$codigoDetalhes;
$codigoDetalhes2;
$codigoEncomenda;

$sql = "SELECT * FROM endereco WHERE cep=".$encomenda->cep ;
/////////////////
//endereco full
if (mysqli_query($conn, $sql)) {
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $codigoEndereco = $row["Codigo"];
        }
    }
    else{
         $sql="INSERT INTO `endereco`( `Logradouro`, `Bairro`, `Cidade`, `Estado`, `Pais`, `Cep`) VALUES
          ('".$encomenda->logradouro1."'
          ,'".$encomenda->bairro1."'
          ,'".$encomenda->cidade1."'
          ,'".$encomenda->estado1."'
          ,'".$encomenda->pais."'
          ,'".$encomenda->cep."')";
          $conn->query($sql);
          $sql = "SELECT MAX(Codigo) as Codigo FROM `endereco`";
            echo "novo endereço inserido, codigo:";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    echo $row["Codigo"];
                    $codigoEndereco = $row["Codigo"];
                }
            }
    }
}
else{
        echo "Erro ao cadastrar endereço";
    }
    ///////////////////
    // endereco detalhes
    $sql = "SELECT * FROM endereco_detalhes WHERE Numero=".$encomenda->numero." and Codigo=".$codigoEndereco;
    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "id = ".$row["Codigo"];
                $codigoDetalhes = $row["Codigo"];
            }
        }
    
    else{
        $sql = "INSERT INTO `endereco_detalhes`(`Numero`, `Complemento`, `CodigoEndereco`) VALUES ('".$encomenda->numero."','$encomenda->complemento',".$codigoEndereco.")";
        $conn->query($sql);
        $sql = "SELECT MAX(Codigo) as Codigo FROM `endereco_detalhes`";

        echo "novo numero inserido, codigo:";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo $row["Codigo"];
                $codigoDetalhes = $row["Codigo"];
            }
        } 
    }
}
else {
    echo "Erro ao cadastrar o número";
}
    

///////////////////////////////////////////////////////////qq
///////////// ENDERECO 2  /////////////////////////////////q
//////////////////////////////////////////////////////////qqqq
$sql = "SELECT * FROM endereco WHERE cep=".$encomenda->cep2 ;
/////////////////
//endereco full
if (mysqli_query($conn, $sql)) {
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $codigoEndereco2 = $row["Codigo"];
        }
    }
    else{
         $sql="INSERT INTO `endereco`( `Logradouro`, `Bairro`, `Cidade`, `Estado`, `Pais`, `Cep`) VALUES
          ('".$encomenda->logradouro2."'
          ,'".$encomenda->bairro2."'
          ,'".$encomenda->cidade2."'
          ,'".$encomenda->estado2."'
          ,'".$encomenda->pais."'
          ,'".$encomenda->cep2."')";
          $conn->query($sql);
          $sql = "SELECT MAX(Codigo) as Codigo FROM `endereco`";
            echo "[2]novo endereço inserido, codigo:";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    echo $row["Codigo"];
                    $codigoEndereco2 = $row["Codigo"];
                }
            }
    }
}
else{
        echo "[2]Erro ao cadastrar endereço";
    }
    ///////////////////
    // endereco detalhes
    $sql = "SELECT * FROM endereco_detalhes WHERE Numero=".$encomenda->numero2." and Codigo=".$codigoEndereco2;
    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "id = ".$row["Codigo"];
                $codigoDetalhes2 = $row["Codigo"];
            }
        }
    
    else{
        echo "[2]Nao tem num1";
        $sql = "INSERT INTO `endereco_detalhes`(`Numero`, `Complemento`, `CodigoEndereco`) VALUES ('".$encomenda->numero2."','$encomenda->complemento2',".$codigoEndereco2.")";
        $conn->query($sql);
        $sql = "SELECT MAX(Codigo) as Codigo FROM `endereco_detalhes`";

        echo "[2]novo numero inserido, codigo:";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo $row["Codigo"];
                $codigoDetalhes2 = $row["Codigo"];
            }
        } 
    }
}
else {
    echo "[2]Erro ao cadastrar o número";
}

    //////////////////////////////////////qqqqqqqqqq
    /////////  Insert encomenda  //////////////////
    ////////////////////////////////////////////q
    $sql = "INSERT INTO `encomenda`(`Cpf`, `EndeDestino`, `EndeOrigem`, `Prazo`) VALUES (".$encomenda->cpf.",".$codigoEndereco.",".$codigoEndereco2.",".$encomenda->prazo.")";
  echo $sql;
    $conn->query($sql);
    $sql ="SELECT MAX(Codigo) as Codigo FROM `encomenda`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $codigoEncomenda = $row["Codigo"];
        }
    } 
  $sql = "INSERT INTO `fase_encomenda`(`CodigoEncomenda`, `CodigoFase`, `EndeOrigem`, `EndeDestino`, `Data`) VALUES (".$codigoEncomenda.",1,".$codigoDetalhes.",".
  $codigoDetalhes2.",now())";
  echo $sql;
  $conn->query($sql);
  
?>