
<?php 
include "../logica/verificar_sesion.php";
include("../logica/verificar_quimio.php");
include("../logica/verificar_radio.php");

$tipo_user =  $_SESSION['tipo'];
$id = $_SESSION['id'];
if($tipo_user == 4){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82edd683c2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../img/iconos/ION.png">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilo_base.css">
</head>
<body>
    <header class="site-header contenedor">
        <a href="pagina_inicio.php"><img src="../img/logoGob.png" alt="Logo Gobierno"></a>
        <a href="pagina_inicio.php"><img src="../img/logoION.png" alt="Logo Hospital ION" style="height:70px"></a>
    </header>
    <div class="container__menu">
      <div class="menu">
       
            <input type="checkbox" id="check__menu">
            <div class="contenido"> 
                <label for="check__menu">
                <i class="fa-solid fa-bars icon__menu"></i>
                </label>
            </div>
        
    <nav>
      <ul>
          <li ><a href="../html/pagina_inicio.php" id="selected"></a></li>
          <li ><a href="../html/gestion_cita.php" >Historial Citas</a></li>
          <li ><a href="../html/solicitud.php" >Solicitud Expediente</a></li>
          <li ><a href="../html/servicios.php" >Servicios</a>
              <ul>
                 <li><?php if($consultar->rowCount()>0){?>
                    <a href="../html/servicio_Radio.php" >Radioterapia </a></li>
                    <?php } ?>
                  <li><?php if($consulta->rowCount()>0){?>
                    <a href="../html/servicio_Quimio.php" >Quimioterapia</a></li>
                    <?php }?>
              </ul>
          </li>
          <li >
            <?php if(!isset($_SESSION['sw'])){?>
                <a href="../index.php" >Cerrar Sesión</a>
           <?php }else{?>
            <a href="../logica/cerrar_sesion.php" >Cerrar Sesión</a>
        <?php } ?>
        </li>   
      </ul>
  </nav>
</div>     
</div>
<section>
    <div class="contenedor-tabla">
        <div class="row tbl-fixed">
            <h2 class="subtitulo">Historial de Citas</h2>
        <div class="centrear">  
            <div class="buscar-info-container">
        </div>
        <table>
            <thead>
                <tr>
                    <th class="col">ID_Cita</th>
                    <th class="col">Tipo de Cita</th>
                    <th class="col">Medico</th>
                    <th class="col">Fecha de Atención</th>
                    <th class="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT c.ID_Cita, t.Tipo as 'Tipo Cita', med.Nombre , c.Fecha, e.Estado as 'Estado Cita' 
                FROM cita c JOIN tipo_tratamiento AS t ON c.ID_tipo_tratamiento = t.ID_tipo_Tratamiento
                JOIN estado e ON e.ID_Estado = c.ID_Estado_Cita
                JOIN usuario pac ON c.ID_Paciente = pac.ID_Usuario
                JOIN usuario med ON c.ID_Medico = med.ID_Usuario
                WHERE ID_Paciente = '$id'" ;
                $consulta=$conexion->query($query);
                $consulta->execute();
                if($consulta->rowCount()>0){
                while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                    <td data-titulo="ID_Cita:" class="col"><?php echo $fila['ID_Cita'] ?></td>
                    <td data-titulo="Tipo de Cita:" class="col"><?php echo $fila['Tipo Cita']?></td>
                    <td data-titulo="Medico:" class="col"><?php echo $fila['Nombre']?></td>
                    <td data-titulo="Fecha de Atención:" class="col"> <?php echo $fila['Fecha']?></td>
                    <td data-titulo="Estado:" class="col"><?php echo $fila['Estado Cita']?></td>
                    </tr> 
             <?php
                }
            }else{?>
                <td data-titulo="Sin Cita" class="col" colspan=6>No Mantiene Citas...</td> 
          <?php  } ?>
            
            </tbody>
        </table>
        </div>
    </div>
  

</section>
<br>
<br>
<br>
<footer>
    <img src="../img/LogoION.png" alt="Logo Hospital ION" style="height:70px" class="logo">
    <div class="social-icons-container">
      <a href="https://www.facebook.com/ioncologico" class="social-icon"></a>
      <a href="https://www.instagram.com/ioncologico/" class="social-icon"></a>
      <a href="https://twitter.com/ioncologico?lang=es" class="social-icon"></a>
    </div>
    <ul class="footer-menu-container">
      <a href="pagina_inicio.php"><li class="menu-item">Inicio</li></a>
      <a href="solicitud.php"><li class="menu-item">Solicitud Expediente</li></a>
      <a href="gestion_cita.php"><li class="menu-item">Historial Citas</li></a>
      <a href="https://www.ion.gob.pa/resena-historica/"><li class="menu-item">Sobre Nosotros</li></a>
    </ul>
    <span class="copyright">&copy; 2023, Instituto Oncológico Nacional, Todos los derechos reservados.</span>
  
  
  </footer>
  
</body>
</html>


<?php 
} else{
  header("Location: ../index.php?msg=1");
  exit();
}
?>