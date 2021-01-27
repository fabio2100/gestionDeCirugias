<?php
$id = $_GET['id'];
$fecha = $_GET['fecha'];
if($fecha == ''){
  $fecha = NULL;
}
$hora = $_GET['hora'];
if ($hora ==''){
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
if (isset($_GET['estado'])){
  $estado = 1;
}else{
  $estado = 0;
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

try {
  require('funciones.php');
  actualizarCirugia($id,$fecha,$hora,$lugar,$remito,$paciente,$principal,$ayudante,$tecnico,$servicios,$descartables,$observaciones,$factura,$protocolo,$certificadoDeImplante,$estado,$facturada,$cobrada,$nro);
  header("location:mostrarCirugias.php");
} catch (Exception $e) {
  echo $e -> getLine() . $e -> getMessage();
}
?>