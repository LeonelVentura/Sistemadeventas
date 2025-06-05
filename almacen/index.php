<?php
include("../app/config.php");
include("../layout/sesion.php");

include("../layout/parte1.php");

include('../app/controllers/almacen/listado_de_productos.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de productos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">productos registrados</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>

            </div>

            <div class="card-body" style="display:block;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>
                      <center>Nro</center>
                    </th>
                    <th>
                      <center>Código</center>
                    </th>
                    <th>
                      <center>Categoria</center>
                    </th>
                    <th>
                      <center>Imagen </center>
                    </th>
                    <th>
                      <center>Nombre</center>
                    </th>
                    <th>
                      <center>Descripcion</center>
                    </th>
                    <th>
                      <center>Stock</center>
                    </th>
                    <th>
                      <center>Stock minimo</center>
                    </th>
                    <th>
                      <center>Stock máximo </center>
                    </th>
                    <th>
                      <center>Precio compra </center>
                    </th>

                    <th>
                      <center>Precio venta </center>
                    </th>

                    <th>
                      <center>Usuario</center>
                    </th>
                    <th>
                      <center>Acciones </center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($productos_datos as $productos_dato) { ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1; ?></td>
                      <td><?php echo $productos_dato['codigo']; ?></td>
                      <td><?php echo $productos_dato['categoria']; ?></td>
                      <td>
                        <?php
                        if (filter_var($productos_dato['imagen'], FILTER_VALIDATE_URL)) {
                          echo "<img src='img_productos/{$productos_dato['imagen']}' width='50' height='50'>";
                        } else {
                          echo "<img src='img_productos/{$productos_dato['imagen']}' width='50' height='50'>";
                        }
                        ?>
                      </td>

                      <td><?php echo $productos_dato['nombre']; ?></td>
                      <td><?php echo $productos_dato['descripción']; ?></td>
                      <td><?php echo $productos_dato['stock']; ?></td>
                      <td><?php echo $productos_dato['stock_minimo']; ?></td>
                      <td><?php echo $productos_dato['stock_maximo']; ?></td>
                      <td><?php echo $productos_dato['precio_compra']; ?></td>

                      <td><?php echo $productos_dato['precio_venta']; ?></td>
                      <td><?php echo $productos_dato['email']; ?></td>
                      <td>
                        <center>
                          <div>
                            <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                            <a href="update.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> Editar</a>
                            <a href="delete.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                          </div>
                        </center>

                      </td>

                    </tr>


                  <?php
                  }
                  ?>
                </tbody>

              </table>
            </div>

          </div>
        </div>
      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include("../layout/mensajes.php"); ?>
<?php include("../layout/parte2.php"); ?>

<script>
  $(function() {
    $("#example1").DataTable({
      "pageLength": 5,
      language: {
        "emptyTable": "No hay información",
        "decimal": "",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
        "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
        "infoFiltered": "(Filtrado de _MAX_ total Roles)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Roles",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      buttons: [{
          extend: 'collection',
          text: 'Reportes',
          orientation: 'landscape',
          buttons: [{
            text: 'Copiar',
            extend: 'copy'
          }, {
            extend: 'pdf',
          }, {
            extend: 'csv',
          }, {
            extend: 'excel',
          }, {
            text: 'Imprimir',
            extend: 'print'
          }]
        },
        {
          extend: 'colvis',
          text: 'Visor de columnas'
        }
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>