<?php
    
	namespace models;
	use \models\MySql;
	
    class BD
    {
		
		
        public static function select($table, $query = '', $arr = '') 
		{
			if($query != false) 
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table WHERE $query");
				$sql->execute( $arr );
			}
			else 
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table");
				$sql->execute();
			}
			return $sql->fetch();
        }
        
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
	
		public static function selectlimit($table, $query = null, $start, $end)
		{
			if($query != null)
			    $sql = \MySql::conectar()->prepare("SELECT * FROM $table $query LIMIT $start,  $end");
			else
			    $sql = \MySql::conectar()->prepare("SELECT * FROM $table LIMIT $start, $end");
	
			$sql->execute();

			
			return $sql->fetchAll();

		}

		
		
        public static function delete($table, $query, $arry) 
		{			
			 $sql = \MySql::conectar()->prepare("DELETE FROM  $table  WHERE $query ");
			 $sql->execute( $arry );
		}

		public static function deleteDivers($table, $itens) 
		{			
			 foreach($itens as $id)
			 {
				$sql = \MySql::conectar()->prepare("DELETE FROM  $table  WHERE id = ? ");
				$sql->execute( array( $id ) );
			 }
		}

		public static function edit($table, $atributo, $arr, $id) 
		{			  
            
		     $sql = \MySql::conectar()->prepare("UPDATE $table SET $atributo WHERE id = $id ");
		     $sql->execute( $arr );
															
		}
		
		public static function editDivers($table, $atributo, $arr, $itens) 
		{			
			 foreach($itens as $id)
			 {
				$sql = \MySql::conectar()->prepare("UPDATE $table SET $atributo WHERE id = $id ");
		    	$sql->execute( $arr );
			 }
		}
        
        public static function checks($table, $query, $arr) 
		{ 
			
			 $verifica = self::select($table, $query, $arr);			
			 
			 if($verifica == null)
				$result = true;
			 else
				$result = false;
				
			 return $result;
		}

		public static function insented($table, $arr, $arr_values) 
		{
			
			$sql = \MySql::conectar()->prepare("INSERT iNTO $table VALUES(null, $arr)");
			$sql->execute( $arr_values );
         
		}
		
		public static function search($table, $query) 
		{
			
			$sql = \MySql::conectar()->prepare("SELECT * FROM `$table` $query ");
			$sql->execute();		
			return $sql->fetchAll();

		}
		
	

    }
?>