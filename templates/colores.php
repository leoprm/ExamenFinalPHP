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
	$titulo = "Categorias";

	require __DIR__.'/./config/auth.php';
	require __DIR__.'/./config/env.php';
	require __DIR__.'/./templates/header.php';
	require __DIR__.'/./templates/menu.php';
	require __DIR__.'/./templates/sidebar.php';
	/*require __DIR__.'/../clases/Color.php';*/

	/*
	|--------------------------------------------------------------------------
	| Contenido del Sitio
	|--------------------------------------------------------------------------
	|
	| Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia 
	| haber solo HTML cn algunos tags para PHP para acceder a variables.
	|
	*/
	$categoria = new Categoria();
	$listaCat = $categoria->ObtenerLista();
?>

<div class="content-wrapper">
	<!-- Header de la pagina -->
	<section class="content-header">
		<h1>Categorias</h1>
		<ol class="breadcrumb">
		<li><a href="<?= ROOT_ADMIN ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-tags"></i> Categorias</li>
		</ol>
	</section>

	<!-- Contenido -->
	<section class="content">

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Lista de Categorias</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			<table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
		  			        <thead>
		  			            <tr>
		  			                <th>Nombre</th>
		  			                <th>Descripción</th>
		  			                <th>Foto</th>
		  			            </tr>
		  			        </thead>
		  			 
		  			        <tfoot>
		  			            <tr>
		  			                <th>Nombre</th>
		  			                <th>Email</th>
		  			                <th>Asunto</th>	
		  			            </tr>
		  			        </tfoot>

		  			        <tbody>
			  			        <?php foreach ($listaCat as $lista) { ?>
			  			            <tr>
			  			                <td><?=$lista['NOMCATEGOR']?></td>
			  			                <td><?= utf8_encode($lista['DESCRIPCATEGO'])?></td>
			  			                <td><?=$lista['IMAGENCAT']?></td>
			  			                <td> <a href="<?= ROOT_ADMIN ?>editarCategoria.php?id=<?= $lista['IDCATEGO'] ?>" class="btn btn-warning"> Editar </a> </td>
			  			            </tr>
			  			         <?php };?>
		  			        </tbody>
		  			    </table>
					</div>
				</div>
			</div>
		</div>
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