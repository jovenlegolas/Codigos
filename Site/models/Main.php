<?php
    
    namespace models;
    
    class main
    {
		
        function limitsCharacters($text, $limit, $break = true) 
		{
			mb_internal_encoding("UTF-8");
			$text =  $text;
			$size =  mb_strlen( $text, 'UTF-8' );
			if($size <= $limit)
			{ 
			   $newText =  $text ;
			}
			else
			{ 
			   if($break == true)
			   { 
				  $nowText = trim( mb_substr( $text, 0, $limit ) )."...";
			   }
			   else
			   { 
				  $lastSpace = strrpos( substr( $text, 0, $limit ), " "); 
				  $newText = trim( substr( $text, 0, $lastSpace ) )."..."; 
			   }
			}
			return $newText;
		}

		

		public static function exit() 
		{
			session_destroy();
			self::redirect(INCLUDE_PATH);
		}

		public static function redirect( $url ) 
		{
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		public static function generateSlug( $str ) 
		{
			$str = mb_strtolower( $str );
			$str = preg_replace('/(â|á|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é)/', 'e', $str);
			$str = preg_replace('/(í|Í)/', 'i', $str);
			$str = preg_replace('/(ú)/', 'u', $str);
			$str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
			$str = preg_replace('/( )/', '-',$str);
			$str = preg_replace('/ç/','c',$str);
			$str = preg_replace('/(-[-]{1,})/','-',$str);
			$str = preg_replace('/(,)/','-',$str);
			$str = preg_replace('/(\+)/','-',$str);
			$str=strtolower( $str );
			return $str;
		}

		public static function imgValid( $img ) // verificar se e uma imagem
		{
			if( $img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' || $img['type'] == 'image/png' )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		 


		public static function uploadFile( $file ) 
		{
			define('BASE_DIR',__DIR__.'/');
			$formatFile = explode('.',$file['name'] );
			$imgName = uniqid().'.'.$formatFile[count( $formatFile ) - 1];
			if( move_uploaded_file( $file['tmp_name'],BASE_DIR.'../views/templates/upload/'.$imgName ) )
				return $imgName;
			else
				return false;
		}

		

    }
?>