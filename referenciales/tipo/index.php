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
        $codigo = $_POST["codigo"];
        $descripcion = $_POST["descripcion"];
        $consulta = "INSERT INTO tipo_empleado(tip_codigo, tip_descripcion)
                     VALUES('$codigo', '$descripcion')";
        mysqli_query($conexion, $consulta);
    }

    // ELIMINAR
    if(!empty($_POST["eliminar"])){
        $cod = $_POST["codigo"];
        $consulta = "DELETE FROM tipo_empleado WHERE tip_codigo = $cod";
        mysqli_query($conexion, $consulta);
    }

    // MODIFICAR
    if(!empty($_POST["modificar"])){
        $codigo = $_POST["codigo"];
        $descripcion = $_POST["descripcion"];
        $consulta = "UPDATE tipo_empleado 
                     SET tip_descripcion = '$descripcion' 
                     WHERE tip_codigo = $codigo";      
        mysqli_query($conexion, $consulta);
    }

    // BUSCAR
    if(!empty($_POST["buscar"])){
        $codigo = $_POST["codigo"];
        $query = "SELECT * FROM tipo_empleado WHERE tip_codigo = $codigo";
    } else {
        $query = "SELECT * FROM tipo_empleado";
    }

    echo "<h1>Referencial de Tipo de Empleado</h1>";

    // FORMULARIO AGREGAR
    echo "<form method='POST'>";
    //echo "<input type='text' name='codigo' placeholder='Ingrese Codigo'><br>";
    echo "<input type='text' name='descripcion' placeholder='Ingrese Descripcion' required><br>";
    echo "<input type='submit' name='agregar' value='Agregar'>";
    echo "</form>";

    // FORMULARIO BUSCAR
    echo "<form method='POST'>";
    echo "<input type='text' name='codigo' placeholder='Ingrese Codigo' required><br>";
    echo "<input type='submit' name='buscar' value='Buscar'>";
    echo "</form>";

    // FORMULARIO RESET
    echo "<form method='POST'>";
    echo "<input type='submit' value='Reset'>";
    echo "</form>";

    // CONSULTA
    $res = mysqli_query($conexion, $query);

    // TABLA RESULTADOS
    echo "<table border=1>
            <tr>
                <td>Codigo</td>
                <td>Descripcion</td>
                <td colspan=2><center>Opciones</center></td>
            </tr>";

    while ($fila = mysqli_fetch_assoc($res)) {
        $codigo = $fila["tip_codigo"];
        $descripcion = $fila["tip_descripcion"];

        echo "<tr>
                <td style='text-align:center;'>$codigo</td>
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
?>