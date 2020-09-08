<?php
    
	namespace models;
	use \models\MySql;
	
    class BD
    {
		
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
		
    }
?>