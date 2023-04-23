<?php 

include ('../conexion/conexion.php');

// CREANDO EL ORDEN DE LA COLA
// Para obtener los tipos de tratamientos
$sentencia = $conexion->prepare("SELECT ID_Tipo_Tratamiento FROM tipo_tratamiento");
$sentencia->execute();
$registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

try{
    foreach($registro as $reg){
        // Obtener las citas por tipo
        $num = $reg['ID_Tipo_Tratamiento'];
        $sentencia2 = $conexion->prepare("SELECT ID_Paciente, ID_Cita FROM cita WHERE Fecha = CURDATE() AND ID_Tipo_Tratamiento = $num ORDER BY Orden");
        $sentencia2->execute();
        $registro2 = $sentencia2->fetchAll(PDO::FETCH_ASSOC);

        foreach($registro2 as $reg2){
            // Insertar las citas a la cola
            $sentencia3 = $conexion->prepare("INSERT INTO cola (ID_Paciente) VALUES (:idP)");
            $sentencia3->bindParam(':idP', $reg2['ID_Paciente']);
            $sentencia3->execute();
        }
    }
} catch(PDOException $e) {
    echo $e;
}

?>