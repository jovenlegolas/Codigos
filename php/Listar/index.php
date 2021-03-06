<?php 
      include('models/BD.php');
      include('models/MySql.php');

      $query = "";

	  if( isset( $_POST['pesquisa'] ) )
	  {
		$busca = $_POST['busca'];
		$query = " nome LIKE '%$busca%'";
      }
      
      $user = \models\BD::selectAll('user',$query,'nome', array() );

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
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

            <div class="container-title">
                <div class="title">
                    <h2 class="text-center"> <i class="fa fa-user"></i>  Usuarios  </h2>
                </div>
            </div><!--/container-title-->

            <div class="pesquisa-card" id="usuario">
                <form method="post" >
                    <div class="input-area">
                        <input placeholder="Procure por: Nome." class="input-busca" type="text" name="busca">
                        <div class="icone-search" style="color: rgb(44, 2, 23);">
                            <button  name="pesquisa" class="icone-search" style="color: rgb(44, 2, 23);">
                            <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-users">

                <?php foreach($user as $key => $value ) {?>

                    <div class="card-user">
                        <div class="card-user-img">
                            <img src = "img/<?php echo $value['img'] ?>" alt="<?php echo $value['nome'] ?>" />
                        </div>
                        <div class="card-user-dados">
                            <p class="text-center"> <i class="fa fa-user"></i> <?php echo $value['nome'] ?></p>
                            <p class="text-center"> <i class="fas fa-envelope"></i> user@gmail.com </p>
                            <p class="text-center"> <i class="fa fa-calendar-alt"></i> 06/06/1966 </p>
                        </div>
                        <a class="btn-editar text-center" href="Editar.php?id=<?php echo $value['id'] ?>"> Editar</a>
                    </div><!--card-user-->

                <?php }?> 

            </div><!--card-users-->

        </div><!--/container-->

    </body>
</html>