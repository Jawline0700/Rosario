<?php


//Variables
  $usuario = "root";
  $contraseña = "";
  $nombre_BD = "ion";

  try{
    //Conexión de Base de Datos
    $base_de_datos = new PDO('mysql:host=localhost;dbname='.$nombre_BD, $usuario, $contraseña, array(
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));

    echo ("La conexión se realizo de manera correcta");

  }catch(Exception $e){
    echo("Ocurrrio un error en la conexion:".$e->getMessage());
    
  }

?>