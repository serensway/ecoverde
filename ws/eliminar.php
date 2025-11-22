<?php
    require_once("conexion.php");

    $codigo=$_REQUEST['codigo'];
   
    $sql = "DELETE from nacionalidad where nac_codigo=:CODIGO";

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':CODIGO', $codigo);

    if($stmt->execute()) {
        $datos = array("CREATE"=>"OK");
    } else {
        $datos = array("CREATE"=>"ERROR");
    }

    echo json_encode($datos);

?>