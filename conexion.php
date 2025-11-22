<?php
	$servidor  = "localhost";
	$usuario   = "promo02_angeles";
	$clave 	   = "];RpVc?8r,S7";
	$basedatos = "promo02_angeles";

	try {
		$PDO = new PDO("mysql:host=$servidor;dbname=$basedatos", "$usuario", "$clave");
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<!-- Conexión exitosa -->";
	} catch (PDOException $err){
		echo "Error de conexión: " . $err->getMessage();
		die();
	}
?>