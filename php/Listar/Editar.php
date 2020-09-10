<?php 
  session_start();
  include('models/BD.php');
  include('models/MySql.php');
  
  $_SESSION['msn_edit'] = "";

  if( isset( $_GET['id'] ))
  {
     $id = $_GET['id'];
     $user = \models\BD::select('user','id = ?',array( $id ) );
  }
  else
     \models\BD::redirect( "index.php" );

  if( isset( $_POST['editar']) ) //vai verificar se o usuario acionou o formulario
  {
    
     $nome =  $_POST['nome'];  // a variavel nome recebera o valor que o usuario inseriu no campo 'nome'
     $senha = $_POST['senha']; // a variavel nome recebera o valor que o usuario inseriu no campo 'senha'
     $nomeAtual =  $_POST['nomeAtual'];  // a variavel nome recebera o valor que o usuario inseriu no campo 'nomeAtual'
     $senhaAtual = $_POST['senhaAtual']; // a variavel nome recebera o valor que o usuario inseriu no campo 'senhaAtual'
     $editar = true;
   
     if( $nome != $nomeAtual ) 
     {
        if( \models\BD::verifica('user','nome = ?',array( $nome ) ) == false )
        {
            $editar = false;
            $_SESSION['msn_edit'] = "Nome existente!";
        }
     }
     else
        $nome = $nomeAtual;

     
     if( !empty( $senha ) ) 
     {
        $aux = mb_strlen( $senha );

        if( $aux < 4)
        {
            $editar = false;
            $_SESSION['msn_edit'] = "Senha invalida!";
        }

     }
     else
        $senha = $senhaAtual;

     if($editar == true)
     {
        \models\BD::editar('user','nome = ?, senha = ?',array( $nome, $senha), $id);
        @$_SESSION['msn_edit'] = "Usuario Editado com sucesso!";
     }

    
  }

   if( isset( $_POST['excluir'] ) )
   {
      \models\BD::excluir('user','id = ?', array( $id ) );
      \models\BD::redirect( "index.php" );
   }

 

?>

<html>
    <head>
        <title>Editar</title>
        <!--====================================== Met Tags ===============================================-->	
        <meta charset="utf-8" />
        <!--===============================================================================================-->	
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--===============================================================================================-->	
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--===============================================================================================-->	
        <link rel="shortcut icon" href="img/logo.png" />
        <!--===============================================================================================-->	
        <meta name="description" content="Editar" />
        <!--===============================================================================================-->	
        <meta name="keywords" content="Ediar Usuarios" />
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
                      <p class = "text-center"> Editar  </p>
                    </div><!--/title-card-->
                    <div class = "input-area">
                       <p class = "text-center msn-alert"> <?php echo $_SESSION['msn_edit'] ?>  </p>
                       <input type = "text" name = "nome" placeholder = "Nome de usuario" value = "<?php echo $user[1] ?>"  />
                       <input type = "password" name = "senha"  placeholder = "Nova senha minimo 4 digitos" />
                       <input type = "hidden" name = "nomeAtual" value = <?php echo $user[1] ?> />
                       <input type = "hidden" name = "senhaAtual" value = <?php echo $user[2] ?> />
                       <input class = "btn-enviar btn-delete w50" type = "submit" name = "excluir" value = "Excluir" />
                       <input class = "btn-enviar w50" type = "submit" name = "editar" value = "Editar" />
                    </div><!--/input-area-->
                </form>
            </div><!--/card-->
        </div><!--/container-->

    </body>


</html>