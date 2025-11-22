<?php
	include("../../conexion.php"); 
    $codigo=$_POST["codigo"];
    ?>
    <html>
        <head>
            <link rel="stylesheet" href="../css/style.css">
        </head>
    </html>  
    <?php

$query="SELECT * FROM cliente WHERE cli_codigo=$codigo";
$res = mysqli_query($conexion,$query);

while ($fila = mysqli_fetch_assoc($res)) {
    $cedula=$fila["cli_cedula"];
    $nombre=$fila["cli_nombres"];
    $apellido=$fila["cli_apellidos"];
    $usuario=$fila["cli_usuario"];
    $clave=$fila["cli_clave"];
}

     echo "<form action='index.php' method='POST'>";
    echo "<input type='hidden' name='codigo' value='$codigo'>";
    echo "Cedula: <input type='text' name='cedula' value='$cedula' required><br>";
    echo "Nombre: <input type='text' name='nombre' value='$nombre' required><br>";
    echo "Apellido: <input type='text' name='apellido' value='$apellido' required><br>";
    echo "Usuario: <input type='text' name='usuario' value='$usuario' required><br>";
    echo "Clave: <input type='text' name='clave' value='$clave' required><br>";
    echo "<input type='submit' name='modificar' value='Modificar'>";
    echo "</form>";


    ?>

