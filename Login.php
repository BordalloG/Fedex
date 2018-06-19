<?php include("Repositorios/repositorioBase.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php include("layout/head.html"); ?>
<link href="css/login-menu.css" rel='stylesheet'>
    <title>Login - Fedex</title>
</head>
<body>
  <br>
  <br>
  <h1>Fabex</h1>
  <br>
  <br>
<div class="ui card">
  <div class="image">
  <div class="ui middle aligned center aligned grid">
              <div class="column">
                <h2 class="ui main-title teal  header">
                  <div class="content">
                   Entrar
                  </div>
                </h2>
                <form class="ui large form" action="Login/login.php" method="post">
                  <div class="ui stacked segment">
                    <div class="field">
                      <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="E-mail">
                      </div>
                    </div>
                    <div class="field">
                      <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                      </div>
                    </div>
                    <button class="ui fluid large teal submit button" type="submit">Entrar</button>
                  </div>
            
                  <div class="ui error message"></div>
            
                </form>
            
                <div class="ui message">
                    Não tem conta? Solicite ao Administrador!
                </div>
              </div>
            </div>

  </div>
  
</div>
            


<?php include("layout/scripts.html"); ?>
</body>
</html>

