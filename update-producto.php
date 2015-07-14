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
	$titulo = "Modificar Producto";
	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../config/env.php';
	require __DIR__.'/./templates/header.php';
	require __DIR__.'/./templates/menu.php';
	require __DIR__.'/./templates/sidebar.php';
	require __DIR__.'/../clases/Categoria.php';
	$modelo = new Categoria();
	$categorias = $modelo->ObtenerLista();

	$idprod= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
	$nomprod= ( isset($_GET['nom']) && $_GET['nom'] != "" ) ? $_GET['nom'] : null;
	$desc= ( isset($_GET['des']) && $_GET['des'] != "" ) ? $_GET['des'] : null;
	$prec= ( isset($_GET['pre']) && $_GET['pre'] != "" ) ? $_GET['pre'] : null;
	$ancho= ( isset($_GET['anc']) && $_GET['anc'] != "" ) ? $_GET['anc'] : null;
	$alto= ( isset($_GET['alt']) && $_GET['alt'] != "" ) ? $_GET['alt'] : null;
	$cant= ( isset($_GET['cnt']) && $_GET['cnt'] != "" ) ? $_GET['cnt'] : null;
	$cat= ( isset($_GET['cate']) && $_GET['cate'] != "" ) ? $_GET['cate'] : null;
    $imgn= ( isset($_GET['img']) && $_GET['img'] != "" ) ? $_GET['img'] : null;
    $colores=dechex($color);
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
		<h1>Productos</h1>
		<ol class="breadcrumb">
			<li><a href="<?= ROOT_ADMIN ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><i class="fa fa-shopping-cart"></i> Productos</li>
		</ol>
	</section>
	<!-- Contenido -->
	<section class="content">
		<!-- Otros Contenidos -->
		<div class="row">

		  	<!-- resultado postivo-->
		  	<?php if( array_key_exists('success_contact', $_SESSION) ){ ?>
		  		<div class="col-md-12">
			        <div class="alert alert-info" role="alert">
			            <strong>Hey!</strong>
			            <br>
			            Se modifico correctamente el producto <?=$_SESSION['producto']?>! 
			            <?php unset($_SESSION['success_contact']);
			              unset($_SESSION['producto']); 
			              unset($_SESSION['color']);?>
			        </div>
			    </div>
		    <?php } ?>
			<!-- resultado negativo segun corresponda -->
			<?php if( array_key_exists('error_tmp', $_SESSION) ){ ?>
			    <div class="col-md-12">
			        <div class="alert alert-danger" role="alert">
			            <strong><span class="glyphicon glyphicon-exclamation-sign"></span>  D'oh!</strong>
			            <br>
			            <?= $_SESSION['error_tmp'] ?>
			            <?php unset($_SESSION['error_tmp']); ?>
			        </div>
		       	</div>
		    <?php } ?>

			<div class="col-md-offset-2 col-md-8">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Modifica Producto</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">

						<form class="form-horizontal" method="post" action="<?= ROOT_ADMIN ?>save/updatear-producto.php?id=<?= $idprod ?>" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Producto</label>
									<div class="col-lg-10">
										<input class="form-control" id="nomProducto" placeholder="Producto" type="text" name="nomProducto" required="true" patern="[A-Za-z]{50}" value=<?=$nomprod?>>
									</div>
								</div>
								<div class="form-group">
									<label for="textArea" class="col-lg-2 control-label">Descripción</label>
									<div class="col-lg-10">
										<textarea class="form-control" rows="3" id="descripcion" placeholder="Describe brevemente el producto" name="descripcion" required="true" maxleng="150"
										><?=$desc?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Precio $</label>
									<div class="col-lg-10"> 
										<input class="form-control" id="precio" placeholder="Precio" type="number" name="precio" required="true" min="1" value=<?=$prec?>>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Ancho (cm)</label>
									<div class="col-lg-10">
										<input class="form-control" id="ancho" placeholder="Ancho" type="number" name="ancho" required="true" min="0" step="0.01" value=<?=$ancho?>>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Alto (cm)</label>
									<div class="col-lg-10">
										<input class="form-control" id="alto" placeholder="Alto" type="number" name="alto" required="true" min="0" step="0.01" value=<?=$alto?>>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Cantidad</label>
									<div class="col-lg-10"> 
										<input class="form-control" id="cantidad" placeholder="Cantidad" type="number" name="cantidad" required="true" min="0" value=<?=$cant?>>
									</div>
								</div>


								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Color:</label>
									<div class="col-lg-10"> 
									<input type="text" class="form-control my-colorpicker1" name="color" 
									value=<?=$_SESSION['color']?> 
									/>
									</div>
								</div>


								<label for="select" class="col-lg-2 control-label">Categoria</label>
									<div class="col-lg-10">
										<select class="form-control" id="categoria" name="categoria" value=<?=$cat?>>
										<?php foreach ($categorias as $row){ ?>	
											<option value="<?= $row['IDCATEGORI'] ?>"><?= $row['NOMCATEGOR'] ?> </option>
										<?php } ?>	
										</select>
										<br>
									</div>
								
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Imagen</label>
									<div class="col-lg-10">
										<input class="form-control" id="imagen" placeholder="Imagen" type="file" name="imagen" value=<?=$imgn?>>
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-2 text-right">
										<button type="submit" class="btn btn-success">Agregar Cambios <span class="glyphicon glyphicon-send"></span></button>
									</div>
								</div>
							
							</fieldset>
						</form>

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