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
    $codigo=$_POST["codigo"];
    $cedula=$_POST["cedula"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
    $consulta="INSERT INTO cliente(cli_codigo, cli_cedula, cli_nombres, cli_apellidos, cli_usuario, cli_clave)
    VALUES('$codigo' , '$cedula', '$nombre', '$apellido', '$usuario', '$clave')";
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["eliminar"])){
  $cod=$_POST["codigo"];
  $consulta="DELETE FROM cliente WHERE cli_codigo=$cod";
  mysqli_query($conexion,$consulta);
}

if(!empty($_POST["modificar"])){
    $codigo=$_POST["codigo"];
    $cedula=$_POST["cedula"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
    $consulta="UPDATE cliente SET cli_cedula='$cedula', cli_nombres='$nombre', cli_apellidos='$apellido', cli_usuario='$usuario', cli_clave='$clave' WHERE cli_codigo=$codigo";      
    mysqli_query($conexion,$consulta);
}

if(!empty($_POST["buscar"])){
    $codigo=$_POST["codigo"];
    $query="SELECT * FROM cliente WHERE cli_codigo=$codigo";
} else {
    $query="SELECT * FROM cliente";
}

echo "<h1>Clientes</h1>";

echo "<form method='POST'>";
echo "<input type='text' name='cedula' placeholder='Ingrese Cedula' required><br>";
echo "<input type='text' name='nombre' placeholder='Ingrese Nombre' required><br>";
echo "<input type='text' name='apellido' placeholder='Ingrese Apellido' required><br>";
echo "<input type='text' name='usuario' placeholder='Ingrese Usuario' required><br>";
echo "<input type='text' name='clave' placeholder='Ingrese Clave' required><br>";
echo "<input type='submit' name='agregar' value='Agregar'>";
echo "</form>";

echo "<form method='POST'>";
echo "<input type='text' name='codigo' placeholder='Ingrese Codigo' required><br>";
echo "<input type='submit' name='buscar' value='Buscar'>";
echo "</form>";

echo "<form method='POST'>";
echo "<input type='submit' value='Reset'>";
echo "</form>";

$res = mysqli_query($conexion,$query);

if(mysqli_num_rows($res) > 0){
    echo "<table>";
    echo "<tr><th>Codigo</th><th>Cedula</th><th>Nombres</th><th>Apellidos</th><th>Usuario</th><th>Clave</th><th colspan='2'>Opciones</th></tr>";
    while ($fila = mysqli_fetch_assoc($res)) {
        $codigo=$fila["cli_codigo"];
        $cedula=$fila["cli_cedula"];
        $nombre=$fila["cli_nombres"];
        $apellido=$fila["cli_apellidos"];
        $usuario=$fila["cli_usuario"];
        $clave=$fila["cli_clave"];

        echo "<tr>
                <td>$codigo</td>
                <td>$cedula</td>
                <td>$nombre</td>
                <td>$apellido</td>
                <td>$usuario</td>
                <td>$clave</td>
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

