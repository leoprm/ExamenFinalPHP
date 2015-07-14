<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de eliminar un poducto del sistema.
	|
	*/
	require __DIR__.'/../../config/env.php';
	require __DIR__.'/../../config/auth.php';
	require __DIR__.'/../../clases/Producto.php';
	require __DIR__.'/../../clases/Usuario.php';
	$producto = new Producto;
	
		$idprod= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$imgn= ( isset($_GET['img']) && $_GET['img'] != "" ) ? $_GET['img'] : null;
		$nomprod= ( isset($_GET['nom']) && $_GET['nom'] != "" ) ? $_GET['nom'] : null;

		if($producto->eliminaProducto($idprod)){
			$_SESSION['success_contact'] = true;
            $_SESSION['producto'] = $nomprod;
            
			/*Metodo de php que elimina las imagenes del servidor*/
			$file = ROOT_URL. "assets/dist/img/uploads/" . $imgn;
			$do = unlink($file);
 
			
              
		}else{
			echo "Ha ocurrido un error, trate de nuevo!";
		}
	

header('Location: ' .ROOT_ADMIN. 'productos.php');
?>