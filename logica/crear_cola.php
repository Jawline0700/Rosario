<?php 

include ('../conexion/conexion.php');

// CREANDO EL ORDEN DE LA COLA
// Para obtener los tipos de tratamientos
$sentencia = $conexion->prepare("SELECT ID_Tipo_Tratamiento FROM tipo_tratamiento");
$sentencia->execute();
$registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

try{
    foreach($registro as $reg){
        echo $sentencia->rowCount();
        $num = $reg['ID_Tipo_Tratamiento'];
    
        $sentencia2 = $conexion->prepare("SELECT ID_Paciente FROM cita WHERE Fecha = '2023-04-14' AND ID_Tipo_Tratamiento = $num ORDER BY Orden");
        $sentencia2->execute();
        $registro2 = $sentencia2->fetchAll(PDO::FETCH_ASSOC);

        echo $sentencia2->rowCount();
        foreach($registro2 as $reg2){
            $sentencia3 = $conexion->prepare("INSERT INTO cola (ID_Paciente) VALUES (:idP)");
            $sentencia3->bindParam(':idP', $reg2['ID_Paciente']);
            $sentencia3->execute();
        }
    }
} catch(PDOException $e) {
    echo $e;
}

?>