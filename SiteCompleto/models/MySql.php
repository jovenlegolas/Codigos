<?php
	
	class MySql
	{
		private $pdo;
		
		public static function conect()
		{
			if(!isset($pdo))
			{
				try
				{
				  $pdo = new PDO('mysql:host=localhost;dbname=schoolsystem','root','',
				  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));				  
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