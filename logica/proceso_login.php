<?php
session_start();
include("../conexion/conexion.php");

if(isset($_POST['cedula-inicio']) && isset($_POST['password'])){
  $cedula =$_POST['cedula-inicio'];
  $pass = ($_POST['password']);

  $consulta=$conexion->query("SELECT * From usuario Where Cedula='$cedula' and Password='$pass' and Estado = 1");
  $consulta->execute();
  $row=$consulta->fetch();

  if($consulta->rowCount()>0){
    $_SESSION['sw']=true;
    $_SESSION['id']=$row['ID_Usuario'];
    $_SESSION['tipo']=$row['Tipo_Usuario'];

    if($_SESSION['tipo'] == 4 ){
      header("Location: ../html/pagina_inicio.php");
    }else{
      header("Location: ../html/pagina_inicio2.php");
    }
    exit;
  }

else{
    header("Location: ../index.php?msg=1");
    exit();
}


}
else{
    echo "No Entro";
}





?>