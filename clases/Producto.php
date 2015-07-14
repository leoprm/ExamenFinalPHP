	
<?php
require __DIR__.'/../libs/db/db.php';

if( !in_array('Producto', get_declared_classes()) ){
	class Producto{
		private $nombre;
		private $sdescripcion;
		private $sprecio;
		private $tipoProd;
		private $unidades;
		private $db;

		function __construct($nom = '',$descr = '',$sprec = 0,$dtip = '',$uni = 0){
			$this->nombre=$nom;
			$this->sdescripcion=$descr;	
			$this->sprecio=$sprec;	
			$this->tipoProd=$dtip;
			$this->unidades=$uni;

			$this->db = new DB();
		}

		function AgregarProducto(){
			/*Definición del query que permitira ingresar un nuevo registro*/
			$sqlins="insert into PRODUCTOS(id,nombre,descripcion,precio,unidades,tipo_productos_id)
			values(null,:nom,:desc,:prec,:uni,:tpi)";
			/*Verifica que el producto no exista*/
			if ($this->traerProducto($this->nombre)){
				echo "El producto $this->nombre ya existe en la base de datos.";
				return false;
			}
			/*Preparación SQL*/
			try {
				$queryins=$this->db->conexion->prepare($sqlins);
			}
			catch( PDOException $Exception ) {
				echo "Clase Producto:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			
			/*Asignación de parametros utilizando bindparam*/
			$queryins->bindParam(':nom',$nombre);
			$queryins->bindParam(':desc',$sdescripcion);
			$queryins->bindParam(':prec',$sprecio);
			$queryins->bindParam(':uni',$this->unidades);
	
			try {
				$queryins->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Producto:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				die();
				return false;
			}
			return true;
		}


		function porTipo($tipoProd,$limit = null){
			/*Definición del query que permitira buscar un registrocon filtro*/
			$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';
			$sql = "SELECT * FROM PRODUCTOS WHERE tipo_productos_id=:tipo".$limitText;;
			
			$query = $this->db->conexion->prepare($sql);
			$query->bindParam(':tipo',$tipoProd);		
			
			$query->execute();		
			return $query;		
		}


		function traerProducto($nombre){
			/*Definición del query que permitira traer un nuevo registro*/
			$sqlsel="select * from PRODUCTOS where nombre=:prod";

			/*Preparación SQL*/
			$querysel=$this->db->conexion->prepare($sqlsel);

			/*Asignación de parametros utilizando bindparam*/
			$querysel->bindParam(':prod',$nombre);

			$querysel->execute();


			if ($querysel->rowcount()==1)return true; else return false;

		}

		public function buscarPorID($idprod){
			/*Definición del query que permitira traer un nuevo registro*/
			$sqlsel="select * from PRODUCTOS
			where ID=:prod";
		 
 			/*Preparación SQL*/
 			$querysel = $this->db->conexion->prepare($sqlsel);
 			$querysel->bindParam(':prod',$idprod);
 
 			$querysel->execute();
			return $querysel->fetch();
		 }

		function obtenerTodos($limit = null,$excluir = []){
			$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';

			$excluirText = (count($excluir) > 0) ? ' WHERE ID NOT IN( ' : '';
			foreach ($excluir as $valor){
				$excluirText .= ( is_numeric($valor) ) ? addslashes($valor).',' : '';
			}
			$excluirText = (count($excluir) > 0 && $excluirText != ' WHERE ID NOT IN( ' ) ? substr($excluirText, 0,-1).')' : '';

			$sql = "SELECT * FROM PRODUCTOS ".$excluirText." ORDER BY RAND()".$limitText;

			$query = $this->db->conexion->prepare($sql);		
			$query->execute();
			
			return $query;
		}

		function eliminaProducto($idproducto){

			/*Definición del query que permitira eliminar un registro*/
			$sqldel="delete from producto where ID=:id";

			/*Preparación SQL*/
			$querydel=$this->db->conexion->prepare($sqldel);

			$querydel->bindParam(':id',$idproducto);

			try {
				$querydel->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Producto:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			return true;
		}
		
		function actualizaProducto($idprod){

			/*Definicion del query que permitira actualizar */
			$sqlupd="update PRODUCTOS
			set id=:idprod ,nombre=:nomprod,descripcion=:desc,precio=:prec,tipo_productos_id=:tpi,unidades=:uni  
			where IDPROD=:id";


			/*Preparación SQL*/
			try {
				$queryup=$this->db->conexion->prepare($sqlupd);
			}
			catch( PDOException $Exception ) {
				echo "Clase Producto:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			
			/*Asignacion de parametros utilizando bindparam*/
			$queryup->bindParam(':id',$idprod);
			$queryup->bindParam(':nomprod',$this->nombre);
			$queryup->bindParam(':desc',$this->sdescripcion);
			$queryup->bindParam(':prec',$this->sprecio);
			$queryup->bindParam(':tip',$this->tipoProd);
			$queryup->bindParam(':uni',$this->unidades);

			try {
				$queryup->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Producto:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				die();
				return false;
			}
			return true;
		}
	}
}
?>	