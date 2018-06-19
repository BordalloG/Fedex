<?php include("layout/validacao.php"); ?>
<?php include("Repositorios/repositorioBase.php") ?>
<?php


$fase = json_decode($_POST['enco']);
$Ori;
$Dest;
echo "Codigo Encomenda:". $fase->enco;
echo "|codigo Fase:".$fase->Cfase;

$sql = "SELECT EndeOrigem as Ori, EndeDestino as Dest FROM `encomenda` WHERE Codigo =".$fase->enco;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $Ori = $row["Ori"];
            $Dest = $row["Dest"];
        }
    } 



$sql = "INSERT INTO `fase_encomenda`(`CodigoEncomenda`, `CodigoFase`, `EndeOrigem`, `EndeDestino`, `Data`) VALUES (".$fase->enco.",".$fase->Cfase.",".$Dest.",".$Ori.",now())";
echo $sql;
$conn->query($sql);
?>