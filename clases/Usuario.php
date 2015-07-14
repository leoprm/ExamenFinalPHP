	<?php
require __DIR__.'/../libs/db/db.php';

class Usuario{

	public $id;
	public $login;
	public $password;
	public $nombre;
	public $apellido;
	public $correo;
	public $edad;
	public $perfil;
	public $nacimiento;
	public $db;

	function __construct($corr,$pass,$nom=null,$ape=null,$ed=null,$perf=null,$nac=null,$log=null){
		$this->login        = $log;
		$this->password     = md5($pass);		
		$this->nombre       = $nom;	
		$this->apellido		= $ape;
		$this->correo       = $corr;
		$this->edad 		= $ed;
		$this->perfil       = $perf;
		$this->nacimiento   = $nac;
		
		$this->db           = new DB();
	}
	
	public function login(){
		$sqlsel="select nombre_usuario,pass_usuario,id_usuario,login_usuario,apellido_usuario,correo_usuario,edad_usuario,codigo_perfil,fechaNacimiento_usuario	 from usuarios
		where correo_usuario=:usr and pass_usuario=:pwd";

		$query = $this->db->conexion->prepare($sqlsel);

		$query->bindParam(':usr',$this->correo);
		$query->bindParam(':pwd',$this->password);
		
		$query->execute();
		
		if($query->rowcount() == 1){
			//Si existe el usuario reasignamos los valores traidos de la DB
			$usuario            = $query->fetch();
			$this->id           = $usuario['id_usuario'];
			$this->usuario      = $usuario['login_usuario'];
			$this->nombre       = $usuario['nombre_usuario'];	
			$this->apellido     = $usuario['apellido_usuario'];
			$this->edita        = $usuario['edita'];
			return true;
		}

		return false;
	}
	
	/*Trae Nombre usuario cuando inicia sesion*/
	function VerificaUsuario(){
		/*Definición del query que permitira buscar un nuevo registro*/
		$sqlsel="select login_usuario from usuarios
		where emailuser=:usr";
	
		/*Preparación SQL*/
		$this->db->conexion->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->login);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return $querysel; else return false;
	
	}
	
}
?>