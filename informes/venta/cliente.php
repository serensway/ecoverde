<?php
include("../../conexion.php");

$cliente = $_POST["cliente"];

// Traer nombre del cliente
$q1 = "SELECT cli_nombres, cli_apellidos 
       FROM cliente 
       WHERE cli_codigo = $cliente";
$r1 = mysqli_query($conexion, $q1);
$f1 = mysqli_fetch_assoc($r1);

$nombreCliente = $f1["cli_nombres"] . " " . $f1["cli_apellidos"];

echo "<h1>INFORME DE VENTAS POR CLIENTe</h1>";
echo "<h3>Cliente seleccionado: $nombreCliente</h3>";


echo "<br><div style='text-align:center;'>
        <a href='index.php'>Volver</a>
      </div>";

// Traer todas las facturas de este cliente
$q2 = "SELECT * FROM factura WHERE cli_codigo = $cliente";
$r2 = mysqli_query($conexion, $q2);

// Tabla
echo "<table border='1' width='80%' align='center'>
        <tr>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Precio Propiedad</th>
            <th>Dirección</th>
        </tr>";

if (mysqli_num_rows($r2) > 0) {
    while ($fac = mysqli_fetch_assoc($r2)) {

        // obtener el código de la propiedad
        $pro = $fac["pro_codigo"];

        // consultar propiedad
        $q3 = "SELECT pro_precio, pro_direccion 
               FROM propiedad 
               WHERE pro_codigo = $pro";
        $r3 = mysqli_query($conexion, $q3);
        $p = mysqli_fetch_assoc($r3);

        echo "<tr>
                <td>".$fac["fac_fecha"]."</td>
                <td>".$fac["fac_monto"]."</td>
                <td>".$p["pro_precio"]."</td>
                <td>".$p["pro_direccion"]."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Este cliente no tiene ventas.</td></tr>";
}

echo "</table>";


?>
