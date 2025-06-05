<?php

$id_usuario_get = isset($_GET['id']) ? $_GET['id'] : null;

$sql_usuarios = "SELECT *, cat.nombre_categoria as categoria, u.email as email 
FROM tb_almacen as a 
  INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria
  INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario";
$query_producto = $pdo->prepare($sql_usuarios);
$query_producto->execute();
$productos_datos = $query_producto->fetchAll(PDO::FETCH_ASSOC);

?>
