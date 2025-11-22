<?php
    require_once("conexion.php");

    $descripcion=$_REQUEST['descripcion'];
   
    $sql_insert = "INSERT INTO nacionalidad(nac_descripcion)
                   values (:DESCRIPCION)";

    $stmt = $PDO->prepare($sql_insert);

    $stmt->bindParam(':DESCRIPCION', $descripcion);

    if($stmt->execute()) {
        $id = $PDO->lastInsertID();
        $datos = array("CREATE"=>"OK", "ID"=>$id);
    } else {
        $datos = array("CREATE"=>"ERROR");
    }

    echo json_encode($datos);

    ?>