<?php 

include ('../conexion/conexion.php');
include ('../clases/cita.php');

if(!empty($_POST)){
 $fecha_cita = $_POST['fecha'];
 $cedula = $_POST['cedula'];
 $id_medico = $_POST['medico'];
 $tipo= $_POST['tratamiento'];
 $estado = 2;
 $sentencia = $conexion->query("SELECT p.ID_Paciente from usuario as u INNER JOIN paciente as p ON p.ID_User = u.ID_Usuario WHERE Cedula = '$cedula' AND Tipo_Usuario = 4");
 $registro = $sentencia->fetch(PDO::FETCH_OBJ);

 if($sentencia->rowCount()>0){
   $ID_Paciente = $registro->ID_Paciente;

    $datos = new cita($fecha_cita,$ID_Paciente,$id_medico,$tipo,$estado);

    try{
      $stmt = $conexion->prepare("INSERT INTO cita (Fecha,ID_Paciente,ID_Medico,ID_Tipo_Tratamiento,ID_Estado_Cita,Orden) values (:Fecha,:ID_Paciente,:ID_Medico,:ID_Tipo_Tratamiento,:ID_Estado_Cita,0)");
      $stmt->execute((array)$datos);

    }catch(PDOException $e){

    header("Location: ../html/control_citas.php?msg=No se puedo crear la cita.".$e);
    }
    
   

    header("Location: ../html/control_citas.php?msg=Exito2");
 }
 else {
    header("Location: ../html/control_citas.php?msg=Invalidos");
 }


}
else{
 header("Location: ../html/control_citas.php?msg=Vacios");
}


?>