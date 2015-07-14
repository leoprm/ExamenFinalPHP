<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de eliminar una TipoProducto del sistema.
	|
	*/
	require __DIR__.'/../../config/env.php';
	require __DIR__.'/../../config/auth.php';
	require __DIR__.'/../../clases/TipoProducto.php';
	$TipoProducto = new TipoProducto;
	
		$id= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$nombre= ( isset($_GET['nom']) && $_GET['nom'] != "" ) ? $_GET['nom'] : null;

		if($TipoProducto->eliminaTipoProducto($id)){
			$_SESSION['success_contact'] = true;
            $_SESSION['TipoProducto'] = $nombre;
 
			
              
		}else{
			echo "Ha ocurrido un error, trate de nuevo!";
		}
	

header('Location: ' .ROOT_URL. 'TipoProducto.php');
?>