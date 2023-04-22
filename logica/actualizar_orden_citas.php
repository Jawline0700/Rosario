<?php

include ('../conexion/conexion.php');

// Actualizar el orden de atención en la tabla de citas de un día específico
$sentencia = $conexion->prepare("SELECT ID_Tipo_Tratamiento FROM tipo_tratamiento");
$sentencia->execute();
$registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach($registro as $row){
  $num = $row['ID_Tipo_Tratamiento'];
  $sentencia2 = $conexion->query("SELECT ID_Paciente, Orden FROM cita WHERE Fecha = '2023-04-14' AND ID_Tipo_Tratamiento = $num");
  $sentencia2->execute();
  $registro2 = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
  $orden = 1;

  if($sentencia2->rowCount()>0){
    foreach($registro2 as $ordenar){
      try{
          $id = $ordenar['ID_Paciente'];
          $stmt = $conexion->prepare("UPDATE cita SET Orden = $orden WHERE Fecha = '2023-04-14' AND ID_Paciente = $id");
          $stmt->execute();
          $orden += 1;
      } catch(PDOException $e){
        echo $e;
      }
    }
  }
}

?>