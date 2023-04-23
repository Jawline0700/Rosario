<?php

include ('../conexion/conexion.php');

// ACTUALIZAR EL ORDEN DE ATENCIÓN DE LAS CITAS
$sentencia = $conexion->prepare("SELECT ID_Tipo_Tratamiento FROM tipo_tratamiento");
$sentencia->execute();
$registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($registro as $row){
  // Obteniendo los datos de las citas
  $num = $row['ID_Tipo_Tratamiento'];
  $sentencia2 = $conexion->query("SELECT ID_Paciente, Orden FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $num");
  $sentencia2->execute();
  $registro2 = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
  $orden = 1;

  if($sentencia2->rowCount()>0){
    // Actualizando la columna orden
    foreach($registro2 as $ordenar){
      try{
          $id = $ordenar['ID_Paciente'];
          $stmt = $conexion->prepare("UPDATE cita SET Orden = $orden WHERE Fecha = CURDATE() AND ID_Paciente = $id");
          $stmt->execute();
          $orden += 1;
      } catch(PDOException $e){
        echo $e;
      }
    }
  }
}

?>