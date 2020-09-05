<?php
	
	class MySql
	{
		private $pdo;
		
		public static function conectar()
		{
			if(!isset($pdo))
			{
				try
				{
				  $pdo = new PDO('mysql:host=localhost;dbname=sistema','root','',
				  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));		
				  //$pdo = new PDO('mysql:host=sql306.epizy.com;dbname=epiz_26443478_webEscolar','epiz_26443478','mQInWIDsxhvf2R',
				  //array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));			  
				}
				catch(Exception $e)
				{
				  echo '<h2>Erro ao conectar</h2>';
				}
			}

			return $pdo;
		}
	}
?>