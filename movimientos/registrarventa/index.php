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
    $propiedad=$_POST["propiedad"];
    $cliente=$_POST["cliente"];
    $monto=$_POST["monto"];
    $estado=1;
    
    $verificar="SELECT * FROM factura WHERE pro_codigo=$propiedad";
    $resultado_verificar=mysqli_query($conexion,$verificar);
    
    if(mysqli_num_rows($resultado_verificar)>0){
        echo "<script>alert('Esta propiedad ya fue vendida');</script>";
    } else {
        $consulta="INSERT INTO factura(pro_codigo,est_codigo,cli_codigo,fac_monto,fac_fecha) 
        VALUES('$propiedad','$estado','$cliente','$monto','$ahora')";
        mysqli_query($conexion,$consulta);
    }
}

if(!empty($_POST["eliminar"])){
  $cod=$_POST["codigo"];
  $consulta="DELETE FROM factura WHERE fac_codigo=$cod";
  mysqli_query($conexion,$consulta);
}

echo "<div style='max-width:1200px;margin:0 auto 20px auto;'><a href='../../menu.php' style='display:inline-block;background:rgba(255,255,255,0.2);color:white;padding:10px 20px;border-radius:8px;text-decoration:none;font-weight:600;'>← Volver</a></div>";

echo "<h1>Regitrar Venta</h1>";

echo "<form method='POST'>";
echo "<select name='propiedad' required>";
$sql="SELECT * FROM propiedad WHERE pro_codigo NOT IN (SELECT pro_codigo FROM factura)";
$res=mysqli_query($conexion,$sql);
while($registro=mysqli_fetch_assoc($res)){
    echo "<option value=\"".$registro['pro_codigo']."\">".$registro['pro_direccion']."</option>";
}
echo "</select>";

echo "<select name='cliente' required>";
$sql="SELECT * FROM cliente";
$res=mysqli_query($conexion,$sql);
while($registro=mysqli_fetch_assoc($res)){
    echo "<option value=\"".$registro['cli_codigo']."\">".$registro['cli_nombres']."</option>";
}
echo "</select>";

echo "<input type='text' name='monto' placeholder='Ingrese Monto' required><br>";
echo "<input type='submit' name='agregar' value='Agregar'>";
echo "</form>";

$res=mysqli_query($conexion,"SELECT * FROM factura");

if(mysqli_num_rows($res)>0){
    echo "<table>";
    echo "<tr><th>Codigo</th><th>Propiedad</th><th>Cliente</th><th>Monto</th><th colspan='2'>Opciones</th></tr>";
    while($fila=mysqli_fetch_assoc($res)){
        $codigo=$fila["fac_codigo"];
        $propiedad_id=$fila["pro_codigo"];
        $cliente_id=$fila["cli_codigo"];
        $monto=$fila["fac_monto"];

        $res2=mysqli_query($conexion,"SELECT cli_nombres FROM cliente WHERE cli_codigo=$cliente_id");
        $nombre=mysqli_fetch_assoc($res2)["cli_nombres"];

        $res3=mysqli_query($conexion,"SELECT pro_direccion FROM propiedad WHERE pro_codigo=$propiedad_id");
        $direccion=mysqli_fetch_assoc($res3)["pro_direccion"];

        echo "<tr>
                <td>$codigo</td>
                <td>$direccion</td>
                <td>$nombre</td>
                <td>".number_format($monto,0)."</td>
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