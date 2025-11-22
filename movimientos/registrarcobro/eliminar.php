<?php
include("../../conexion.php"); 
$codigo=$_POST["codigo"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Confirmar Eliminación</title>
</head>
<body>

<h1>¿Desea eliminar el cobro con código <?php echo $codigo; ?>?</h1>

<div style="max-width: 500px; margin: 50px auto; text-align: center; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 8px 32px rgba(0,0,0,0.3);">
    
    <p style="font-size: 18px; color: #666; margin-bottom: 30px;">Esta acción eliminará el registro del cobro de la base de datos.</p>
    
    <form action='index.php' method='POST' style="display: inline-block; margin: 10px;">
        <input type='hidden' name='codigo' value='<?php echo $codigo; ?>'>
        <input type='submit' name='eliminar' value='SÍ, ELIMINAR' style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); width: 200px; padding: 15px;">
    </form>
   
    <form action='index.php' method='POST' style="display: inline-block; margin: 10px;">
        <input type='submit' value='NO, CANCELAR' style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); width: 200px; padding: 15px;">
    </form>
    
</div>

</body>
</html>