<?php
	include("../../conexion.php"); 

    if(!empty($_POST["agregar"])){
        $codigo=$_POST["codigo"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $costo=$_POST["costo"];
        $consulta="INSERT INTO producto(pro_codigo,pro_descripcion,pro_precio,pro_costo) 
        VALUES($codigo,'$descripcion', $precio, $costo)";
        mysqli_query($conexion,$consulta);
    }

    if(!empty($_POST["eliminar"])){
      $cod=$_POST["codigo"];
      $consulta="DELETE FROM producto WHERE pro_codigo=$cod";
      mysqli_query($conexion,$consulta);
    }
    
    if(!empty($_POST["modificar"])){
        $codigo=$_POST["codigo"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $costo=$_POST["costo"];
        $consulta="UPDATE producto SET pro_descripcion='$descripcion', pro_precio='$precio', pro_costo='$costo'  WHERE pro_codigo=$codigo"; 
        mysqli_query($conexion,$consulta);
    }

    if(!empty($_POST["buscar"])){
        $codigo=$_POST["codigo"];
        $query="SELECT * FROM producto WHERE pro_codigo=$codigo";
    } else {
        $query="SELECT * FROM producto";
    }

    echo "<H1>Productos</H1>";

    echo "<form method='POST'>";
    echo "<input type='text' name='codigo' placeholder='Ingrese Codigo' required><br>";
    echo "<input type='text' name='descripcion' placeholder='Ingrese Descripcion' required><br>";
    echo "<input type='text' name='precio' placeholder='Ingrese Precio' required><br>";
    echo "<input type='text' name='costo' placeholder='Ingrese Costo' required><br>";
    echo "<input type='submit' name='agregar' value='Agregar'>";
    echo "</form>";

    
    echo "<form method='POST'>";
    echo "<input type='text' name='codigo' placeholder='Ingrese Codigo' required><br>";
    echo "<input type='submit' name='buscar' value='Buscar'>";
    echo "</form>";
    echo "<form method='POST'>";
    echo "<input type='submit' value='Reset'>";
    echo "</form>";


    //CONSULTAR....

	$res = mysqli_query($conexion,$query);

    echo "<table border=1><tr><td>Codigo</td><td>Descripcion<td>Venta</td><td>Compra</td><td colspan=2><center>Opciones </td></tr>";
	while ($fila = mysqli_fetch_assoc($res)) {
      echo "<tr><td style='text-align:center;'>";  
	  echo $codigo=$fila["pro_codigo"];
      echo "</td><td>";
	  echo $descripcion=$fila["pro_descripcion"];
	  echo "</td><td>";
      $precio=$fila["pro_precio"];
      echo $precio=number_format($precio,0);
      echo "</td><td>";

      $costo=$fila["pro_costo"];
      echo $costo=number_format($costo,0);
	  echo "</td><td>";

      

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