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
    $nombres=$_POST["nombre"];
    $apellidos=$_POST["apellido"];
    $cedula=$_POST["cedula"];
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
    $tipo=$_POST["tipo"];
    $consulta="INSERT INTO empleado(emp_nombres,emp_apellidos,emp_usuario,emp_clave,emp_cedula,tip_codigo) 
    VALUES('$nombres','$apellidos','$usuario','$clave','$cedula',$tipo)";
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["eliminar"])){
    $cod=$_POST["codigo"];
    $consulta="DELETE FROM empleado WHERE emp_codigo=$cod";
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["modificar"])){
    $codigo=$_POST["codigo"];
    $nombres=$_POST["nombre"];
    $apellidos=$_POST["apellido"];
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
    $tipo=$_POST["tipo"];
    $consulta="UPDATE empleado SET emp_nombres='$nombres',emp_apellidos='$apellidos',emp_usuario='$usuario',emp_clave='$clave',tip_codigo='$tipo' WHERE emp_codigo=$codigo"; 
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["buscar"])){
    $codigo=$_POST["codigo"];
    $query="SELECT * FROM empleado,tipo_empleado WHERE tipo_empleado.tip_codigo=empleado.tip_codigo AND emp_codigo=$codigo";
} else {
    $query="SELECT * FROM empleado,tipo_empleado WHERE tipo_empleado.tip_codigo=empleado.tip_codigo";
}
?>

<h1>Empleados</h1>

<form method='POST'>
    <input type='text' name='nombre' placeholder='Ingrese nombre' required>
    <input type='text' name='apellido' placeholder='Ingrese apellido' required>
    <input type='text' name='cedula' placeholder='Ingrese cedula' required>
    <select name='tipo' required>
        <?php
        $sql = "SELECT * FROM tipo_empleado";
        $res = mysqli_query($conexion, $sql);
        while ($registro = mysqli_fetch_assoc($res)) {
            echo "<option value=\"" . $registro['tip_codigo'] . "\">" . $registro['tip_descripcion'] . "</option>";
        }
        ?>
    </select>
    <input type='text' name='usuario' placeholder='Ingrese usuario' required>
    <input type='text' name='clave' placeholder='Ingrese clave' required>
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
    echo "<tr><th>Codigo</th><th>Cedula</th><th>Nombres</th><th>Apellidos</th><th>Usuario</th><th>Clave</th><th>Tipo de Empleado</th><th colspan='2'>Opciones</th></tr>";
    while ($fila = mysqli_fetch_assoc($res)) {
        $codigo=$fila["emp_codigo"];
        $nombre=$fila["emp_nombres"];
        $apellido=$fila["emp_apellidos"];
        $cedula=$fila["emp_cedula"];
        $usuario=$fila["emp_usuario"];
        $clave=$fila["emp_clave"];
        $tipo=$fila["tip_descripcion"];
        echo "<tr>
                <td>$codigo</td>
                <td>$cedula</td>
                <td>$nombre</td>
                <td>$apellido</td>
                <td>$usuario</td>
                <td>$clave</td>
                <td>$tipo</td>
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
</div>
</body>
</html>
