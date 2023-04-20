<?php 
include ('../conexion/conexion.php');
include ('../clases/cita.php');
if(!empty($_POST)){

$Fecha = $_POST['fecha-editar'];
$cedula = $_POST['cedula-editar'];
$ID_Medico = $_POST['medico'];
$estado  = $_POST['estado'];
$ID_Tipo_Tratamiento = $_POST['tratamiento'];
$ID_Estado_Cita = $_POST['estado'];
$ID_Cita = $_POST['id-cita'];

$data = ['Fecha'=>$Fecha,'ID_Medico'=>$ID_Medico,'ID_Tipo_Tratamiento'=>$ID_Tipo_Tratamiento,'ID_Estado_Cita'=>$ID_Estado_Cita,'ID_Cita'=>$ID_Cita];
$sql = "UPDATE cita set Fecha=:Fecha,ID_Medico=:ID_Medico,ID_Tipo_Tratamiento=:ID_Tipo_Tratamiento,ID_Estado_Cita=:ID_Estado_Cita WHERE ID_Cita=:ID_Cita";

$stmt = $conexion->prepare($sql);
if($stmt->execute($data)){
    header("Location: ../html/control_citas.php?msg2=Cita editada con exito.");
}
}else{

    header("Location: ../html/control_citas.php?msg2=No deje Campos Vacios");

}

?>
