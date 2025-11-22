<?php
    require_once("../conexion.php");

    $sql_read = "SELECT * from libros ORDER BY lib_codigo";

    $datos = $PDO->query($sql_read);

    $resultado = array();

    while($m = $datos->fetch(PDO::FETCH_OBJ)){
        $resultado[]=array( "cod"=>$m->lib_codigo,
                            "nom"=>$m->lib_nombre,
                            "pag"=>$m->lib_pagina,
                            
                        );
    }
   
    echo json_encode($resultado);
?>