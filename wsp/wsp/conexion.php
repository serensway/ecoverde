<?php
$servidor       = "localhost";
$usuario        = "smartlivi_mara";
$clave          = "i310V#rt[MQ#";
$basededatos    = "smartlivi_mara";

$conexion = mysqli_connect("$servidor","$usuario","$clave","$basededatos");
if (mysqli_connect_errno()) echo "No se puede conectar a MySQL: " . mysqli_connect_error();
mysqli_set_charset($conexion,"utf8");
?>