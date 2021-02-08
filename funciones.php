
<?php

function actualizarCirugia($id,$fecha,$hora,$lugar,$remito,$paciente,$principal,$ayudante,$tecnico,$servicios,$descartables,$observaciones,$factura,$protocolo,$certificadoDeImplante,$estado,$facturada,$cobrada,$nro,$suspendida){
  try {
    require('conexionacirugias.php');
    $sql = "UPDATE cirugias SET fecha = :fecha, hora = :hora, lugar = :lugar, remito = :remito, paciente = :paciente, principal=:principal,ayudante = :ayudante,tecnico = :tecnico,servicios=:servicios,descartables=:descartables,observaciones = :observaciones,factura = :factura,protocolo = $protocolo,certificadodeimplante=$certificadoDeImplante, estado = $estado,facturada = $facturada,cobrada = $cobrada,nro = :nro,suspendida = $suspendida WHERE id = $id";
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

//Function muestra cirugias-> cada registro en una fila 
/*function mostrarCirugias($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn->query($sql);
    echo "<table class='table table-striped table-dark table-responsive' border='1'><tr class='encabezado'><th>";
    echo "</th><th>";
    echo "</th><th>";
    echo "Fecha</th><th>";
    echo "Hora</th><th>";
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
    echo  "Cobrada?</th><th>";
    echo "SUSPENDIDA</th></th>";

    foreach ($resultado as $fila) {
      echo "<tr><td>";
      echo "<a href='modificaCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/editar.png'>" . "</a></td><td>";
      echo "<a href='eliminarCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/eliminar.png'>" . "</a></td><td>";
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
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      if ($fila['certificadodeimplante']==1 ){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      if ($fila['estado']==1 ){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      if ($fila['facturada']==1){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      echo $fila['nro'] . "</td><td>";
      if ($fila['cobrada']){
        echo "<input type='checkbox' checked onclick='return false;'>" . "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>" . "</td><td>";
      }

      if($fila['suspendida']==1){
        echo "<input type='checkbox' checked onclick='return false;'>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>";
      }
      
      echo "</td></tr>";
    }
    echo "</table>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo $e->getLine() . $e -> getMessage();
  }

}*/


//function muestraCirugias -> muestra cirugias en dos filas 

function mostrarCirugias($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn->query($sql);
    echo "<table class='table table-striped table-dark table-responsive' border='1'><tr class='encabezado'><th>";
    echo "</th><th>";
    echo "</th><th>";
    echo "Fecha</th><th>";
    echo "Hora</th><th>";
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
    echo "Nro y tipo de factura</th></th>";
    

    foreach ($resultado as $fila) {
      echo "<tr class='tabla-borde-sup'><td>";
      echo "<a href='modificaCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/editar.png'>" . "</a></td><td>";
      echo "<a href='eliminarCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/eliminar.png'>" . "</a></td><td>";
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
      echo $fila['nro'] . "</td></tr><tr class='tabla-borde-inf'>";
      echo "<td colspan='2'></td>";
      echo "<td colspan='13'>";
      if ($fila['protocolo']==1 ){
        echo "<label class='tabla-elemento-check'>Protocolo<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Protocolo<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['certificadodeimplante']==1 ){
        echo "<label class='tabla-elemento-check'>Certificado de implante<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Certificado de implante<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['estado']==1 ){
        echo "<label class='tabla-elemento-check'>Realizada<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Realizada<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['facturada']==1){
        echo "<label class='tabla-elemento-check'>Facturada<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Facturada<input type='checkbox' onclick='return false;'></label>";
      }
      
      if ($fila['cobrada']){
        echo "<label class='tabla-elemento-check'>Cobrada<input type='checkbox' checked onclick='return false;'></label>" ;
      }else{
        echo "<label class='tabla-elemento-check'>Cobrada<input type='checkbox' onclick='return false;'></label>" ;
      }

      if($fila['suspendida']==1){
        echo "<label class='tabla-elemento-check'>Suspendida<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Suspendida<input type='checkbox' onclick='return false;'></label>";
      }
      
      echo "</td>";
    }
    echo "</table>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo $e->getLine() . $e -> getMessage();
  }

}



function registrosEncontrados($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn -> query($sql);
    $nro = $resultado -> rowCount();
    $resultado -> closeCursor();
    $conn = null;
    return $nro;
  } catch (Exception $e) {
    $e -> getLine() . $e -> getMessage();
    return 0;
  }
}

?>