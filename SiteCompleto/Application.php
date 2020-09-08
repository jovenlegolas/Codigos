<?php
	
	class Application{

	
		const DEFAULT = 'login'; 

		public function run()
		{
			
			$token = md5( @$_SESSION['id'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'] ); 
			
			
			if( isset( $_GET['url'] ) ) 
			{
               
				$url = explode('/',$_GET['url']); 
				$file = 'controllers/'.ucfirst( $url[0] ).'Controller.php'; 
			
				
				if( file_exists( $file ) ) 
				{		
				    $Class = 'controllers\\'.ucfirst( $url[0] ).'Controller';
				    include( $file );
				}
				else
				{
					$Class = 'controllers\\'.self::DEFAULT.'Controller';
					$file = 'controllers/'.self::DEFAULT.'Controller.php';
					$url[0] = self::DEFAULT;
					include( $file );
				}
				   
			}

			else
			{
				$Class = 'controllers\\'.self::DEFAULT.'Controller';
				$file = 'controllers/'.self::DEFAULT.'Controller.php';
				$url[0] = self::DEFAULT;
				include( $file );
			}
			 
			
			if( @$_SESSION['sessao'] != null )
			{
				if( $token == @$_SESSION['sessao'] )
				{
					$controller = new $Class();
					$controller->index();
				}
				else
				   die("ERRO 404");
			}
			else
			{			
					$controller = new $Class();
					$controller->index();
			}
		
			
		
		}

	}

?>