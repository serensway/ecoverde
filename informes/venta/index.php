<?php
include("../../conexion.php"); 
?>
<html>
        <head>
            <link rel="stylesheet" href="../css/style.css">
        </head>
    </html>  

    <h2>Informe de Venta Por Cliente</h2>
<form action="cliente.php" method="POST">
    <label>Seleccionar Cliente:</label><br>

    <select name="cliente" required>
        <?php
        $sql = "SELECT * FROM cliente";
        $res = mysqli_query($conexion, $sql);

        while ($registro = mysqli_fetch_assoc($res)) {
            echo "<option value='".$registro['cli_codigo']."'>".$registro['cli_nombres']."</option>";
        }
        ?>
    </select>
    <br><br>

    <input type="submit" value="Buscar por Cliente" name="buscar_cliente">
</form>

<hr>

<h2>Informe de Venta Por Propiedad</h2>
<form action="propiedad.php" method="POST">
    <label>Seleccionar Propiedad:</label><br>

    <select name="propiedad" required>
        <?php
        $sql = "SELECT * FROM propiedad";
        $res = mysqli_query($conexion, $sql);

        while ($registro = mysqli_fetch_assoc($res)) {
            echo "<option value='".$registro['pro_codigo']."'>".$registro['pro_direccion']."</option>";
        }
        ?>
    </select>
    <br><br>

    <input type="submit" value="Buscar por Propiedad" name="buscar_propiedad">
</form>