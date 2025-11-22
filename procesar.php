<?php
session_start();
require_once 'conexion.php'; // espera $PDO

// recibir variables del formulario anterior (asegura existencia)
$usuario = isset($_POST["usu"]) ? trim($_POST["usu"]) : '';
$clave   = isset($_POST["cla"]) ? trim($_POST["cla"]) : '';

// Verificar $PDO
if (!isset($PDO) || !($PDO instanceof PDO)) {
    die('Error: la conexión a la base de datos no existe. Verifique conexion.php');
}

try {
    $stmt = $PDO->prepare("SELECT emp_nombres, emp_codigo FROM empleado WHERE emp_usuario = :usu AND emp_clave = :cla LIMIT 1");
    $stmt->execute([':usu' => $usuario, ':cla' => $clave]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION["usuarioActivo"] = $row['emp_nombres'];
        $_SESSION["codigo"] = $row['emp_codigo'];
        header('Location: menu.php');
        exit;
    } else {
        header('Location: datos.php');
        exit;
    }
} catch (PDOException $e) {
    die('DB error: ' . $e->getMessage());
}