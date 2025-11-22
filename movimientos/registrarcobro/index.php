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
    $factura=$_POST["factura"];
    $monto=$_POST["monto"];
    
    $verificar="SELECT * FROM factura WHERE fac_codigo=$factura";
    $resultado_verificar=mysqli_query($conexion,$verificar);
    
    if(mysqli_num_rows($resultado_verificar)==0){
        echo "<script>alert('Esta factura no existe');</script>";
    } else {
        $consulta="INSERT INTO cobro(fac_codigo,cob_monto,cob_fecha) 
        VALUES('$factura','$monto','$ahora')";
        mysqli_query($conexion,$consulta);
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
$sql="SELECT * FROM factura";
$res=mysqli_query($conexion,$sql);
while($registro=mysqli_fetch_assoc($res)){
    echo "<option value=\"".$registro['fac_codigo']."\">Factura #".$registro['fac_codigo']." - Gs. ".number_format($registro['fac_monto'],0)."</option>";
}
echo "</select>";

echo "<input type='text' name='monto' placeholder='Ingrese Monto' required><br>";
echo "<input type='submit' name='agregar' value='Agregar'>";
echo "</form>";

$res=mysqli_query($conexion,"SELECT * FROM cobro");

if(mysqli_num_rows($res)>0){
    echo "<table>";
    echo "<tr><th>Codigo</th><th>Factura</th><th>Cliente</th><th>Monto</th><th>Fecha</th><th colspan='2'>Opciones</th></tr>";
    while($fila=mysqli_fetch_assoc($res)){
        $codigo=$fila["cob_codigo"];
        $factura_id=$fila["fac_codigo"];
        $monto=$fila["cob_monto"];
        $fecha=$fila["cob_fecha"];

        $res2=mysqli_query($conexion,"SELECT cli_codigo FROM factura WHERE fac_codigo=$factura_id");
        $cliente_id=mysqli_fetch_assoc($res2)["cli_codigo"];

        $res3=mysqli_query($conexion,"SELECT cli_nombres FROM cliente WHERE cli_codigo=$cliente_id");
        $nombre=mysqli_fetch_assoc($res3)["cli_nombres"];

        echo "<tr>
                <td>$codigo</td>
                <td>Factura #$factura_id</td>
                <td>$nombre</td>
                <td>".number_format($monto,0)."</td>
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