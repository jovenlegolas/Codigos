<?php 
    session_start();
    include('models/BD.php');

    if( @$_SESSION['login'] == true )
        echo "bem vindo   ".$_SESSION['nome'];
    else
        \models\BD::redirect( "index.php" );
?>