<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar o eliminar cirugía</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div>
    <a  class="button btn-secondary p-4" href="index.php">Volver</a>
  </div>
  <br>
  <?php
  //try {
    //require('conexionacirugias.php');
    $sql = "SELECT * FROM cirugias ORDER BY fecha DESC,hora DESC";
    /*$resultado = $conn->query($sql);


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
      //echo date('d-m',strtotime($fila['fecha'])) . "</td><td>";
      //echo date('H:i',strtotime($fila['hora'])) . "</td><td>";
      //echo $fila["fecha"] . "</td><td>";
      //echo $fila["hora"] . "</td><td>";
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
*/
  require('funciones.php');
  mostrarCirugias($sql);
  ?>
</body>

</html>