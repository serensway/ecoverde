<?php
    $servidor  = "localhost";
    $usuario   = "root";
    $clave     = "";
    $basedatos = "promo02_angeles";

    try {
        $PDO = new PDO("mysql:host=$servidor;dbname=$basedatos", "$usuario", "$clave");
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Elimina cualquier echo aquí (no enviar salida antes de headers)
    } catch (PDOException $err){
        echo "Error de conexión: " . $err->getMessage();
        die();
    }

    // --- compatibilidad mysqli para código existente que usa mysqli_query ---
    $conexion = new mysqli($servidor, $usuario, $clave, $basedatos);
    if ($conexion->connect_error) {
        die("Error de conexión (mysqli): " . $conexion->connect_error);
    }
    $conexion->set_charset('utf8mb4');
?>