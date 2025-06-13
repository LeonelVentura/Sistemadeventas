<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/roles/update_roles.php');
?>

<!-- Contenedor principal del contenido -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edición del Rol</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5">
                    <div class="card card-success">
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

                                    <!-- Función para actualizar los datos de un rol -->
                                    <form action="../app/controllers/roles/update.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="id_rol" value="<?php echo $id_rol_get;?>" hidden>
                                            <label for="">Nombre del Rol</label>
                                            <input type="text" name="rol" class="form-control"
                                                   placeholder="Escriba aquí el rol..." value="<?php echo $rol;?>" required>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <!-- Función para cancelar y volver al índice -->
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>

                                            <!-- Función para enviar el formulario de actualización -->
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </form>

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
