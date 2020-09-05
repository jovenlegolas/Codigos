<?php 
  session_start();
  include('models/BD.php');
  include('models/MySql.php');

  if( isset( $_POST['cadastro']) )
  {
     $nome = strip_tags( $_POST['nome'] );
     $senha = strip_tags( md5( $_POST['senha'] ) );
     $img = strip_tags( $_POST['img'] );

     if( \models\BD::verifica('grades','nome = ?',array( $nome ) ) == false )
        \models\BD::inserir('user', '?,?,?', array( $nome,$senha,$img ) );
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


</html>