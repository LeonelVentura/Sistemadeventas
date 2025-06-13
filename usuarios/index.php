<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/usuarios/listado_de_usuarios.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de usuario</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios registrados</h3>
                            <div class="card-tools">
                                <!-- Función que colapsa la tarjeta -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombres</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Rol del usuario</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Función que cuenta e imprime los datos de cada usuario
                                $contador = 0;
                                foreach ($usuarios_datos as $usuarios_dato){
                                    $id_usuario = $usuarios_dato['id_usuario']; ?>
                                    <tr>
                                        <td><center><?php echo ++$contador; ?></center></td>
                                        <td><?php echo $usuarios_dato['nombres']; ?></td>
                                        <td><?php echo $usuarios_dato['email']; ?></td>
                                        <td><center><?php echo $usuarios_dato['rol']; ?></center></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <!-- Función para ver un usuario específico -->
                                                    <a href="show.php?id=<?php echo $id_usuario; ?>" class="btn btn-info">
                                                        <i class="fa fa-eye"></i> Ver
                                                    </a>

                                                    <!-- Función para editar un usuario específico -->
                                                    <a href="update.php?id=<?php echo $id_usuario; ?>" class="btn btn-success">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </a>

                                                    <!-- Función para eliminar un usuario específico -->
                                                    <a href="delete.php?id=<?php echo $id_usuario; ?>" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> Borrar
                                                    </a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombres</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Rol del usuario</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>

<script>
    $(function () {
        // Función que inicializa la tabla con DataTable
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [
                {
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [
                        { text: 'Copiar', extend: 'copy' },
                        { extend: 'pdf' },
                        { extend: 'csv' },
                        { extend: 'excel' },
                        { text: 'Imprimir', extend: 'print' }
                    ]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
