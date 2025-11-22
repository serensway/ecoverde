<?php
    require_once("../conexion.php");

    $codigo=$_REQUEST['codigo'];
    $pagina=$_REQUEST['pagina'];
    $nombre=$_REQUEST['nombre'];
   
    $sql_insert = "INSERT INTO libros (lib_codigo,lib_pagina,lib_nombre)
                   values (:COD, :PAG, :NOM)";

    $stmt = $PDO->prepare($sql_insert);

    $stmt->bindParam(':COD', $codigo);
    $stmt->bindParam(':PAG', $pagina);
    $stmt->bindParam(':NOM', $nombre);

    if($stmt->execute()) {
        $id = $PDO->lastInsertID();
        $datos = array("CREATE"=>"OK", "ID"=>$id);
    } else {
        $datos = array("CREATE"=>"ERROR");
    }

    echo json_encode($datos);

    ?>