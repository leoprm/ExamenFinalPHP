<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar los cambios de producto en el sistema.
	|
	*/
	require __DIR__.'/../config/env.php';
	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../clases/Producto.php';
	require __DIR__.'/../clases/Usuario.php';

	if( !empty($_POST['nomProducto']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['ancho']) && !empty($_POST['alto']) && !empty($_POST['cantidad'])&& !empty($_POST['color'])&& !empty($_POST['categoria']) )
	{
		$idprod 	 = ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$nomProducto = $_POST['nomProducto'];
		$descripcion = $_POST['descripcion'];
		$precio      = $_POST['precio'];
		$cantidad    = $_POST['cantidad'];
		$categoria   = $_POST['categoria'];
		$usuario     = $_SESSION['usuario']['id'];
		$producto    = new Producto($nomProducto,$descripcion,$precio,$cantidad);
		
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: ' .ROOT_URL. 'productos.php');
?>