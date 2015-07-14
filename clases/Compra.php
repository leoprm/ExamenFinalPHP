<?php
/*
|--------------------------------------------------------------------------
| Clase conexion a tabla 
|--------------------------------------------------------------------------
|
| Clase que linkea la tabla ORDENES_COMPRA de la base de datos
|
*/


require __DIR__.'/../libs/db/db.php';

class Compra
{ 
	private $emision;
	private $total;
	private $estado;
	private $db;

	function __construct($emi=null,$tot=null,$est=null){
		$this->emision=$emi;
		$this->total=$tot;
		$this->estado=$est;

		$this->db = new DB();
	}

	function AgregarCompra($usuarioId){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into ORDENES_COMPRA(ID, fecha_emision, monto_total, estado, usuarios_id_usuario)
		values(null,:emi,:tot;est;prdId)";
		/*Verifica que la Compra no exista*/
		if ($this->VerificaCompra()){
			echo "La Compra ingresada ya existe en la base de datos.";
			return false;
		}
		/*Preparación SQL*/
				try {
					$query = $this->db->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Compra:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		
		$query->bindParam(':emi',$this->emision);
		$query->bindParam(':tot',$this->total);
		$query->bindParam(':est',$this->estado);
		$query->bindParam(':usrId',$usuarioId);
		
		try {
			$query->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Compra:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}

	function VerificaCompra($idCompra){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select emision from ORDENES_COMPRA
		where ID=:idDet";
	
		/*Preparación SQL*/
		$querysel=$this->db->conexion->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':idDet',$idCompra);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}


	function ObtenerLista(){
		/*Definición del query que permitira obtener la lista de ORDENES_COMPRA*/
		$sqlsel="select * from ORDENES_COMPRA";
		
		/*Preparación SQL*/
		$querylis = $this->db->conexion->prepare($sqlsel);
		$querylis->execute();	

		return $querylis;
	}

	function eliminaCompra($idCompra){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from ORDENES_COMPRA where ID=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idCompra);

		$valaux=$querydel->execute();

		return $valaux;
	}

	public function buscarPorID($idCompra){
		$sql = "SELECT * FROM ORDENES_COMPRA where ID=:id";
		$query = $this->db->conexion->prepare($sql);

		$query->bindParam(':id',$idCompra);
		$query->execute();

		return $query->fetch();
	}


		function actualizaCompra($idCompra){

			/*Definicion del query que permitira actualizar */
			$sqlupd="update ORDENES_COMPRA
			set emision=:emi ,monto_total=:tot, estado=est
			where ID=:id";


			/*Preparación SQL*/
			try {
				$queryup=$this->db->conexion->prepare($sqlupd);
			}
			catch( PDOException $Exception ) {
				echo "Clase Compra:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			
			/*Asignacion de parametros utilizando bindparam*/
			$queryup->bindParam(':id',$idCompra);
			$queryup->bindParam(':emi',$this->emision);
			$queryup->bindParam(':tot',$this->total);
			$query->bindParam(':est',$this->estado);

			//echo "<pre>";
			//print_r( $queryup->debugDumpParams() );die();
			try {
				$queryup->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Compra:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				die();
				return false;
			}
			return true;
		}
}
 ?>