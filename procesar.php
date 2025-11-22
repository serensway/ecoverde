<?php    //inicio del archivo PHP
session_start(); 
	include("conexion.php");  //agregar un archivo
	$usuario=$_POST["usu"]; //recibir variables del formulario anterior
    $clave=$_POST["cla"];  //recibir variables del formulario anterior
	
	$query="SELECT * FROM empleado 
            WHERE emp_usuario='$usuario' 
            AND emp_clave='$clave'"; //

	$res = mysqli_query($conexion,$query); 	//resultset

	$ban=0;
	while ($fila = mysqli_fetch_assoc($res)) {
		$nombre=$fila["emp_nombres"];
		$codigo=$fila["emp_codigo"];
	    $ban=1;
		$_SESSION["usuarioActivo"]=$nombre;
		$_SESSION["codigo"]=$codigo;
	}

	if($ban==1){
	    header('Location: menu.php'); //redireccion
	} else {
	    header('Location: datos.php');
	}
?>