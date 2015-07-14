<?php
	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| Esta pagina es especial por que no se basa en los otros layouts, solo
	| importa el archivo de entorno para definicion de constantes
	|
	*/
  require __DIR__.'/config/auth.php';
	require __DIR__.'/config/env.php';
?>

<!DOCTYPE html>
<html>
  	<head>
    	<meta charset="UTF-8">
    	<title>Login | Administración</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	<link href="<?= ROOT_URL ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?= ROOT_URL ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    	<!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
  	<body class="login-page">
    	<div class="login-box">
      		<div class="login-logo">
        		<a href="<?= ROOT_URL ?>"><b>Administración
        		<br></b>Lo tenemos todo</a>
      		</div>
      		<div class="login-box-body">
        		<p class="login-box-msg">Para acceder inicia sesión</p>

                <?php if( array_key_exists('error_tmp', $_SESSION) ){ ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?= $_SESSION['error_tmp'] ?>
                        <?php unset($_SESSION['error_tmp']); ?>
                    </div>
                <?php } ?>

        		<form action="<?= ROOT_URL ?>dologin.php" method="post">
          			<div class="form-group has-feedback">
            			<input type="email" class="form-control" placeholder="Email" name="email" id="email"/>
            			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          			</div>
          			<div class="form-group has-feedback">
            			<input type="password" class="form-control" placeholder="Password" name="pass" id="pass"/>
            			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          			</div>
          			<div class="row">
            			<div class="col-xs-4">
              				<button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            			</div>
          			</div>
        		</form>
      		</div>
    	</div>

    	<script src="<?= ROOT_URL ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    	<script src="<?= ROOT_URL ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  	</body>
</html>