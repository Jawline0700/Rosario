<?php 
include('../conexion/conexion.php');

if(!empty($_POST)){
 $ID_user = $_POST['delete'];
 $estado = 0;
 $data = ['id_user'=>$ID_user,'estado'=>$estado]; 
 $sql = "UPDATE usuario set Estado=:estado WHERE ID_Usuario=:id_user";
 $stmt = $conexion->prepare($sql);
 if($stmt->execute($data)){ 
    header("Location: ../html/gestion_usuario.php?msg1=Usuario desactivado con Exito.");
 }

}


?>