<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Búsqueda avanzada</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <?php
    $fecha = $_GET['fecha'];
    if ($fecha == ''){
      $fecha = NULL;
    }
    $hora = $_GET['hora'];
    if ($hora == ''){
      $hora = NULL;
    }
    $lugar = $_GET['lugar'];
    $principal = $_GET['principal'];
    $ayudante = $_GET['ayudante'];
    $tecnico = $_GET['tecnico'];
    $paciente = $_GET['paciente'];
    $servicios = $_GET['servicios'];
    $descartables = $_GET['descartables'];
    $remito = $_GET['remito'];  
    $observaciones = $_GET['observaciones'];
    $factura = $_GET['factura'];
    if (isset($_GET['protocolo'])){
      $protocolo = 1;
    }else{
      $protocolo = 0;
    }
    if (isset($_GET['certificadoDeImplante'])){
      $certificadoDeImplante = 1;
    }else{
      $certificadoDeImplante = 0;
    }
    if (isset($_GET['realizada'])){
      $realizada = 1;
    }else{
      $realizada = 0;
    }
    if (isset($_GET['facturada'])){
      $facturada = 1;
    }else{
      $facturada = 0;
    }
    if (isset($_GET['cobrada'])){
      $cobrada = 1;
    }else{
      $cobrada = 0;
    }
    $nro = $_GET['nro'];

    $sql = "SELECT * FROM cirugias WHERE (fecha  LIKE '%$fecha%') AND
    (hora  LIKE '%$hora%'); AND
    lugar  LIKE '%$lugar%' AND
    principal  LIKE '%$principal%' AND
    ayudante  LIKE '%$ayudante%' AND
    tecnico  LIKE '%$tecnico%' AND
    paciente  LIKE '%$paciente%' AND
    servicios  LIKE '%$servicios%' AND
    descartables  LIKE '%$descartables%' AND
    remito  LIKE '%$remito%' AND
    observaciones LIKE '%$observaciones%' AND
    factura  LIKE '%$factura%' AND
    protocolo  = $protocolo AND
    certificadodeimplante  = $certificadoDeImplante AND
    estado  = $realizada AND
    facturada = $facturada AND
    cobrada  = $cobrada AND
    nro  LIKE '%$nro%'";
    echo $sql;
    require('funciones.php');
    mostrarCirugias($sql);

  ?>
</body>
</html>