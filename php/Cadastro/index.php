<?php 
  session_start();
  include('models/BD.php');
  include('models/MySql.php');

  $_SESSION['msn_cadastro'] = "";

   if( isset( $_POST['cadastro']) ) //vai verificar se o usuario acionou o formulario
  {
     //vai receber os dados inseridos no formulario 
     $nome =  $_POST['nome'];  // a variavel nome recebera o valor que o usuario inseriu no campo 'nome'
     $senha = $_POST['senha']; // a variavel nome recebera o valor que o usuario inseriu no campo 'senha'
     $img = "img1.jpg";

     if( \models\BD::verifica('user','nome = ?',array( $nome ) ) == true )
     {
         \models\BD::inserir('user', '?,?,?', array( $nome,$senha,$img ) );
         $_SESSION['msn_cadastro'] = "Cadastro Efetuado!";
     }
     else
         $_SESSION['msn_cadastro'] = "Nome existente!";
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro</title>
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
                      <p class = "text-center"> Cadastre-se  </p>
                    </div><!--/title-card-->
                    <div class = "input-area">
                       <p class = "text-center msn-alert"> <?php echo $_SESSION['msn_cadastro'] ?>  </p>
                       <input type = "text" name = "nome" placeholder = "Nome de usuario" required  />
                       <input type = "password" name = "senha"  placeholder = "Senha minimo 4 digitos" 
                        required pattern=".{4,}" />
                       <input class = "btn-enviar" type = "submit" name = "cadastro" value = "Cadastre-se" />
                    </div><!--/input-area-->
                </form>
            </div><!--/card-->
            
        </div><!--/container-->

    </body>
</html>