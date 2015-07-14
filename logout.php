<?php
	/*
	|--------------------------------------------------------------------------
	| Logout
	|--------------------------------------------------------------------------
	|
	| Archivo encargado de cerrar la sesion de adminitracion
	|
	*/
	require __DIR__.'/config/env.php';

	session_destroy();
  	header('Location: '.ROOT_URL.'login.php');
?>