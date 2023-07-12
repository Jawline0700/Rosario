<?php 

include ('../conexion/conexion.php');
include ('../clases/cita.php');
date_default_timezone_set('America/Mexico_City');

if(!empty($_POST['fecha']) || !empty($_POST['cedula']) || !empty($_POST['tratamiento'])) {

 $fecha_cita = $_POST['fecha'];
 $cedula = $_POST['cedula'];
 $id_medico = $_POST['medico'];
 $tipo= $_POST['tratamiento'];
 $fecha_actual = date("d-m-Y");
 $fecha_cita2 = date("d-m-Y",strtotime($fecha_cita));
 $estado = 3;
 echo $fecha_actual;
 echo $fecha_cita2;


 
  if($fecha_cita2 < $fecha_actual){
    
    header("Location: ../html/control_citas.php?msg=error2");

  }else {
        
      $consultar = $conexion->query("SELECT cedula FROM cita AS c INNER JOIN usuario as u 
      ON c.ID_Paciente = u.ID_Usuario WHERE u.Cedula = '$cedula' AND 
      c.Fecha = '$fecha_cita' and c.ID_Tipo_Tratamiento = '$tipo'");

      if($consultar->rowCount()>0){

        header("Location: ../html/control_citas.php?msg=error");

      }else{
          $sentencia = $conexion->query("SELECT ID_Usuario FROM usuario WHERE Cedula = '$cedula' AND Tipo_Usuario = 4 AND Estado = 1");
          $registro = $sentencia->fetch(PDO::FETCH_OBJ);

          // Obtener la última cita ingresada de ese tipo
          $sentencia2 = $conexion->query("SELECT c.Orden FROM cita c WHERE c.Fecha = '$fecha_cita' and c.ID_Tipo_Tratamiento = $tipo ORDER BY c.Orden DESC LIMIT 1");
          $registro2 = $sentencia2->fetch(PDO::FETCH_OBJ);
          $orden = 1;
            if($sentencia2->rowCount()>0){
            $orden = $registro2->Orden + $orden;
            }
            if($sentencia->rowCount()>0){
            $ID_Paciente = $registro->ID_Usuario;

            $datos = new cita($fecha_cita,$ID_Paciente,$id_medico,$tipo,$estado,$orden);

              try{
              $stmt = $conexion->prepare("INSERT INTO cita (Fecha,ID_Paciente,ID_Medico,ID_Tipo_Tratamiento,ID_Estado_Cita,Orden) values (:Fecha,:ID_Paciente,:ID_Medico,:ID_Tipo_Tratamiento,:ID_Estado_Cita,:Orden)");
              $stmt->execute((array)$datos);

              header("Location: ../html/control_citas.php?msg=Exito2");

              }catch(PDOException $e){

      header("Location: ../html/control_citas.php?msg=No se puedo crear la cita.".$e);
      }
   
     
    }
    }
  }
}
else {
      header("Location: ../html/control_citas.php?msg=Invalidos");
      }
 
     





?>