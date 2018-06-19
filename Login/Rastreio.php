<?php include("Repositorios/repositorioBase.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("layout/head.html"); ?>
    <title> Rastreio - FABEX </title>
    <link rel="stylesheet" type="text/css" href="css/helper.css">
</head>
<body style="background-color:#313131;">
    <br><br>   
    <div class="ui grid container">
        <div class="row">
            <div class="sixteen wide column">
                <div class="ui segment">
                    <br>
                    <div class="row">
                    <center>
                    <div class="ui ordered steps">
                        <?php
                            $sql = "SELECT enc.Codigo,enc.Prazo, enc.codigo, end1.cidade 'ORIGEM', end2.cidade 'DESTINO', f.Descricao,f.codigo 'codFase',f_e.Data
                            from encomenda as enc
                            inner join endereco  as end1 on end1.codigo =  enc.EndeOrigem
                            inner join endereco as end2 on end2.codigo = enc.EndeDestino
                            INNER JOIN fase_encomenda as f_e on enc.Codigo = f_e.CodigoEncomenda
                            INNER JOIN fase as f on f.Codigo = f_e.CodigoFase
                            WHERE enc.Codigo=".$_GET['codigo']."
                            ORDER BY f_e.Data DESC
                            LIMIT 1";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='step ";
                                    echo verificarStatus(1,$row['codFase']);
                                    echo "'>
                                            <div class='content'>
                                                <div class='title'>Criado</div>
                                                    <div class='description'>Criada com sucesso</div>
                                                </div>
                                            </div>";
                                            
                                    echo"<div class='step ";
                                    echo verificarStatus(2,$row['codFase']);
                                    echo "'>
                                            <div class='content'>
                                            <div class='title'>Despachado</div>
                                            <div class='description'>Ta com a gente</div>
                                            </div>
                                        </div>";

                                    echo"<div class='step ";
                                    echo verificarStatus(3,$row['codFase']);
                                    echo "'>
                                            <div class='content'>
                                            <div class='title'>Em Transito</div>
                                            <div class='description'></div>
                                            </div>
                                        </div> ";
                                    echo" <div class='step ";
                                    verificarStatus(4,$row['codFase']);
                                    echo"'>
                                            <div class='content'>
                                            <div class='title'>Saiu Para Entrega</div>
                                            <div class='description'>Já já ta na sua mão</div>
                                            </div>
                                        </div>";
                                    echo"<div class='step"; echo verificarStatus(5,$row['codFase']);echo "'>
                                            <div class='content'>
                                            <div class='title'>Entregue</div>
                                            <div class='description'>Sua encomenda chegou </div>
                                            </div>
                                        </div> ";
                                    

                                //     echo "<tr>";
                                //     echo "<td>".$row["Codigo"]."</td>";
                                //     echo "<td>".$row["Prazo"]." dias</td>";
                                //     echo "<td>".$row["ORIGEM"]."</td>";
                                //     echo "<td>".$row["DESTINO"]."</td>";
                                //     echo "<td>".$row["Descricao"]."</td>";
                                //     echo "<td>".$row["codFase"]."</td>";
                                //     echo "<td>
                                //     <div class='buttons-cell right'>
                                //         <div class='ui vertical animated button' tabindex='0'>
                                //             <div class='hidden content'>Editar</div>
                                //             <div class='visible content'>
                                //                 <i class='edit icon'></i>
                                //             </div>
                                //         </div>
                                //         <div class='ui vertical animated button excluir' tabindex='0'>
                                //             <div class='hidden content '>Excluir</div>
                                //             <div class='visible content'>
                                //                 <i class='trash icon'></i>
                                //             </div>
                                //         </div>
                                //     </div>  
                                // </td>";
                                //echo "</tr>";
                                echo "</div>";
                                echo "<h2>Origem:".$row['ORIGEM']."<br> Destino:".$row['DESTINO']."<br>Prazo:".$row['Prazo']."dias</h2>";                                
                                }
                            } else {
                                echo '0 results';
                            }

                            function verificarStatus($linha,$valor){
                                
                                if($valor >$linha){
                                    echo "completed";
                                }
                                else if ($valor < $linha){
                                    echo "";
                                }
                                else if ($valor == $linha) {
                                    echo "active";
                                }   
                            }
                            //$conn->close();
                        ?>

                        <table class="ui fixed celled table">
                        <thead>
                            <th>Fase</th>
                            <th>Origem</th>
                            <th>Destino</th>
                            <th>Data</th>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT f.Descricao,end1.cidade 'ORIGEM', end2.cidade 'DESTINO', enc.Data FROM `fase_encomenda`as enc 
                            INNER join fase as f on enc.CodigoFase = f.Codigo
                            inner join endereco  as end1 on end1.codigo =  enc.EndeOrigem
                            inner join endereco as end2 on end2.codigo = enc.EndeDestino
                            where CodigoEncomenda =". $_GET['codigo']."
                            order by Data DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["Descricao"]."</td>";
                                    echo "<td>".$row["ORIGEM"]."</td>";
                                    echo "<td>".$row["DESTINO"]."</td>";
                                    echo "<td>".$row["Data"]."</td>";
                                    echo "</tr>";   
                                }
                            } else {
                                echo '0 results';
                            }
                            $conn->close();
                        ?>
                    </tbody>
                </table>



                           
                    </center>
                </div>
            </div>
        </div> 
    </div>
<?php include("layout/scripts.html"); ?>
<script src="js/encomendas.js" ></script>
</body>
</html>
