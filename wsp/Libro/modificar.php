<?php
    require_once("../conexion.php");

    $codigo=$_REQUEST['codigo'];
    $nombre=$_REQUEST['nombre'];
    $pagina=$_REQUEST['pagina'];
    

    $sql = "UPDATE libros
            set lib_nombre=:NOMBRE,
                lib_pagina=:PAGINA
            WHERE lib_codigo=:CODIGO";

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':CODIGO', $codigo);
    $stmt->bindParam(':NOMBRE', $nombre);
    $stmt->bindParam(':PAGINA', $pagina);
   
    if($stmt->execute()) {
            $datos=sarray("CREATE"=>"OK");
    } else {
        $datos = array("CREATE"=>"ERROR");
    }

    echo json_encode($datos);
    ?>