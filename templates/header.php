<?php
    $titulo = ( !empty($titulo) ) ? $titulo : 'Admin';
?>
<!DOCTYPE html>
<html>
  	<head>
    	<meta charset="UTF-8">
    	<title><?= $titulo ?> | Administración | Mira en tu Interior</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	<link href="<?= ROOT_URL ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?= ROOT_URL ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= ROOT_URL ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?= ROOT_URL ?>assets/dist/css/custom_admin.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="<?= ROOT_URL ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        

        <script src="<?= ROOT_URL ?>assets/plugins/datatables/jquery.dataTables.min.css" type="text/javascript"></script>
        <script src="<?= ROOT_URL ?>assets/plugins/datatables/dataTables.bootstrap.css" type="text/javascript"></script>

    	<!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
    <body class="sidebar-mini <?= ADMIN_COLOR ?> ">
        <div class="wrapper">