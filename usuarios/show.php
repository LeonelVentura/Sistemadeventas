<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/usuarios/show_usuario.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Datos del usuario</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos con cuidado</h3>
                            <div class="card-tools">
                                <!-- Función para colapsar la tarjeta -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- Función que muestra los datos del usuario de forma deshabilitada -->
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres" class="form-control" value="<?php echo $nombres;?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $email;?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol del usuario</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $rol;?>" disabled>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <!-- Función que retorna a la lista de usuarios -->
                                        <a href="index.php" class="btn btn-secondary">Volver</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>
