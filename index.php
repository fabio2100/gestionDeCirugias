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
    <a href="agregarCirugia.html" class="p-4 btn btn-primary col-xs-12 col-sm-12 col-md-4 col-lg-4">Agregar cirugía</a>
    <a href="mostrarCirugias.php" class="p-4 btn btn-danger col-xs-12 col-sm-12 col-md-4 col-lg-4">Ver, editar o eliminar cirugías</a>
    <a href="buscador.html" class="p-4 btn btn-dark col-xs-12 col-sm-12 col-md-4 col-lg-4">Buscador</a>
  </div>
  <p class="h3">Cirugías HOY</p>
  <?php
  $sql1 = "SELECT * FROM cirugias WHERE fecha = CURDATE()";
  require('funciones.php');
  mostrarCirugias($sql1);
  ?>
  <p class="h3">Próximas cirugías</p>
  <?php
  $sql = "SELECT * FROM cirugias WHERE fecha > NOW() ORDER BY fecha";
  //require('funciones.php');
  mostrarCirugias($sql);
  ?>
</body>
</html>