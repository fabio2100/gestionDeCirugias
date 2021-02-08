<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    echo "<meta http-equiv='refresh' content ='0;url=index.html'>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="row">
    <a href="agregarCirugia.php" class="p-4 btn btn-primary col-xs-12 col-sm-12 col-md-4 col-lg-4">Agregar cirugía</a>
    <a href="mostrarCirugias.php" class="p-4 btn btn-danger col-xs-12 col-sm-12 col-md-4 col-lg-4">Ver, editar o eliminar cirugías</a>
    <a href="buscador.php" class="p-4 btn btn-dark col-xs-12 col-sm-12 col-md-4 col-lg-4">Buscador</a>
  </div>
  

  <?php
  require('funciones.php');
  $sql1 = "SELECT * FROM cirugias WHERE fecha = CURDATE() AND suspendida = 0";
  if (registrosEncontrados($sql1) > 0){
    echo "<p class='h3'>Cirugías HOY</p>";
    mostrarCirugias($sql1);
  }
  $sql3 = "SELECT * FROM cirugias WHERE suspendida = 1";
  if (registrosEncontrados($sql3)>0){
    echo "<details><summary><p class='h3'>Cirugías suspendidas</p>";
    echo "</summary>";
    mostrarCirugias($sql3);
    echo "</details>";
  }
  ?>
  <p class="h3">Próximas cirugías</p>
  <?php
  $sql = "SELECT * FROM cirugias WHERE fecha > NOW() ORDER BY fecha";
  //require('funciones.php');
  mostrarCirugias($sql);
  ?>
</body>
</html>