<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    ?>
    <script type="text/javascript">
      window.location.replace("index.html");  
    </script>
    <?php
  }
?>
<?php
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
  if ($remito == ''){
    $remito = 0;
  }

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
  try {
    require('conexionacirugias.php');
    $sql = "INSERT INTO cirugias (fecha,hora,lugar,remito,paciente,principal,ayudante,tecnico,servicios,descartables,factura,observaciones,protocolo,certificadodeimplante,estado,facturada,cobrada,nro)
    values (:fecha,:hora,:lugar,$remito,:paciente,:principal,:ayudante,:tecnico,:servicios,:descartables,:factura,:observaciones,$protocolo,$certificadoDeImplante,$realizada,$facturada,$cobrada,:nro)";

    $resultado = $conn -> prepare($sql);
    $resultado -> execute(array(":fecha"=>$fecha,":hora"=>$hora,":lugar"=>$lugar,":paciente"=>$paciente,":principal"=>$principal,":ayudante"=>$ayudante,":tecnico"=>$tecnico,":servicios"=>$servicios,":descartables"=>$descartables,":factura"=>$factura,":observaciones"=>$observaciones,":nro"=>$nro));
    $resultado -> closeCursor();
    $conn = null;
    echo "Cargada correctamente";
    echo "<meta http-equiv='refresh' content ='0;url=inicio.php'>";
  } catch (Exception $e) {
    echo $e -> getLine() . $e -> getMessage();
  }
?>