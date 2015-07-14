<?php

/*
|--------------------------------------------------------------------------
| Verificacion de sesion
|--------------------------------------------------------------------------
|
| Este archivo se encarga de verificar una sesion de usuario, si no existe
| redirecciona al login.
|
*/

require __DIR__.'\env.php';

$haySesion = array_key_exists('usuario', $_SESSION) && is_array($_SESSION['usuario']) && count($_SESSION['usuario']) == 6;

//Si el request es login o dologin se redirecciona al index
$paginaActual = $_SERVER['PHP_SELF'];
if( ($paginaActual == ROOT_URL.'login.php' || $paginaActual == ROOT_URL.'dologin.php')  && $haySesion ){
	header('Location: '.ROOT_URL.'index.php');	
}
else{
	//Validamos sesion valida
	if( !$haySesion && ($paginaActual != ROOT_URL.'login.php' && $paginaActual != ROOT_URL.'dologin.php') ){
		session_destroy();
		header('Location: '.ROOT_URL.'login.php');
	}
}