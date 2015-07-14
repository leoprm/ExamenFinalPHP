<?php
/*
|--------------------------------------------------------------------------
| Clase conexion a tabla 
|--------------------------------------------------------------------------
|
| Clase que linkea la tabla PERFILES de la base de datos
|
*/


require __DIR__.'/../libs/db/db.php';

class Perfil
{ 
	private $nombre;
	private $descripcion;
	private $db;

	function __construct($nom=null,$sdes=null){
		$this->nombre=$nom;
		$this->descripcion=$sdes;

		$this->db = new DB();
	}

	function AgregarPerfil(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into PERFILES(ID, NOMBRE, DESCRIPCION)
		values(null,:nom,:desc)";
		/*Verifica que el Perfil no exista*/
		if ($this->VerificaPerfil()){
			echo "El Perfil $this->nombre ya existe en la base de datos.";
			return false;
		}
		/*Preparación SQL*/
				try {
					$query = $this->db->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Perfil:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		
		$query->bindParam(':nom',$this->nombre);
		$query->bindParam(':desc',$this->descripcion);
		
		try {
			$query->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Perfil:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}

	function VerificaPerfil(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select NOMBRE from PERFILES
		where NOMBRE=:nom";
	
		/*Preparación SQL*/
		$querysel=$this->db->conexion->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':nom',$this->nombre);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}


	function ObtenerLista(){
		/*Definición del query que permitira obtener la lista de PERFILES*/
		$sqlsel="select * from PERFILES";
		
		/*Preparación SQL*/
		$querylis = $this->db->conexion->prepare($sqlsel);
		$querylis->execute();	

		return $querylis;
	}

	function eliminaPerfil($idPerfil){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from PERFILES where ID=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idPerfil);

		$valaux=$querydel->execute();

		return $valaux;
	}

	public function buscarPorID($idPerfil){
		$sql = "SELECT * FROM PERFILES where ID=:id";
		$query = $this->db->conexion->prepare($sql);

		$query->bindParam(':id',$idPerfil);
		$query->execute();

		return $query->fetch();
	}


		function actualizaPerfil($idPerfil){

			/*Definicion del query que permitira actualizar */
			$sqlupd="update PERFILES
			set NOMBRE=:nom ,DESCRIPCION=:desc
			where ID=:id";


			/*Preparación SQL*/
			try {
				$queryup=$this->db->conexion->prepare($sqlupd);
			}
			catch( PDOException $Exception ) {
				echo "Clase Perfil:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			
			/*Asignacion de parametros utilizando bindparam*/
			$queryup->bindParam(':id',$idPerfil);
			$queryup->bindParam(':nom',$this->nombre);
			$queryup->bindParam(':desc',$this->descripcion);

			//echo "<pre>";
			//print_r( $queryup->debugDumpParams() );die();
			try {
				$queryup->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Perfil:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				die();
				return false;
			}
			return true;
		}
}
 ?>