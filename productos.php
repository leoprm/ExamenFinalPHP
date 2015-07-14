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
    $titulo = "Productos";

    require __DIR__.'/config/auth.php';
    require __DIR__.'/config/env.php';
    require __DIR__.'/templates/header.php';
    require __DIR__.'/templates/menu.php';
    require __DIR__.'/templates/sidebar.php';
    require __DIR__.'/clases/Producto.php';

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
        <h1>Productos</h1>
        <ol class="breadcrumb">
        <li><a href="<?= ROOT_URL ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-shopping-cart"></i> Prodcutos</li>
        </ol>
    </section>
    <!-- Resultado positivo modificar-->
    <?php if( array_key_exists('success_update', $_SESSION) ){ ?>
            <div class="alert alert-info" role="alert">
                <strong>Hey!</strong>
                <br>
                Se modifico correctamente el Producto ! 
                <?php unset($_SESSION['success_update']);
                      ?>
            </div>
    <?php } ?>
    <!-- Resultado positivo eliminar-->
    <?php if( array_key_exists('success_contact', $_SESSION) ){ ?>
            <div class="alert alert-info" role="alert">
                <strong>Hey!</strong>
                <br>
                Se elimino correctamente el Producto <?=$_SESSION['producto']?>! 
                <?php unset($_SESSION['success_contact']);
                      unset($_SESSION['producto']); ?>
            </div>
    <?php } ?>
    <!-- resultado negativo segun corresponda -->
    <?php if( array_key_exists('error_tmp', $_SESSION) ){ ?>
                <div class="alert alert-danger" role="alert">
                    <strong><span class="glyphicon glyphicon-exclamation-sign"></span>  D'oh!</strong>
                    <br>
                    <?= $_SESSION['error_tmp'] ?>
                    <?php unset($_SESSION['error_tmp']); ?>
                </div>
    <?php } ?>
    <!-- Contenido -->
    <section class="content">

        <!-- Otros Contenidos -->
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista de productos</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>                     
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($listaProducto as $row){ ?>               
                            <tr>
                                <td><?=$row['ID']?></td>
                                <td><?=$row['NOMBRE']?></td>
                                <td><?=$row['DESCRIPCION']?></td>
                                <td><?=$row['PRECIO']?></td>
                                <td><?=$row['UNIDADES']?></td>
                                <td><?=$row['tipo_productos_id']?></td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-2 col-sm-4 col-xs-8" >
                                            <a href="<?= ROOT_URL ?>save/delete-producto.php?id=<?= $row['ID'] ?>&nom=<?= $row['NOMBRE']  ?>" 
                                                    class="btn btn-danger" 
                                                    onClick="return confirmation()">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2 col-sm-4 col-xs-8">
                                            <a href="<?= ROOT_URL ?>update-producto.php?id=<?= $row['ID'] ?>&nom=<?= $row['NOMBRE']  ?>&
                                             des=<?= $row['DESCRIPCION']  ?>&pre=<?= $row['PRECIO']  ?>
                                             &uni=<?= $row['UNIDADES']  ?>&cnt=<?= $row['tipo_productos_id']  ?>&
                                              tipo=<?= $row['IDTIPO']  ?>" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span></a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <?php }  ?>  
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