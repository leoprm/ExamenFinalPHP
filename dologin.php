<?php
	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| Archivo encargado de crear el inicio de sesion
	|
	*/
	require __DIR__.'/config/auth.php';
	require __DIR__.'/config/env.php';
	require __DIR__.'/clases/Usuario.php';
	
	if( !empty($_POST['email']) && !empty($_POST['pass']) ){
		$usuario = new Usuario($_POST['email'],$_POST['pass']);
		if($usuario->login()){
	    	$_SESSION['usuario'] = [
	    		'id' => $usuario->id ,
	    		'nombre' => $usuario->nombre ,
	    		'username' => $usuario->username ,
	    		'email' => $usuario->email ,
	    		'fechaIngreso' => $usuario->fechaIngreso ,
	    		'puedeEditar' => $usuario->edita 
	    	];
			header('Location: index.php');
		}
		else{
			$_SESSION['error_tmp'] = "Credenciales de acceso incorrectas";
			header('Location: login.php');
		}		
	}
	else{
		$_SESSION['error_tmp'] = "Se requiren los datos de acceso";
		header('Location: login.php');
	}

?>
