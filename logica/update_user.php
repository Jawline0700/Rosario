<?php 
include('../conexion/conexion.php');


if(!empty($_POST)){
    $nombre = $_POST['nombre-user'];
    $cedula = $_POST['cedula-user'];
    $correo = $_POST['correo-user'];
    $tipo = $_POST['user-tipo'];
    $telefono = $_POST['telefono-user'];
    $id_usuario = $_POST['id-usuario'];
    $info = ['nombre'=> $nombre,'cedula'=>$cedula,'telefono'=>$telefono,'correo'=>$correo,'tipo'=>$tipo,'id_usuario'=>$id_usuario];
    $info2 = ['nombre'=> $nombre,'cedula'=>$cedula,'telefono'=>$telefono,'correo'=>$correo,'id_usuario'=>$id_usuario];
    $sentencia = $conexion->query("SELECT * FROM usuario WHERE Cedula = '$cedula'");
    $registro = $sentencia->fetch(PDO::FETCH_OBJ);

    if($sentencia->rowCount()>0){ 
     $sentencia1 = $conexion->query("SELECT * FROM usuario WHERE ID_Usuario='$id_usuario'");
     $accion = $sentencia1->fetch(PDO::FETCH_OBJ);
     $tipo_user = $accion->Tipo_Usuario;

     if($tipo_user == 4){
        $sql = "UPDATE usuario set Nombre =:nombre,Cedula=:cedula,Telefono=:telefono,Email=:correo WHERE ID_Usuario =:id_usuario"; 
        $stmt = $conexion->prepare($sql);
        $stmt->execute($info2);
        header("Location: ../html/gestion_usuario.php?msg1=Usuario Editado con Exito.");
     }else{
        $sentencia2 = "UPDATE usuario set Nombre=:nombre,Cedula=:cedula,Telefono=:telefono,Email=:correo,Tipo_Usuario=:tipo WHERE ID_Usuario =:id_usuario";
        $accion2 = $conexion->prepare($sentencia2);
        $accion2->execute($info);
        header("Location: ../html/gestion_usuario.php?msg1=Usuario Editado con Exito.");
     }
    }
else{
    header("Location: ../html/gestion_usuario.php?msg1=Datos Invalidos");
}

}



?>