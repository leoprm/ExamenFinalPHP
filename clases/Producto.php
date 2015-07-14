	
<?php
require __DIR__.'/../libs/db/db.php';

if( !in_array('Producto', get_declared_classes()) ){
	class Producto{
		private $nombreprod;
		private $sdescripcion;
		private $sprecio;
		private $sdimanc;
		private $sdimal;
		private $imagen;
		private $cantidad;
		private $db;

		function __construct($nom = '',$descr = '',$sprec = 0,$diman = 0,$dimal = 0,$dimg = '',$cant = 0){
			$this->nombreprod=$nom;
			$this->sdescripcion=$descr;	
			$this->sprecio=$sprec;	
			$this->sdimanc=$diman;
			$this->sdimal=$dimal;	
			$this->imagen=$dimg;
			$this->cantidad=$cant;

			$this->db = new DB();
		}

		function AgregarProducto($categoria,$color,$usuario){
			/*Definición del query que permitira ingresar un nuevo registro*/
			$sqlins="insert into PRODUCTO(idcategori,idusuario,nombreprod,descripprod,precio,dimancho,dimalto,imagenprod,color,cantidad)
			values(:cate,:usr,:nomprod,:desc,:prec,:danc,:dalt,:img,:colr,:cant)";
			/*Verifica que el producto no exista*/
			if ($this->traerProducto($this->nombreprod)){
				echo "El produto $this->nombreprod existe en la base de datos.";
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
			$queryins->bindParam(':cate',$categoria);
			$queryins->bindParam(':colr',$color);
			$queryins->bindParam(':usr',$usuario);
			$queryins->bindParam(':nomprod',$this->nombreprod);
			$queryins->bindParam(':desc',$this->sdescripcion);
			$queryins->bindParam(':prec',$this->sprecio);
			$queryins->bindParam(':danc',$this->sdimanc);
			$queryins->bindParam(':dalt',$this->sdimal);
			$queryins->bindParam(':img',$this->imagen);
			$queryins->bindParam(':cant',$this->cantidad);
			
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


		function porCategoria($categoria,$limit = null){
			/*Definición del query que permitira buscar un registrocon filtro*/
			$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';
			$sql = "SELECT * FROM PRODUCTO WHERE idcategori=:cat".$limitText;;
			
			$query = $this->db->conexion->prepare($sql);
			$query->bindParam(':cat',$categoria);		
			
			$query->execute();		
			return $query;		
		}


		function traerProducto($nombreprod){
			/*Definición del query que permitira traer un nuevo registro*/
			$sqlsel="select * from PRODUCTO	where nombreprod=:prod";

			/*Preparación SQL*/
			$querysel=$this->db->conexion->prepare($sqlsel);

			/*Asignación de parametros utilizando bindparam*/
			$querysel->bindParam(':prod',$nombreprod);

			$querysel->execute();


			if ($querysel->rowcount()==1)return true; else return false;

		}

		public function buscarPorID($idprod){
			/*Definición del query que permitira traer un nuevo registro*/
			$sqlsel="select * from PRODUCTO
			where IDPROD=:prod";
		 
 			/*Preparación SQL*/
 			$querysel = $this->db->conexion->prepare($sqlsel);
 			$querysel->bindParam(':prod',$idprod);
 
 			$querysel->execute();
			return $querysel->fetch();
		 }

		function obtenerTodos($limit = null,$excluir = []){
			$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';

			$excluirText = (count($excluir) > 0) ? ' WHERE IDPROD NOT IN( ' : '';
			foreach ($excluir as $valor){
				$excluirText .= ( is_numeric($valor) ) ? addslashes($valor).',' : '';
			}
			$excluirText = (count($excluir) > 0 && $excluirText != ' WHERE IDPROD NOT IN( ' ) ? substr($excluirText, 0,-1).')' : '';

			$sql = "SELECT * FROM PRODUCTO ".$excluirText." ORDER BY RAND()".$limitText;

			$query = $this->db->conexion->prepare($sql);		
			$query->execute();
			
			return $query;
		}

		function eliminaProducto($idproducto){

			/*Definición del query que permitira eliminar un registro*/
			$sqldel="delete from producto where IDPROD=:id";

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
		
		function actualizaProducto($idprod,$categoria,$color,$usuario){

			/*Definicion del query que permitira actualizar */
			$sqlupd="update producto
			set idcategori=:cate ,idusuario=:usr,nombreprod=:nomprod,descripprod=:desc,precio=:prec,dimancho=:danc
			,dimalto=:dalt,imagenprod=:img,color=:colr,cantidad=:cant  
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
			$queryup->bindParam(':cate',$categoria);
			$queryup->bindParam(':id',$idprod);
			$queryup->bindParam(':colr',$color);
			$queryup->bindParam(':usr',$usuario);
			$queryup->bindParam(':nomprod',$this->nombreprod);
			$queryup->bindParam(':desc',$this->sdescripcion);
			$queryup->bindParam(':prec',$this->sprecio);
			$queryup->bindParam(':danc',$this->sdimanc);
			$queryup->bindParam(':dalt',$this->sdimal);
			$queryup->bindParam(':img',$this->imagen);
			$queryup->bindParam(':cant',$this->cantidad);

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