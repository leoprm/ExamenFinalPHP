<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar los cambios de tipoProducto en el sistema.
	|
	*/
	require __DIR__.'/../config/env.php';
	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../clases/TipoProducto.php';

	if( !empty($_POST['nomTipoProducto']) && !empty($_POST['descripcion']))
	{
		$idcat 	 = ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$nomTipoProducto = $_POST['nomTipoProducto'];
		$descripcion = $_POST['descripcion'];
		$TipoProducto    = new TipoProducto($nomTipoProducto,$descripcion);
		
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: ' .ROOT_URL. 'TipoProducto.php');
?>