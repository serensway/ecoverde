<?php
include("../../conexion.php");

$propiedad = $_POST["propiedad"];

// Traer precio y dirección de la propiedad
$q1 = "SELECT pro_precio, pro_direccion 
       FROM propiedad 
       WHERE pro_codigo = $propiedad";
$r1 = mysqli_query($conexion, $q1);
$f1 = mysqli_fetch_assoc($r1);

$precioProp = $f1["pro_precio"];
$direccionProp = $f1["pro_direccion"];

echo "<h1>INFORME POR PROPIEDAD</h1>";
echo "<h3>Propiedad seleccionada: $direccionProp</h3><br>";

echo "<br><div style='text-align:center;'>
        <a href='index.php'>Volver</a>
      </div>";

// Traer todas las facturas de esa propiedad
$q2 = "SELECT * FROM factura WHERE pro_codigo = $propiedad";
$r2 = mysqli_query($conexion, $q2);

// Tabla
echo "<table border='1' width='80%' align='center'>
        <tr>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Precio Propiedad</th>
        </tr>";

if (mysqli_num_rows($r2) > 0) {
    while ($fac = mysqli_fetch_assoc($r2)) {

        $cliente = $fac["cli_codigo"];

        // consultar CLIENTE
        $q3 = "SELECT cli_nombres, cli_apellidos 
               FROM cliente 
               WHERE cli_codigo = $cliente";
        $r3 = mysqli_query($conexion, $q3);
        $c = mysqli_fetch_assoc($r3);

        $nombreCliente = $c["cli_nombres"] . " " . $c["cli_apellidos"];

        echo "<tr>
                <td>$nombreCliente</td>
                <td>".$fac["fac_fecha"]."</td>
                <td>".$fac["fac_monto"]."</td>
                <td>$precioProp</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Esta propiedad no tiene ventas.</td></tr>";
}

echo "</table>";
?>
