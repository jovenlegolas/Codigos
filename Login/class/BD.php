<?php
    
	namespace models;
	use \models\MySql;
	
    class BD
    {
		
		//table = tabela
		//query = paramentos exemplo(nome = ? AND idade = ?)
		//arry = valores exemplo(joao, 13)
		//order = ordem de listagem com base em uma coluna do banco de dados exemplo: nome, id
		// star = vai selecionar os arquivos a parti de 
		// end = vai selecionar ate ...


        public static function select($table, $query = '', $arr = '') // vai selecionar apenas um objeto do banco de dados
		{
			if($query != false) // se nao exitir paramentos
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table WHERE $query");
				$sql->execute( $arr );
			}
			else // se existir
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table");
				$sql->execute();
			}
			return $sql->fetch();
        }
        
        public static function selectAll($table, $query = '', $order = '', $arr = '')// vai selecionar todos os objetos do banco de dados
		{
			if($query != false)
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table WHERE $query ORDER BY $order ASC");
				$sql->execute( $arr );
			}
			else
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table ");
				$sql->execute();
			}
			
			return $sql->fetchAll();

		}
	
		public static function selectlimit($table, $query = null, $start, $end)// selecinar onjetos entre um derteminado intervalo
		{
			if($query != null)
			    $sql = \MySql::conectar()->prepare("SELECT * FROM $table $query LIMIT $start,  $end");
			else
			    $sql = \MySql::conectar()->prepare("SELECT * FROM $table LIMIT $start, $end");
	
			$sql->execute();

			
			return $sql->fetchAll();

		}

		
		
        public static function excluir($table, $query, $arry) //excluira um arquivo
		{			
			 $sql = \MySql::conectar()->prepare("DELETE  FROM  $table  WHERE $query ");
			 $sql->execute( $arry );
		}

		public static function excluirVarios($table, $itens) // excluira varios arquivos com base no id
		{			
			 foreach($itens as $id)
			 {
				$sql = \MySql::conectar()->prepare("DELETE FROM  $table  WHERE id = ? ");
				$sql->execute( array( $id ) );
			 }
		}

		public static function editar($table, $atributo, $arr, $id) // vai editita um arquivo com base no id
		{			  
            
		     $sql = \MySql::conectar()->prepare("UPDATE $table SET $atributo WHERE id = $id ");
		     $sql->execute( $arr );
															
		}
		
		public static function editarVarios($table, $atributo, $arr, $itens) // editar varios arquivos com base no id
		{			
			 foreach($itens as $key => $value)
			 {
				$sql = \MySql::conectar()->prepare("UPDATE $table SET $atributo WHERE  materia = ? ");
		    	$sql->execute( $arr );
			 }
		}
        
        public static function verifica($table, $query, $arr) // verificar se ja existe a tal cadastro na tabela
		{ 
			
			 $verifica = self::select($table, $query, $arr);			
			 
			 if($verifica == null)
				$result = true;
			 else
				$result = false;
				
			 return $result;
		}

		public static function inserir($table, $arr, $arr_values) // vai insiri valores
		{
			
			$sql = \MySql::conectar()->prepare("INSERT iNTO $table VALUES(null, $arr)");
			$sql->execute( $arr_values );
         
		}
		
		public static function pesquisa($table, $query) // vai retorna objetos com valores parecidos com os passados
		{
			
			$sql = \MySql::conectar()->prepare("SELECT * FROM `$table` $query ");
			$sql->execute();		
			return $sql->fetchAll();

		}
		
	

    }
?>