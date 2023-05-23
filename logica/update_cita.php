<?php 

include('../conexion/conexion.php');

if(!empty($_POST)){
    $id = $_POST['id-cita'];
    $maquina = ($_POST['selectMaquina'] == "null") ? null : $_POST['selectMaquina'];
    $personalMedico = $_POST['selectPersonalMedico'];
    $estado = $_POST['selectEstado'];
    $gestion = $_POST['gestion'];
    $info = ['id'=> $id, 'maquina'=>$maquina, 'personalMedico'=>$personalMedico, 'estado'=>$estado];
    echo "Máquina: ".$maquina.", Personal Médico: ".$personalMedico.", Estado: ".$estado.", Gestión: ".$gestion.", ID_Cita: ".$id;

echo "si";
    $sentencia = "UPDATE cita SET ID_Maquina=:maquina, ID_Medico=:personalMedico, ID_Estado_Cita=:estado WHERE ID_Cita=:id";
    $stmt = $conexion->prepare($sentencia);
    $stmt->execute($info);
    echo "si";
    switch($gestion){
        case 1: 
            header("Location: ../html/gestión_radio.php?msg=Exito");
            break;
        case 2: 
            header("Location: ../html/gestión_quimio.php");
            break;
        default:
            header("Location: ../html/gestión_usuario.php?msg=Exito");
            break;
    }
} else {
    header("Location: ../html/gestión_quimio.php");
}

?>