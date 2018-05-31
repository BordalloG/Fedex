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
                            <th>Prazo</th>
                            <th>Endereco Origem</th>
                            <th>Endereco Final</th>
                            <th>Fase</th>
                            <th >
                                <button class="ui right floated green button adicionar ">
                                    <i class="add icon"></i>
                                        Adicionar
                                </button>
                            </th>
                        </thead>
                        <tbody>
                        <?php
                                $sql = "SELECT enc.Codigo,enc.Prazo, enc.codigo, end1.cidade 'ORIGEM', end2.cidade 'DESTINO', f.Descricao
                                from encomenda as enc
                                inner join endereco  as end1 on end1.codigo =  enc.EndeOrigem
                                inner join endereco as end2 on end2.codigo = enc.EndeDestino
                                INNER JOIN fase_encomenda as f_e on enc.Codigo = f_e.CodigoEncomenda
                                INNER JOIN fase as f on f.Codigo = f_e.CodigoFase";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row["Codigo"]."</td>";
                                        echo "<td>".$row["Prazo"]." dias</td>";
                                        echo "<td>".$row["ORIGEM"]."</td>";
                                        echo "<td>".$row["DESTINO"]."</td>";
                                        echo "<td>".$row["Descricao"]."</td>";
                                        echo "<td>
                                        <div class='buttons-cell right'>
                                            <div class='ui vertical animated button' tabindex='0'>
                                                <div class='hidden content'>Editar</div>
                                                <div class='visible content'>
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


<?php include("layout/scripts.html"); ?>
<script src="js/encomendas.js" ></script>
</body>
</html>
