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
    $query="SELECT * FROM estado WHERE est_codigo=$codigo";
	$res = mysqli_query($conexion,$query);

 
	while ($fila = mysqli_fetch_assoc($res)) {
	    $descripcion=$fila["est_descripcion"];
    }

    echo "<form action='index.php' method='POST'>";
    echo "<input type='hidden' name='codigo' value='$codigo'>";
    echo "Descripción: <input type='text' name='descripcion' value='$descripcion' required><br>";
    echo "<input type='submit' name='modificar' value='Modificar'>";
    echo "</form>";
?>