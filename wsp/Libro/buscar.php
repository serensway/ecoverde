
<?php
    require_once("../conexion.php");

    $codigo=$_REQUEST['codigo'];

    $sql_search = "SELECT * from libros where lib_codigo=:CODIGO";

    $stmt = $PDO->prepare($sql_search);

    $stmt->bindParam(':CODIGO', $codigo);

    if($stmt->execute()) {
        $a=0;
        while($m = $stmt->fetch(PDO::FETCH_OBJ)){
            $datos=array(   "CREATE"=>"OK",
                            "cod"=>$m->lib_codigo,
                            "nom"=>$m->lib_nombre,
                            "pag"=>$m->lib_pagina);          
            $a=1;
        }

        if($a==0) $datos = array("CREATE"=>"NO EXISTE");

    } else {
        $datos = array("CREATE"=>"ERROR SQL");
    }

    echo json_encode($datos);
?>