<?php
    /*
    |--------------------------------------------------------------------------
    | Template Header del Sitio
    |--------------------------------------------------------------------------
    |
    | Template que tiene el head y el nav del sitio que despliega los productos
    |
    */

    $titulo = (isset($titulo)) ? $titulo : 'Home';
    require __DIR__.'/../../config/env.php';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Proyecto Duoc">
        <meta name="author" content="Los 3 Fulanos">

        <title><?= $titulo ?> | Mira en tu Interior</title>
        <link href="<?= ROOT_URL ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= ROOT_URL ?>assets/dist/css/custom.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>    
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container">
                <button type="button" class="btn btn-menu" data-toggle="offcanvas">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
                <a href="<?= ROOT_URL ?>index.php">
                    <h2>Mira en tu Interior</h2>
                </a>
        </div>
    </nav>
    <div class="container">