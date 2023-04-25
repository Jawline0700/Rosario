<?php 
include("../conexion/conexion.php");
$id_user = $_SESSION['id'];
$consultar = $conexion->query("SELECT c.Fecha, t.Tipo FROM cita as c INNER JOIN tipo_tratamiento as t ON c.ID_Tipo_Tratamiento = t.ID_Tipo_Tratamiento  
                              INNER JOIN paciente as p ON P.ID_Paciente = C.ID_Paciente INNER JOIN usuario as u ON u.ID_Usuario = p.ID_User
                               WHERE Fecha = CURDATE() AND c.ID_Tipo_Tratamiento = 3 AND p.ID_User = '$id_user'");
$consultar->execute();
$lista = $consultar->fetch();


?>