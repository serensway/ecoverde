<?php
header('Content-Type: text/plain; charset=utf-8');
header('Access-Control-Allow-Origin: *'); // ajustar en producción

if (session_status() === PHP_SESSION_NONE) @session_start();

// incluir conexión
include __DIR__ . '/../conexion.php';

// asegurar que $conexion sea mysqli
if (!isset($conexion) || !($conexion instanceof mysqli)) {
    http_response_code(500);
    echo "0";
    exit;
}

// contar registros en factura
$sql = "SELECT COUNT(*) AS cnt FROM factura";
$stmt = mysqli_prepare($conexion, $sql);
if ($stmt === false) {
    http_response_code(500);
    echo "0";
    exit;
}

if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "0";
    exit;
}

mysqli_stmt_bind_result($stmt, $cnt);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// devolver solo el número
echo (int)$cnt;
?>