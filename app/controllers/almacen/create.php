<?php
include("../../config.php");

// Recibir datos del formulario
$codigo = $_POST['codigo'];
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fechaHora = date("Y-m-d H:i:s");

// Validar y mover la imagen
$filename = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $nombreDelArchivo = date("Y-m-d-H-i-s") . "__" . $_FILES['image']['name'];
    $filename = $nombreDelArchivo;

    $rutaDestino = "../../../almacen/img_productos/" . $filename;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $rutaDestino)) {
        session_start();
        $_SESSION['mensaje'] = "Error al subir la imagen";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/almacen/create.php');
        exit;
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "No se seleccionó ninguna imagen válida";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
    exit;
}

// Insertar en la base de datos
$sentencia = $pdo->prepare("INSERT INTO tb_almacen 
    (codigo, nombre, descripción, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, id_usuario, id_categoria, fyh_creacion) 
    VALUES (:codigo, :nombre, :descripcion, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :id_usuario, :id_categoria, :fyh_creacion)");

$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $filename);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

// Ejecutar
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/almacen/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar el producto";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
}
