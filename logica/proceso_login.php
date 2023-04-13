<?php
session_start();
include("../conexion/conexion.php");

if(isset($_POST['cedula-inicio']) && isset($_POST['password'])){
  $cedula =$_POST['cedula-inicio'];
  $pass = ($_POST['password']);

  $consulta=$conexion->query("SELECT * From usuario Where Cedula='$cedula' and Password='$pass' and Tipo_Usuario=4");
  $consulta->execute();
  $row=$consulta->fetch();

  if($consulta->rowCount()>0){
    $_SESSION['sw']=true;
    $_SESSION['id']=$row['ID_Usuario'];
    
    header("Location: ../html/pagina_inicio.php");
    exit;
  }

else{
    header("Location: ../index.php?msg=Cédula o Contraseña incorrectos, intentelo nuevamente");
    exit();
}


}
else{
    echo "no entro";
}





?>