<?php
  $conn = new PDO("mysql:host=localhost;dbname=medicor",'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>