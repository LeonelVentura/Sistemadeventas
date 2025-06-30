<?php

require_once '../../config.php';
session_start();

// Validar y limpiar entrada
$nombre_categoria = isset($_GET['nombre_categoria']) ? trim($_GET['nombre_categoria']) : '';

if (empty($nombre_categoria)) {
    $_SESSION['mensaje'] = "El nombre de la categoría no puede estar vacío.";
    $_SESSION['icono'] = "warning";
    echo "<script>location.href = '{$URL}/categorias';</script>";
    exit;
}

// Obtener fecha y hora actual
$fechaHora = date('Y-m-d H:i:s');

// Preparar sentencia
$sentencia = $pdo->prepare("
    INSERT INTO tb_categorias (nombre_categoria, fyh_creacion)
    VALUES (:nombre_categoria, :fyh_creacion)
");

$sentencia->bindParam(':nombre_categoria', $nombre_categoria);
$sentencia->bindParam(':fyh_creacion', $fechaHora);

// Ejecutar e informar
if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Se registró la categoría correctamente.";
    $_SESSION['icono'] = "success";
} else {
    $_SESSION['mensaje'] = "Error: no se pudo registrar la categoría.";
    $_SESSION['icono'] = "error";
}

// Redirigir
echo "<script>location.href = '{$URL}/categorias';</script>";
exit;