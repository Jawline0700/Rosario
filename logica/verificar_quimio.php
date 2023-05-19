<?php
include("../conexion/conexion.php");
$id_user = $_SESSION['id'];
$consulta = $conexion->query("SELECT c.Fecha, t.Tipo FROM cita as c 
                              INNER JOIN tipo_tratamiento as t ON c.ID_Tipo_Tratamiento = t.ID_Tipo_Tratamiento 
                              INNER JOIN usuario as u ON u.ID_Usuario = c.ID_Cita  
                              WHERE Fecha = CURDATE() AND c.ID_Tipo_Tratamiento = 2 AND u.ID_Usuario = '$id_user'");
$consulta->execute();
$lista = $consulta->fetch();





?>