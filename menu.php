<?php
session_start();
    $usu=$_SESSION["usuarioActivo"];
    $cod=$_SESSION["codigo"];
?>
  <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
   <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menú Principal</title>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Start Field -->

<div class="sub-menu">
  <div class="sub-menu-nav">
    <button class="nav-btn">Referenciales</button>
    <div class="sub-menu-alt">
      <a href="referenciales/empleado">Empleado</a>
      <a href="referenciales/tipo">Tipo Empleado</a>
      <a href="referenciales/propiedad">Propiedad</a>
      <a href="referenciales/cliente">Cliente</a>
      <a href="referenciales/estado">Estado</a>
    </div>
  </div> 
  <div class="sub-menu-nav">
    <button class="nav-btn">Movimientos</button>
    <div class="sub-menu-alt">
      <a href="movimientos/registrarventa/index.php">COBRO</a>
      <a href="movimientos/">COMPRA</a>
      <a href="movimientos/">PAGO</a>
      <a href="movimientos/">VENTA</a>
    </div>
  </div> 
  <div class="sub-menu-nav">
    <button class="nav-btn">Informes</button>
    <div class="sub-menu-alt">
      <a href="informes/">x</a>
      <a href="informes/">x</a>
      <a href="informes/">x</a>
      <a href="informes/">x</a>
    </div>
  </div>
  <a href="logout.php">Logout</a>
</div>
<div class="footer">
</div>
</body>
</html>