<?php
	/*
	|--------------------------------------------------------------------------
	| Archivos y configuracion de Pagina
	|--------------------------------------------------------------------------
	|
	| Aqui se hace "required" de archivos minimos de funcionamiento para armar
	| cada pagina, mas declaraion de variables para el header, menu, sidebar.
	|
	*/
	$titulo = "Dashboard";

	require __DIR__.'/config/auth.php';
	require __DIR__.'/config/env.php';
	require __DIR__.'/templates/header.php';
	require __DIR__.'/templates/menu.php';
	require __DIR__.'/templates/sidebar.php';
	/*require __DIR__.'/clases/Producto.php';*/

	$modeloProducto = new Producto();
	$listaProducto = $modeloProducto->obtenerTodos();

	/*
	|--------------------------------------------------------------------------
	| Contenido del Sitio
	|--------------------------------------------------------------------------
	|
	| Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia 
	| haber solo HTML cn algunos tags para PHP para acceder a variables.
	|
	*/
?>

<div class="content-wrapper">
	<!-- Header de la pagina -->
	<section class="content-header">
			<h1>
			Dashboard
			<small>Algunas estadisticas</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	</section>

	<!-- Contenido -->
	<section class="content">
		<!-- Indicadores -->
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Categorias</span>
			      		<span class="info-box-number">4</span>
			    	</div>
				</div>
			</div>

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Productos</span>
			      		<span class="info-box-number"><?=$listaProducto->rowcount()?></span>
			    	</div>
			  	</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Contactos</span>
			      		<span class="info-box-number">30</span>
			    	</div>
			  	</div>
			</div>
		</div>

		<!-- Otros Contenidos -->
		</section>
</div>

<?php
	/*
	|--------------------------------------------------------------------------
	| Footer
	|--------------------------------------------------------------------------
	|
	| Solo se hace un require del footer de la pagina de admin.
	|
	*/
	require __DIR__.'/./templates/footer.php';
?>