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
        $precio=$_POST["precio"];
        $direccion=$_POST["direccion"];
        $consulta="INSERT INTO propiedad(pro_codigo, pro_precio, pro_direccion)
        VALUES('$codigo','$precio','$direccion')";
        mysqli_query($conexion,$consulta);

    }

    if(!empty($_POST["eliminar"])){
      $cod=$_POST["codigo"];
      $consulta="DELETE FROM propiedad WHERE pro_codigo=$cod";
      mysqli_query($conexion,$consulta);
    }
    
    if(!empty($_POST["modificar"])){
        $codigo=$_POST["codigo"];
        $precio=$_POST["precio"];
           $direccion=$_POST["direccion"];
        $consulta="UPDATE propiedad SET pro_precio='$precio', pro_direccion='$direccion' WHERE pro_codigo=$codigo";      
        mysqli_query($conexion,$consulta);
    }

    if(!empty($_POST["buscar"])){
        $codigo=$_POST["codigo"];
        $query="SELECT * FROM propiedad WHERE pro_codigo=$codigo";
    } else {
        $query="SELECT * FROM propiedad";
    }

    echo "<H1>Referencial de Propiedad</H1>";

    echo "<form method='POST'>";
    //echo "<input type='text' name='codigo' placeholder='Ingrese Codigo'><br>";
    echo "<input type='text' name='precio' placeholder='Ingrese Precio' required><br>";
    echo "<input type='text' name='direccion' placeholder='Ingrese Direccion' required><br>";
    echo "<input type='submit' name='agregar' value='Agregar'>";
    echo "</form>";

    
    echo "<form method='POST'>";
    echo "<input type='text' name='codigo' placeholder='Ingrese Codigo' required><br>";
    echo "<input type='submit' name='buscar' value='Buscar'>";
    echo "</form>";
    echo "<form method='POST'>";
    echo "<input type='submit' value='Reset'>";
    echo "</form>";

    
   //echo "<div align=\"justify\">Paises</div><br>";


    //CONSULTAR....

	$res = mysqli_query($conexion,$query);

    echo "<table border=1><tr><td>Codigo</td><td>Precio</td><td>Direccion</td><td colspan=2><center>Opciones </td></tr>";
	while ($fila = mysqli_fetch_assoc($res)) {
      echo "<tr><td style='text-align:center;'>";  
	  echo $codigo=$fila["pro_codigo"];
      echo "</td><td>";
	  echo $precio=$fila["pro_precio"];
      echo "</td><td/>";
      echo $direccion=$fila["pro_direccion"];
      echo "</td><td/>";

      

	  echo "<form action='eliminar.php' method='POST'>";
	  echo "<input type='hidden' name='codigo' value='$codigo'>";
	  echo "<input type='submit' value='Eliminar' name='eliminar'>";
	  echo "</form>";

	  echo "</td><td>";

	  echo "<form action='modificar.php' method='POST'>";
	  echo "<input type='hidden' name='codigo' value='$codigo'>";
	  echo "<input type='submit' value='Modificar' name='modificar'>";
	  echo "</form>";


      echo "</td></tr>"; 
	}