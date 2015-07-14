<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar una nueva TipoProducto en el sistema.
	|
	*/
	require __DIR__.'/../config/env.php';
	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../clases/TipoProducto.php';

	if( !empty($_POST['nombre']) && !empty($_POST['descripcion']) )
	{
		$nombre= $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$TipoProducto    = new TipoProducto($nombre,$descripcion);
        var_dump($TipoProducto);
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: ' .ROOT_ADMIN. 'agregar-TipoProducto.php');
?>