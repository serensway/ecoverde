//A este webservice debe conectarse el arduino
<?php
    require_once("../conexion.php");

    //Declarar variables
    $des1=0;
    $enc1=0;
    $his1=0;
    $des2=0;
    $enc2=0;
    $his2=0;
    $des3=0;
    $enc3=0;
    $his3=0;
    $des4=0;
    $enc4=0;
    $his4=0;
    $des5=0;
    $enc5=0;
    $his5=0;
    $des6=0;
    $enc6=0;
    $his6=0;
    $des7=0;
    $enc7=0;
    $his7=0;
    $des8=0;
    $enc8=0;
    $his8=0;

    //Primera consulta
    $sql = "SELECT * from dispositivo where dis_codigo=1";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
         $cod1 = $m->dis_codigo;
        $des1 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=1 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his1 = $m->his_codigo;
        $enc1 = $m->his_encendido;
    }

    //Segunda consulta
    $sql = "SELECT * from dispositivo where dis_codigo=2";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod2 = $m->dis_codigo;
        $des2 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=2 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his2 = $m->his_codigo;
        $enc2 = $m->his_encendido;
    }

    //Tercera consulta
    $sql = "SELECT * from dispositivo where dis_codigo=3";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod3 = $m->dis_codigo;
        $des3 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=3 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his3 = $m->his_codigo;
        $enc3 = $m->his_encendido;
    }

    //Cuarta consulta
    $sql = "SELECT * from dispositivo where dis_codigo=4";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod4 = $m->dis_codigo;
        $des4 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=4 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his4 = $m->his_codigo;
        $enc4 = $m->his_encendido;
    }

    //Quinta consulta
    $sql = "SELECT * from dispositivo where dis_codigo=5";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod5 = $m->dis_codigo;
        $des5 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=5 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his5 = $m->his_codigo;
        $enc5 = $m->his_encendido;
    }

    //Sexta consulta
    $sql = "SELECT * from dispositivo where dis_codigo=6";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod6 = $m->dis_codigo;
        $des6 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=6 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his6 = $m->his_codigo;
        $enc6 = $m->his_encendido;
    }



    //Septima consulta
    $sql = "SELECT * from dispositivo where dis_codigo=7";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod7 = $m->dis_codigo;
        $des7 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=7 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his7 = $m->his_codigo;
        $enc7 = $m->his_encendido;
    }




    //Octava consulta
    $sql = "SELECT * from dispositivo where dis_codigo=8";
    $datos = $PDO->query($sql);
    $resultado = array();

    while ($m = $datos->fetch(PDO::FETCH_OBJ)) {
        $cod8 = $m->dis_codigo;
        $des8 = $m->dis_descripcion;
    }
       
    $sql2 = "SELECT * from historial WHERE dis_codigo=8 ORDER BY his_codigo DESC LIMIT 1";
    $datos2 = $PDO->query($sql2);

    while ($m = $datos2->fetch(PDO::FETCH_OBJ)) {
        $his8 = $m->his_codigo;
        $enc8 = $m->his_encendido;
    }

    // Agregar resultados a la matriz
    $resultado = array(
        "des1" => $des1,
        "enc1" => $enc1,
        "his1" => $his1,
        "des2" => $des2,
        "enc2" => $enc2,
        "his2" => $his2,
        "des3" => $des3,
        "enc3" => $enc3,
        "his3" => $his3,
        "des4" => $des4,
        "enc4" => $enc4,
        "his4" => $his4,
        "des5" => $des5,
        "enc5" => $enc5,
        "his5" => $his5,
        "des6" => $des6,
        "enc6" => $enc6,
        "his6" => $his6,
        "des7" => $des7,
        "enc7" => $enc7,
        "his7" => $his7,
        "des8" => $des8,
        "enc8" => $enc8,
        "his8" => $his8
    );
    echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
?>