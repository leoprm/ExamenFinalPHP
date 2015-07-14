	<header class="main-header">
    	<a href="<?= ROOT_URL ?>" class="logo">
      		<!-- logo mini 50x50 pixels -->
      		<span class="logo-mini"><b>MT</b>I</span>
      		<!-- logo grande -->
      		<span class="logo-lg"><b>Admin</b> ETI</span>
    	</a>
    	<nav class="navbar navbar-static-top" role="navigation">
      		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	            <span class="sr-only">Menu</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
      		</a>
      		<div class="navbar-custom-menu">
        		<ul class="nav navbar-nav">
          			<!-- Cuadro resumen de contacto -->
          			<li class="dropdown messages-menu">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              				<i class="fa fa-envelope-o"></i>
              				<span class="label label-warning">7</span>
            			</a>
            			<ul class="dropdown-menu">
              				<li class="header">Hay 7 nuevos contactos</li>
              				<li>
			                    <ul class="menu">
			                      	<li>
						      			<a href="<?= ROOT_URL ?>contactos.php?filter=interesados">
						        			<i class="fa fa-dollar text-green"></i> 3 interesados en comprar
						      			</a>
						    		</li>
						    		<li>
						      			<a href="<?= ROOT_URL ?>contactos.php?filter=reclamos">
						        			<i class="fa fa-close text-red"></i> 2 con reclamos
						      			</a>
						    		</li>
						    		<li>
						      			<a href="<?= ROOT_URL ?>contactos.php?filter=sugerencias">
						        			<i class="fa fa-wrench text-yellow"></i> 1 con sugerencias
						      			</a>
						    		</li>
									<li>
						      			<a href="<?= ROOT_URL ?>contactos.php?filter=contacto-general">
						        			<i class="fa fa-university text-aqua"></i> 1 consulta empresarial
						      			</a>
						    		</li>
			                    </ul>
              				</li>
              				<li class="footer"><a href="<?= ROOT_URL ?>contactos.php">Ver todos los contactos</a></li>
            			</ul>
          			</li>
          			<!-- Usuario Logeado -->
          			<li class="dropdown user user-menu">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              				<!-- <img src="<?= ROOT_URL ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
              				<span class="hidden-xs"><?= $_SESSION['usuario']['nombre'] ?></span>
            			</a>
            			<ul class="dropdown-menu">
              				<!-- User image -->
              				<li class="user-header">
                				<!-- <img src="<?= ROOT_URL ?>assets/dist/img/user2-160x160.jpg" class="img-circle" /> -->
                				<p>
                  					<?= $_SESSION['usuario']['nombre'] ?>
                  					<small>Miembre desde <?= $_SESSION['usuario']['fechaIngreso'] ?></small>
                				</p>
              				</li>
              				<!-- Menu Footer-->
              				<li class="user-footer">
                				<div class="pull-left">
                  					<a href="<?= ROOT_URL ?>perfil.php" class="btn btn-default btn-flat">Perfil</a>
                				</div>
                				<div class="pull-right">
                  					<a href="<?= ROOT_URL ?>logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                				</div>
              				</li>
            			</ul>
          			</li>
        		</ul>
      		</div>
    	</nav>
  	</header>