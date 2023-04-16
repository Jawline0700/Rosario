<?php
include("../conexion/conexion.php");
$id_usuario = $_SESSION['id'];
$resultados = $conexion->query("SELECT pq.ID_Paciente FROM usuario AS p  INNER JOIN paciente AS pq ON p.ID_Usuario = pq.ID_User where p.ID_Usuario = '$id_usuario'");
$datoid = $resultados->fetch(PDO::FETCH_OBJ);
?>