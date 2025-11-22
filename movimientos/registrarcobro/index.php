<?php 
	include("../../conexion.php"); 
    ?>
    <html>
        <head>
            <link rel="stylesheet" href="../css/style.css">
        </head>
    </html>  
    <?php

date_default_timezone_set('America/Asuncion');
$ahora = date("Y-m-d");

if(!empty($_POST["agregar"])){
    $factura = isset($_POST['factura']) ? intval($_POST['factura']) : 0;
    if ($factura <= 0) {
        echo "<script>alert('Factura inválida');</script>";
    } else {
        // Preparar y verificar que la factura existe y aún no tiene cobro
        $stmt = $conexion->prepare(
            "SELECT 1 FROM factura f
             LEFT JOIN cobro c ON f.fac_codigo = c.fac_codigo
             WHERE f.fac_codigo = ? AND c.fac_codigo IS NULL
             LIMIT 1"
        );

        if ($stmt === false) {
            echo "<script>alert('Error en la consulta');</script>";
        } else {
            $stmt->bind_param('i', $factura);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 0) {
                echo "<script>alert('La factura no existe o ya fue procesada');</script>";
            } else {
                // Insertar cobro
                $stmt2 = $conexion->prepare("INSERT INTO cobro(fac_codigo,cob_fecha) VALUES(?,?)");
                if ($stmt2) {
                    $stmt2->bind_param('is', $factura, $ahora);
                    if (!$stmt2->execute()) {
                        echo "<script>alert('Error al registrar cobro');</script>";
                    }
                    $stmt2->close();
                } else {
                    echo "<script>alert('Error al preparar inserción');</script>";
                }
            }

            // Cerrar el primer statement una sola vez
            $stmt->close();
        }
    }
}

if(!empty($_POST["eliminar"])){
  $cod=$_POST["codigo"];
  $consulta="DELETE FROM cobro WHERE cob_codigo=$cod";
  mysqli_query($conexion,$consulta);
}

echo "<div style='max-width:1200px;margin:0 auto 20px auto;'><a href='../../menu.php' style='display:inline-block;background:rgba(255,255,255,0.2);color:white;padding:10px 20px;border-radius:8px;text-decoration:none;font-weight:600;'>← Volver</a></div>";

echo "<h1>Registrar Cobro</h1>";

echo "<form method='POST'>";
echo "<select name='factura' required>";
$sql = "SELECT f.fac_codigo, f.fac_monto
        FROM factura f
        LEFT JOIN cobro c ON f.fac_codigo = c.fac_codigo
        WHERE c.fac_codigo IS NULL
        ORDER BY f.fac_codigo DESC";
if ($res = $conexion->query($sql)) {
    while ($registro = $res->fetch_assoc()) {
        echo "<option value=\"" . (int)$registro['fac_codigo'] . "\">Factura #" . (int)$registro['fac_codigo'] . " - Gs. " . number_format($registro['fac_monto'], 0) . "</option>";
    }
    $res->free();
}
echo "</select>";

echo "<input type='submit' name='agregar' value='Agregar Cobro'>";
echo "</form>";

$res=mysqli_query($conexion,"SELECT * FROM cobro");

if(mysqli_num_rows($res)>0){
    echo "<table>";
    echo "<tr><th>Codigo</th><th>Factura</th><th>Cliente</th><th>Fecha</th><th colspan='2'>Opciones</th></tr>";
    while($fila=mysqli_fetch_assoc($res)){
        $codigo=$fila["cob_codigo"];
        $factura_id=$fila["fac_codigo"];
        $fecha=$fila["cob_fecha"];

        $res2=mysqli_query($conexion,"SELECT cli_codigo FROM factura WHERE fac_codigo=$factura_id");
        $cliente_id=mysqli_fetch_assoc($res2)["cli_codigo"];

        $res3=mysqli_query($conexion,"SELECT cli_nombres FROM cliente WHERE cli_codigo=$cliente_id");
        $nombre=mysqli_fetch_assoc($res3)["cli_nombres"];

        echo "<tr>
                <td>$codigo</td>
                <td>Factura #$factura_id</td>
                <td>$nombre</td>
                <td>$fecha</td>
                <td>
                    <form action='eliminar.php' method='POST'>
                        <input type='hidden' name='codigo' value='$codigo'>
                        <input type='submit' value='Eliminar' name='eliminar'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
}
?>