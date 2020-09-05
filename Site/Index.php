<?php
	session_start();
	define('INCLUDE_PATH','/outros/base/'); 
	define('BASE_DIR',__DIR__.'/'); 
	define('INCLUDE_PATH_LOGIN','/outros/base/login');
	define('INCLUDE_PATH_HOME','/outros/base/home');
	date_default_timezone_set('America/Sao_Paulo');
	
	include('Application.php');
	include('models/MySql.php');
	include('controllers/Controller.php');
	include('views/View.php');
	include('models/BD.php');
	include('models/Main.php');
	
	$Application = new Application();
	$Application->run();
	ob_end_flush();

?>