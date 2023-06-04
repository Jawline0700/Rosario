<?php
include("configuracion.php");

try{
  $conexion = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE,USER_NAME,PASS);
  $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 error_reporting(0);
  //echo "Conexion Exitosa <br>";
}catch(PDOException $e){
  echo "Problema de Conexion: ". $e->getMessage();
}


?>