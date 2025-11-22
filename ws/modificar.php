<?php
    require_once("conexion.php");

    $descripcion=$_REQUEST['descripcion'];
    $codigo=$_REQUEST['codigo'];
   
    $sql = "UPDATE nacionalidad set nac_descripcion=:DESCRIPCION WHERE nac_codigo=:CODIGO";

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':DESCRIPCION', $descripcion);
    $stmt->bindParam(':CODIGO', $codigo);

    $stmt->execute();
    $arr = $stmt->errorCode();
   
    if ($arr==23000) {
        $datos = array("CREATE"=>"EXISTE");
    } else {
        $datos = array("CREATE"=>"OK");    
    }

    echo json_encode($datos);
?>