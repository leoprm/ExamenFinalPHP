<?php
require __DIR__.'/../../config/env.php';

if( !in_array('DB', get_declared_classes()) ){
	class DB{
		
		public $conexion;

		function __construct(){
			$this->conexion = $this->conectar();
		}

		private function conectar(){
			$db = new PDO(MYSQL_SERVER.";".MYSQL_DB,MYSQL_USER,MYSQL_PASS);
			$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}
	}	
}

?>