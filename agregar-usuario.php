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
	$titulo = "Agregar Usuario";

	require __DIR__.'/config/auth.php';
	require __DIR__.'/config/env.php';
	require __DIR__.'/templates/header.php';
	require __DIR__.'/templates/menu.php';
	require __DIR__.'/templates/sidebar.php';
	require __DIR__.'/clases/Usuario.php';

	$modelo = new Usuario();
	$usuarios = $modelo->ObtenerLista();

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
		<h1>Usuarios</h1>
		<ol class="breadcrumb">
			<li><a href="<?= ROOT_URL ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><i class="fa fa-shopping-cart"></i> Usuarios</li>
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
			            Se agrego correctamente el Usuario <?=$_SESSION['Usuario']?>! 
			            <?php unset($_SESSION['success_contact']);
			              unset($_SESSION['Usuario']); ?>
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
						<h3 class="box-title">Nuevo Usuario</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">

						<form class="form-horizontal" method="post" action="<?= ROOT_URL ?>save/agregador-Usuario.php" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
									<div class="col-lg-10">
										<input class="form-control" id="nomUsuario" placeholder="nombre" type="text" name="nomUsuario" required="true" patern="[A-Za-z]{50}">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Apellido</label>
									<div class="col-lg-10">
										<input class="form-control" id="apeUsuario" placeholder="apellido" type="text" name="apeUsuario" required="true" patern="[A-Za-z]{50}">
									</div>
								</div>
								<div class="form-group">
									<label for="textArea" class="col-lg-2 control-label">Login</label>
									<div class="col-lg-10">
										<textarea class="form-control" rows="3" id="Login" placeholder="username" name="Login" required="true" maxleng="150"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Password</label>
									<div class="col-lg-10"> 
										<input class="form-control" id="Password" placeholder="password" type="text" name="password" required="true" minleng="4" maxleng="20" >
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Edad</label>
									<div class="col-lg-10"> 
										<input class="form-control" id="Edad" placeholder="Edad" type="number" name="Edad" required="true" min="0" >
									</div>
								</div>



									<label for="select" class="col-lg-2 control-label">Correo</label>
									<div class="col-lg-10">
										<select class="form-control" id="Correo" name="Correo">
										<?php foreach ($usuarios as $row){ ?>	
											<option value="<?= $row['ID'] ?>"><?= $row['NOMBRE'] ?> </option>
										<?php } ?>	
										</select>
										<br>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Login</label>
									<div class="col-lg-10">
										<input class="form-control" id="Login" placeholder="Login" type="file" name="imagen" >
									</div>
								</div>


								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-2 text-right">
										<button type="submit" class="btn btn-success">Agregar  <span class="glyphicon glyphicon-send"></span></button>
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