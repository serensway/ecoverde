<?php
	include("conexion.php");

	$usuario=$_REQUEST['usuario'];
	$clave=$_REQUEST['clave'];

	$sql = "SELECT * from usuario 
			where usu_usuario=:USUARIO 
			and usu_clave=:CLAVE";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':USUARIO', $usuario);
	$stmt->bindParam(':CLAVE', $clave);

	if($stmt->execute()) {
		$a=0;
		while($m = $stmt->fetch(PDO::FETCH_OBJ)){
			$datos=array(	"CREATE"=>"OK", 
							"nom"=>$m->usu_nombres,
							"ape"=>$m->usu_apellidos,
							"cod"=>$m->usu_codigo);
			$a=1;
		}

		if($a==0) $datos = array("CREATE"=>"NO EXISTE");

	} else {
		$datos = array("CREATE"=>"ERROR SQL");
	}

	echo json_encode($datos);
	
?>