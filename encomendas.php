<?php include("layout/validacao.php"); ?>
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
                                $sql = "SELECT encomenda.Codigo, encomenda.Prazo , end1.Cidade AS ORIGEM,end2.Cidade AS DESTINO, fase.Descricao, fe.Data
                                from fase_encomenda fe
                                INNER JOIN encomenda on fe.CodigoEncomenda = encomenda.Codigo
                                inner join endereco  as end1 on end1.codigo =  encomenda.EndeOrigem
                                inner join endereco as end2 on end2.codigo = encomenda.EndeDestino
                                inner join fase on fe.CodigoFase = fase.Codigo
                                inner join (select fe.codigoEncomenda, max(fe.data) 'MaiorData'
                                
                                            from fase_encomenda fe
                                            group by fe.codigoEncomenda) q1 on q1.codigoEncomenda = fe.CodigoEncomenda
                                                                           and q1.MaiorData = fe.Data";
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
                                            <div class='ui vertical animated button update' id='".$row['Codigo']."' tabindex='0'>
                                                <div class='hidden content'>Atualizar</div>
                                                <div class='visible content'>
                                                    <i class='redo icon'></i>
                                                </div>
                                            </div>
                                            <div class='ui vertical animated button excluir share' id='".$row['Codigo']."' tabindex='0'>
                                                <div class='hidden content '>Link</div>
                                                <div class='visible content'>
                                                    <i class='share square icon'></i>
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
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>

<!-- MODAL -->
<div class="ui large modal modal-um">
                <div class="header">
                    Cadastrar Encomenda [1/3]
                </div>
                <div class="content">
                    <form class="ui form" action="Repositorios/usuarioRepositorio.php" method="POST">
                        <input type="hidden" value="" id="codigo" name="codigo">
                        <h4 class="ui dividing header">Endereço Origem</h4>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Cep</label >
                                    <input type="text" name="cep1" id="cep" placeholder="CEP">
                                </div>
                                <div class="field">
                                    <label>Logradouro</label>
                                    <input type="text" name="logradouro" id="rua" placeholder="Logradouro">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Bairro</label >
                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro">
                                </div>
                                <div class="field">
                                    <label>Cidade</label>
                                    <input type="text" name="Cidade" id="cidade" placeholder="Cidade">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="three fields">
                                <div class="field">
                                    <label>Estado</label >
                                    <input type="text" name="Estado" id="uf" placeholder="Estado">
                                </div>
                                <div class="field">
                                    <label>Numero</label >
                                    <input type="text" name="numero" id="numero" placeholder="Numero">
                                </div>
                                <div class="field">
                                    <label>Complemento</label >
                                    <input type="text" name="complemento" id="complemento" placeholder="Complemento">
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="actions">
                            <div class="ui negative button">
                                Cancelar
                            </div>
                            <button type="button" class="ui right labeled green icon button proceed1">
                            <i class="right arrow icon"></i>
                                Continuar
                            </button>
                          </div>
                    </form>
                </div> 
            </div>

                    <!-- modal 2 -->
                    <div class="ui large modal modal-dois">
                <div class="header">
                    Cadastrar Encomenda [2/3]
                </div>
                <div class="content">
                    <form class="ui form" action="Repositorios/usuarioRepositorio.php" method="POST">
                        <input type="hidden" value="" id="codigo" name="codigo">
                        <h4 class="ui dividing header">Endereço Origem</h4>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Cep</label >
                                    <input type="text" name="cep1" id="cep2" placeholder="CEP">
                                </div>
                                <div class="field">
                                    <label>Logradouro</label>
                                    <input type="text" name="logradouro" id="rua2" placeholder="Logradouro">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Bairro</label >
                                    <input type="text" name="bairro" id="bairro2" placeholder="Bairro">
                                </div>
                                <div class="field">
                                    <label>Cidade</label>
                                    <input type="text" name="Cidade" id="cidade2" placeholder="Cidade">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="three fields">
                                <div class="field">
                                    <label>Estado</label >
                                    <input type="text" name="Estado" id="uf2" placeholder="Estado">
                                </div>
                                <div class="field">
                                    <label>Numero</label >
                                    <input type="text" name="numero" id="numero2" placeholder="Numero">
                                </div>
                                <div class="field">
                                    <label>Complemento</label >
                                    <input type="text" name="complemento" id="complemento2" placeholder="Complemento">
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="ui negative button previous1">
                                Voltar
                            </div>
                            <button type="button" class="ui right labeled green icon button proceed2">
                            <i class="right arrow icon"></i>
                                Continuar
                            </button>
                          </div>
                    </form>
                </div> 
            </div>

                                <!-- modal 3 -->
            <div class="ui large modal modal-tres">
                <div class="header">
                    Cadastrar Encomenda [3/3]
                </div>
                <div class="content">
                    <form class="ui form" action="Repositorios/usuarioRepositorio.php" method="POST">
                        <input type="hidden" value="" id="codigo" name="codigo">
                        <h4 class="ui dividing header">Informações da encomenda</h4>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" id="cpf" placeholder="CPF">
                                </div>
                                <div class="field">
                                    <label>Prazo</label>
                                    <input type="text" id="prazo" placeholder="Somente numeros">
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="ui negative button previous2">
                                Voltar
                            </div>
                            <button type="button" id="finalizar" class="ui right labeled green icon button proceed2">
                            <i class="right arrow icon"></i>
                                Finalizar
                            </button>
                          </div>
                    </form>
                </div> 
            </div>

                        <!-- modal share -->
            <div class="ui large modal shareModal">
                <div class="content">
                    <input type="text" class="shareInput">
                </div> 
            </div>
                               <!-- Update Modal -->
            <div class="ui large modal updateModal">
                <div class="header">
                   Atualizar Encomenda
                </div>
                <div class="content">
                    <form class="ui form" action="Repositorios/usuarioRepositorio.php" method="POST">
                        <input type="hidden" value="" id="codigo" name="codigo">
                        <h4 class="ui dividing header">Informações da encomenda</h4>
                        <div class="field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Fase:</label>
                                    <!-- <div class="ui fluid search selection dropdown active visible"> -->
                                        <select>
                                    <?php
                                $sql = "SELECT * FROM fase";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option>";
                                        echo $row["Descricao"];
                                        echo "</option>";
                                    }
                                } else {
                                    echo '0 results';
                                }
                                $conn->close();
                                ?>
                                </select>
                                <!-- </div> -->
                                </div>
                                <div class="field">
                                    <label>Prazo</label>
                                    <input type="text" id="prazo" placeholder="Somente numeros">
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="ui negative button previous2">
                                Voltar
                            </div>
                            <button type="button" id="finalizar" class="ui right labeled green icon button proceed2">
                            <i class="right arrow icon"></i>
                                Finalizar
                            </button>
                          </div>
                    </form>
                </div> 
            </div>

           




<?php include("layout/scripts.html"); ?>
<script src="js/encomendas.js" ></script>
</body>
</html>
