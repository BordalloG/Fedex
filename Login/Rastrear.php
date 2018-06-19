
<?php include("Repositorios/repositorioBase.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("layout/head.html"); ?>
</head>
<body>
<div class="ui grid container">
        <div class="row">
            <div class="sixteen wide column">
                <div class="ui segment">
                    <form method="get" action="Rastreio.php" >
                    <div class="ui form">
                        <div class="inline field">
                            <label>Codigo de Rastreio</label>
                            <input type="text" name='codigo' placeholder="Código de Rastreio">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>
    
<?php include("layout/scripts.html"); ?>
<script src="js/index.js" ></script>
</body>
</html>
