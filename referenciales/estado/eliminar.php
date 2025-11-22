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
    echo "<h1> Desea eliminar el registro con código $codigo? </h1>";
    
    echo "<form action='index.php' method='POST'>";
    echo "<input type='hidden' name='codigo' value='$codigo'>";
    echo "<input type='submit' name='eliminar' value='SI'>";
    echo "</form>";
   
    echo "<form action='index.php' method='POST'>";
    echo "<input type='submit' value='NO'>";
    echo "</form>";
?>