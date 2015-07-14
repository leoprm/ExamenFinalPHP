<?php
/*
|--------------------------------------------------------------------------
| Clase conexion a tabla 
|--------------------------------------------------------------------------
|
| Clase que linkea la tabla DETALLE_OC de la base de datos
|
*/


require __DIR__.'/../libs/db/db.php';

class Detalle
{ 
	private $cantidad;
	private $total;
	private $db;

	function __construct($cant=null,$tot=null){
		$this->cantidad=$cant;
		$this->total=$tot;

		$this->db = new DB();
	}

	function AgregarDetalle($ordenId,$productoId){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into DETALLE_OC(ID, cantidad, sub_total, ordenes_compra_id, productos_id)
		values(null,:cant,:tot;ordId;prdId)";
		/*Verifica que el Detalle no exista*/
		if ($this->VerificaDetalle()){
			echo "El Detalle $this->cantidad ya existe en la base de datos.";
			return false;
		}
		/*Preparación SQL*/
				try {
					$query = $this->db->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Detalle:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		
		$query->bindParam(':cant',$this->cantidad);
		$query->bindParam(':tot',$this->total);
		$query->bindParam(':ordId',$ordenId);
		$query->bindParam(':prdId',$productoId);
		
		try {
			$query->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Detalle:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}

	function VerificaDetalle($idDetalle){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select cantidad from DETALLE_OC
		where ID=:idDet";
	
		/*Preparación SQL*/
		$querysel=$this->db->conexion->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':idDet',$idDetalle);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}


	function ObtenerLista(){
		/*Definición del query que permitira obtener la lista de DETALLE_OC*/
		$sqlsel="select * from DETALLE_OC";
		
		/*Preparación SQL*/
		$querylis = $this->db->conexion->prepare($sqlsel);
		$querylis->execute();	

		return $querylis;
	}

	function eliminaDetalle($idDetalle){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from DETALLE_OC where ID=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idDetalle);

		$valaux=$querydel->execute();

		return $valaux;
	}

	public function buscarPorID($idDetalle){
		$sql = "SELECT * FROM DETALLE_OC where ID=:id";
		$query = $this->db->conexion->prepare($sql);

		$query->bindParam(':id',$idDetalle);
		$query->execute();

		return $query->fetch();
	}


		function actualizaDetalle($idDetalle){

			/*Definicion del query que permitira actualizar */
			$sqlupd="update DETALLE_OC
			set cantidad=:cant ,total=:tot
			where ID=:id";


			/*Preparación SQL*/
			try {
				$queryup=$this->db->conexion->prepare($sqlupd);
			}
			catch( PDOException $Exception ) {
				echo "Clase Detalle:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			
			/*Asignacion de parametros utilizando bindparam*/
			$queryup->bindParam(':id',$idDetalle);
			$queryup->bindParam(':cant',$this->cantidad);
			$queryup->bindParam(':tot',$this->total);

			//echo "<pre>";
			//print_r( $queryup->debugDumpParams() );die();
			try {
				$queryup->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Detalle:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				die();
				return false;
			}
			return true;
		}
}
 ?>