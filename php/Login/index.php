<?php 
  session_start();
  include('models/BD.php');
  include('models/MySql.php');

  $_SESSION['msn_login'] = "";

  if( isset( $_POST['logar']) ) //vai verificar se o usuario acionou o formulario
  {
     //vai receber os dados inseridos no formulario 
     $nome =  $_POST['nome'];  // a variavel nome recebera o valor que o usuario inseriu no campo 'nome'
     $senha = $_POST['senha']; // a variavel nome recebera o valor que o usuario inseriu no campo 'senha'
    
     if( \models\BD::verifica('user','nome = ? AND senha = ? ',array( $nome,$senha ) ) == false )
     {
         $_SESSION['nome'] = $nome;
         $_SESSION['login'] = true;
         \models\BD::redirect( "home.php" );
     }
     else
         $_SESSION['msn_login'] = "Usuario Não Encontrado";

  }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!--====================================== Met Tags ===============================================-->	
        <meta charset="utf-8" />
        <!--===============================================================================================-->		
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--===============================================================================================-->	
        <link rel="shortcut icon" href="img/logo.png" />
        <!--============================================= Css =============================================-->	
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	    <!--===============================================================================================-->	
	    <link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/all.css" /> 
        <!--===============================================================================================-->
    </head>

    <body>
        <header>
        </header>

        <div class = "container">

            <div class = "card">
                <form method = "post">
                    <div class = "title-card"> 
                      <p class = "text-center"> Bem Vindo </p>
                    </div><!--/title-card-->
                    <div class = "input-area">
                       <p class = "text-center msn-alert"> <?php echo $_SESSION['msn_login'] ?>  </p>
                       <input type = "text" name = "nome" placeholder = "Nome de usuario" required  />
                       <input type = "password" name = "senha"  placeholder = "Senha minimo 4 digitos" 
                        required pattern=".{4,}" />
                       <input class = "btn-enviar" type = "submit" name = "logar" value = "Entrar" />
                    </div><!--/input-area-->
                </form>
            </div><!--/card-->

        </div><!--/container-->

    </body>
</html>