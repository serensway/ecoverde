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

$query = "SELECT * FROM empleado WHERE emp_codigo=$codigo";
$res = mysqli_query($conexion, $query);
$fila = mysqli_fetch_assoc($res);

$nombres   = $fila["emp_nombres"];
$apellidos = $fila["emp_apellidos"];
$usuario   = $fila["emp_usuario"];
$cedula    = $fila["emp_cedula"];
$clave     = $fila["emp_clave"];
$tipo      = $fila["tip_codigo"];
?>

<h1>Modificar Empleado</h1>

<form action="index.php" method="POST">
    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
    <input type="text" name="nombre" value="<?php echo $nombres; ?>" placeholder="Nombre" required>
    <input type="text" name="apellido" value="<?php echo $apellidos; ?>" placeholder="Apellido" required>
    <input type="text" name="cedula" value="<?php echo $cedula; ?>" placeholder="Cédula" required>
    <input type="text" name="usuario" value="<?php echo $usuario; ?>" placeholder="Usuario" required>
    <input type="text" name="clave" value="<?php echo $clave; ?>" placeholder="Clave" required>
    <select name="tipo" required>
        <?php
        $sql = "SELECT * FROM tipo_empleado";
        $res = mysqli_query($conexion, $sql);
        while ($registro = mysqli_fetch_assoc($res)) {
            $selected = ($registro['tip_codigo'] == $tipo) ? "selected" : "";
            echo "<option value='{$registro['tip_codigo']}' $selected>{$registro['tip_descripcion']}</option>";
        }
        ?>
    </select>
    <input type="submit" name="modificar" value="Modificar">
</form>
</div>
</body>
</html>
