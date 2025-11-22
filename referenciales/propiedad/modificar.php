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
    $query="SELECT * FROM propiedad WHERE pro_codigo=$codigo";
	$res = mysqli_query($conexion,$query);

 
	while ($fila = mysqli_fetch_assoc($res)) {
	    $precio=$fila["pro_precio"];
        $direccion=$fila["pro_direccion"];
    }

    echo "<form action='index.php' method='POST'>";
    echo "<input type='hidden' name='codigo' value='$codigo'>";
    echo "Precio: <input type='text' name='precio' value='$precio' required><br>";
    echo "Direccion: <input type='text' name='direccion' value='$direccion' required><br>";
    echo "<input type='submit' name='modificar' value='Modificar'>";
    echo "</form>";
?>