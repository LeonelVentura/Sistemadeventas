<?php
if (isset($_GET['id'])) {
    $id_producto_get = $_GET['id'];

    $sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email
                      FROM tb_almacen as a
                      INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria 
                      INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario
                      WHERE id_producto = :id";
    $query_productos = $pdo->prepare($sql_productos);
    $query_productos->bindParam(':id', $id_producto_get);
    $query_productos->execute();
    $productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
} else {
    $productos_datos = []; // Evita errores en show.php si no hay producto cargado
}
