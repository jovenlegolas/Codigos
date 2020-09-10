<?php
    
	namespace models;
	use \models\MySql;
	
    class BD
    {
		
		// vai selecionar varios objetos do banco de dados
		// ( query = paramentos como: nome = ? e idade = ? || order = ordem de listagem || arr = valores como : nome,idade )
		public static function selectAll($table, $query = '', $order = '', $arr = '')
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
	
		

		// vai selecionar  um objeto do banco de dados ( query = paramentos como: nome = ? e idade = ? || arr = valores como : nome,idade )
        public static function select($table, $query = '', $arr = '') 
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
        
        
	    //verificar se existe um objeto na tabela ( query = paramentos como: nome = ? e idade = ? || arr = valores como : nome,idade )
        public static function verifica($table, $query, $arr) 
		{ 
			
			 $verifica = self::select($table, $query, $arr);			
			 
			 if($verifica == null)// caso nao encontre nem um cadastro retornara true e se encontra  retorne false
				$result = true; 
			 else
				$result = false;
				
			 return $result;
		}

        //vai insiri valores ( arr = quantidade de valores que vai ser inseridos || arr_values = valores a serem inseridos )
		public static function inserir($table, $arr, $arr_values) 
		{
			
			$sql = \MySql::conectar()->prepare("INSERT iNTO $table VALUES(null, $arr)");
			$sql->execute( $arr_values );
         
		}
        
        		
        public static function excluir($table, $query, $arry) //excluira um arquivo
		{			
			 $sql = \MySql::conectar()->prepare("DELETE  FROM  $table  WHERE $query ");
			 $sql->execute( $arry );
		}

		
		public static function editar($table, $atributo, $arr, $id) // vai editita um arquivo com base no id
		{			  
            
		     $sql = \MySql::conectar()->prepare("UPDATE $table SET $atributo WHERE id = $id ");
		     $sql->execute( $arr );
															
		}
		
		public static function redirect( $url ) // medoto responsavel por instancia arquivos com base na url
		{
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}
	
        
     

    }
?>