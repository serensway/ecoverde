CREATE TABLE nacionalidad (
                nac_codigo INT AUTO_INCREMENT NOT NULL,
                nac_descripcion VARCHAR(30) NOT NULL,
                PRIMARY KEY (nac_codigo)
);


----------------------------------------------------------------
<?php
    require_once("../conexion.php");
    $sql_read = "SELECT * from torta ORDER BY tor_codigo";
    $datos = $PDO->query($sql_read);
    $resultado = array();
    while($m = $datos->fetch(PDO::FETCH_OBJ)){
        $resultado[]=array( "cod"=>$m->tor_codigo,
                            "sab"=>$m->tor_sabor,
                            "pes"=>$m->tor_peso,
                            "pre"=>$m->tor_precio
                        );
    }
    echo json_encode($resultado);
?>