<?php 
	include("../../conexion.php"); 
    ?>
    <html>
        <head>
            <link rel="stylesheet" href="../css/style.css">
        </head>
    </html>  
    <?php

if(!empty($_POST["agregar"])){
    $descripcion=$_POST["descripcion"];
    $consulta="INSERT INTO estado(est_codigo, est_descripcion) VALUES(NULL,'$descripcion')";
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["eliminar"])){
    $cod=$_POST["codigo"];
    $consulta="DELETE FROM estado WHERE est_codigo=$cod";
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["modificar"])){
    $codigo=$_POST["codigo"];
    $descripcion=$_POST["descripcion"];
    $consulta="UPDATE estado SET est_descripcion='$descripcion' WHERE est_codigo=$codigo";      
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["buscar"])){
    $codigo=$_POST["codigo"];
    $query="SELECT * FROM estado WHERE est_codigo=$codigo";
} else {
    $query="SELECT * FROM estado";
}
?>

<h1>Estados</h1>

<form method='POST'>
    <input type='text' name='descripcion' placeholder='Ingrese Estado' required>
    <input type='submit' name='agregar' value='Agregar'>
</form>

<form method='POST'>
    <input type='text' name='codigo' placeholder='Ingrese Codigo' required>
    <input type='submit' name='buscar' value='Buscar'>
</form>

<form method='POST'>
    <input type='submit' value='Reset'>
</form>

<?php
$res = mysqli_query($conexion,$query);
if(mysqli_num_rows($res) > 0){
    echo "<table>";
    echo "<tr><th>Codigo</th><th>Descripcion</th><th colspan='2'>Opciones</th></tr>";
    while ($fila = mysqli_fetch_assoc($res)) {
        $codigo=$fila["est_codigo"];
        $descripcion=$fila["est_descripcion"];
        echo "<tr>
                <td>$codigo</td>
                <td>$descripcion</td>
                <td>
                    <form action='eliminar.php' method='POST'>
                        <input type='hidden' name='codigo' value='$codigo'>
                        <input type='submit' value='Eliminar' name='eliminar'>
                    </form>
                </td>
                <td>
                    <form action='modificar.php' method='POST'>
                        <input type='hidden' name='codigo' value='$codigo'>
                        <input type='submit' value='Modificar' name='modificar'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
}
?>

