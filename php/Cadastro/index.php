<?php 
  session_start();
  include('models/BD.php');
  include('models/MySql.php');

  if( isset( $_POST['cadastro']) ) //vai verificar se o usuario acionou o formulario
  {
     //vai receber os dados inseridos no formulario 
     $nome =  $_POST['nome'];  // a variavel nome recebera o valor que o usuario inseriu no campo 'nome'
     $senha = $_POST['senha']; // a variavel nome recebera o valor que o usuario inseriu no campo 'senha'
     $img = "img1.jpg";

     if( \models\BD::verifica('user','nome = ?',array( $nome ) ) == true )
     {
         \models\BD::inserir('user', '?,?,?', array( $nome,$senha,$img ) );
         @$_SESSION['msn'] = "Cadastro Efetuado!";
     }
     else
        @$_SESSION['msn'] = "Nome existente!";
  }
?>

<html>
    <head>
        <title>Cadastro</title>
        <!--====================================== Met Tags ===============================================-->	
        <meta charset="utf-8" />
        <!--===============================================================================================-->	
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--===============================================================================================-->	
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--===============================================================================================-->	
        <link rel="shortcut icon" href="img/logo.png" />
        <!--===============================================================================================-->	
        <meta name="description" content="Cadastro" />
        <!--===============================================================================================-->	
        <meta name="keywords" content="Pagina de Cadastro" />
        <!--===============================================================================================-->
        <meta name="author" content="Jovem Legolas" />
        <!--===============================================================================================-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
        <!--============================================= Css =============================================-->	
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	      <!--===============================================================================================-->	
	      <link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/all.css" /> 
        <!--===============================================================================================-->
    </head>
    <body>
        <header>

          <div class = "logo">
              <img src = "img/logo.png" alt = "logo" />
              <p> Instituto Federal Campus Urutai </p>
          </div><!--/logo-->

          <nav class = "div-social">
              <ul>
                 <li class = "whatsapp"> <a href= "#">   <i class="fab fa-whatsapp"></i>   </a></li>
                 <li class = "fecebook"> <a href = "#">  <i class="fab fa-facebook-f"></i> </a></li>
                 <li class = "twitter">  <a href = "#">  <i class="fab fa-twitter"></i>    </a></li>
              </ul>
          </nav><!--/div-social-->

        </header>

        <div class = "container">
            <div class = "card">
                <form method = "post">
                    <div class = "title-card"> 
                      <p class = "text-center"> Cadastre-se  </p>
                    </div><!--/title-card-->
                    <div class = "input-area">
                       <p class = "text-center msn-alert"> <?php echo @$_SESSION['msn'] ?>  </p>
                       <input type = "text" name = "nome" placeholder = "Nome de usuario" required  />
                       <input type = "password" name = "senha"  placeholder = "Senha minimo 4 digitos" required pattern=".{4,}" />
                       <input class = "btn-enviar" type = "submit" name = "cadastro" value = "Cadastre-se" />
                    </div><!--/input-area-->
                </form>
            </div><!--/card-->
        </div><!--/container-->

    </body>


</html>