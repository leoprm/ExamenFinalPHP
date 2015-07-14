<?php

/*
|--------------------------------------------------------------------------
| Definicion de Entorno
|--------------------------------------------------------------------------
|
| Variables utiles para definir entorno en la app, usadas como constantes.
|
*/
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

if(!defined('ROOT_URL')){
	define('ROOT_URL','/ruta-htdocs/');
}
if(!defined('ROOT_ADMIN')){
	define('ROOT_ADMIN','/ruta-htdocs/admin/');
}
if(!defined('ADMIN_COLOR')){
	define('ADMIN_COLOR','skin-red');
}
if(!defined('MYSQL_SERVER')){
	define("MYSQL_SERVER","mysql:host=localhost");
}
if(!defined('MYSQL_USER')){
	define("MYSQL_USER","user");
}
if(!defined('MYSQL_PASS')){
	define("MYSQL_PASS","pass");
}
if(!defined('MYSQL_DB')){
	define("MYSQL_DB","dbname=nombrebasededatos");
}
if(!defined('USER_EMAIL')){
	define("USER_EMAIL","user@gmail.com");
}
if(!defined('PASSWORD_EMAIL')){
	define("PASSWORD_EMAIL","secret");
}

?>