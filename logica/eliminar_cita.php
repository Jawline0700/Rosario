<?php 

include('../conexion/conexion.php');

if(!empty($_POST)){
$ID_Cita = $_POST['cita-id'];
 $data = ['id_cita'=>$ID_Cita]; 
 $sql = "DELETE from cita where ID_Cita=:id_cita";
 $stmt = $conexion->prepare($sql);
 if($stmt->execute($data)){ 
    header("Location: ../html/control_citas.php?msg=Eliminar");
 }

}

?>