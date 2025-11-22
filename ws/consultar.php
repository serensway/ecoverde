<?php
    require_once("conexion.php");
    $sql_read = "SELECT * from nacionalidad ORDER BY nac_codigo";
    $datos = $PDO->query($sql_read);
    $resultado = array();
    while($m = $datos->fetch(PDO::FETCH_OBJ)){
        $resultado[]=array( "cod"=>$m->nac_codigo,
                            "des"=>$m->nac_descripcion
                        );
    }
    echo json_encode($resultado);
?>