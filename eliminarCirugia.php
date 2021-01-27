<?php
$id = $_GET['id'];
require('funciones.php');
eliminarCirugia($id);
header("location:mostrarCirugias.php");
?>