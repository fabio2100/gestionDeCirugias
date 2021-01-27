<?php

function actualizarCirugia($id,$fecha,$hora,$lugar,$remito,$paciente,$principal,$ayudante,$tecnico,$servicios,$descartables,$observaciones,$factura,$protocolo,$certificadoDeImplante,$estado,$facturada,$cobrada,$nro){
  try {
    require('conexionacirugias.php');
    $sql = "UPDATE cirugias SET fecha = :fecha, hora = :hora, lugar = :lugar, remito = :remito, paciente = :paciente, principal=:principal,ayudante = :ayudante,tecnico = :tecnico,servicios=:servicios,descartables=:descartables,observaciones = :observaciones,factura = :factura,protocolo = $protocolo,certificadodeimplante=$certificadoDeImplante, estado = $estado,facturada = $facturada,cobrada = $cobrada,nro = :nro WHERE id = $id";
    $resultado = $conn -> prepare($sql);
    $resultado -> execute(array(":fecha"=>$fecha,":hora"=>$hora,":lugar"=>$lugar,":remito"=>$remito,":paciente"=>$paciente,":principal"=>$principal,":ayudante"=>$ayudante,":tecnico"=>$tecnico,":servicios"=>$servicios,":descartables"=>$descartables,":factura"=>$factura,":observaciones"=>$observaciones,":nro"=>$nro));
    $resultado -> closeCursor();
    $conn = null;
    echo "Modificada correctamente";
  } catch (Exception $e) {
    echo $e -> getLine() . $e -> getMessage();
  }
}

function eliminarCirugia($id){
  try {
    require('conexionacirugias.php');
    $sql = "DELETE FROM cirugias WHERE id = ?";
    $resultado = $conn -> prepare($sql);
    $resultado -> execute([$id]);
    $resultado -> closeCursor();
    $conn = null;
    echo "elimianda correctamente";
  } catch (Exception $e) {
    echo $e -> getLine() . $e -> getMessage();
  }
}

function mostrarCirugias($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn->query($sql);
    echo "<table class='table table-striped table-dark' align='center' border='1'><tr class='encabezado'><th>";
    echo "</th><th>";
    echo "</th><th>";
    echo "Fecha</th><th>";
    echo "Hora</h><th>";
    echo "Lugar</th><th>";
    echo "Remito</th><th>";
    echo "Paciente</th><th>";
    echo "Principal</th><th>";
    echo "Ayudante</th><th>";
    echo "Técnico</th><th>";
    echo "Servicios</th><th>";
    echo "Descartables</th><th>";
    echo "A quién se factura?</th><th>";
    echo "Observaciones</th><th>";
    echo "Protocolo</th><th>";
    echo "Certificado de implante</th><th>";
    echo "Realizada?</th><th>";
    echo "Facturada?</th><th>";
    echo "Nro de factura</th><th>";
    echo  "Cobrada?</th></th>";

    foreach ($resultado as $fila) {
      echo "<tr><td>";
      echo "<a href='modificaCirugia.php?id=" . $fila['id'] .   "'>" . "<img src='img/editar.png'>" . "</a></td><td>";
      echo "<a href='eliminarCirugia.php?id=" . $fila['id'] .   "'>" . "<img src='img/eliminar.png'>" . "</a></td><td>";
      if (is_null($fila['fecha'])){
        echo $fila["fecha"] . "</td><td>";
      }else{
        echo date('d-m',strtotime($fila['fecha'])) . "</td><td>";
      }

      if (is_null($fila['hora'])){
        echo $fila["hora"] . "</td><td>";
      }else{
        echo date('H:i',strtotime($fila['hora'])) . "</td><td>";
      }
      echo $fila["lugar"] . "</td><td>";
      echo $fila["remito"] . "</td><td>";
      echo $fila["paciente"] . "</td><td>";
      echo $fila["principal"] . "</td><td>";
      echo $fila["ayudante"] . "</td><td>";
      echo $fila["tecnico"] . "</td><td>";
      echo $fila["servicios"] . "</td><td>";
      echo $fila["descartables"] . "</td><td>";
      echo $fila["factura"] . "</td><td>";
      echo $fila["observaciones"] . "</td><td>";
      if ($fila['protocolo']==1 ){
        echo "<input type='checkbox' checked disabled>". "</td><td>";
      }else{
        echo "<input type='checkbox' disabled>". "</td><td>";
      }
      if ($fila['certificadodeimplante']==1 ){
        echo "<input type='checkbox' checked disabled>". "</td><td>";
      }else{
        echo "<input type='checkbox' disabled>". "</td><td>";
      }
      if ($fila['estado']==1 ){
        echo "<input type='checkbox' checked disabled>". "</td><td>";
      }else{
        echo "<input type='checkbox' disabled>". "</td><td>";
      }
      if ($fila['facturada']==1){
        echo "<input type='checkbox' checked disabled>". "</td><td>";
      }else{
        echo "<input type='checkbox' disabled>". "</td><td>";
      }
      echo $fila['nro'] . "</td><td>";
      if ($fila['cobrada']){
        echo "<input type='checkbox' checked disabled>"; //. "</td><td>";
      }else{
        echo "<input type='checkbox' disabled>";//. "</td><td>";
      }
      
      echo "</td></tr>";
    }
    echo "</table>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo $e->getLine() . $e -> getMessage();
  }
}

?>