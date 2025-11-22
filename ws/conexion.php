<?php
	$servidor  = "localhost";
	$usuario   = "promo02_angeles";
	$clave 	   = "];RpVc?8r,S7";
	$basedatos = "promo02_angeles";

	try {
		$PDO=new PDO("mysql:host=$servidor;dbname=$basedatos","$usuario","$clave");
	} catch (PDOException $err){
		echo $err->getMessage();
	}
?>