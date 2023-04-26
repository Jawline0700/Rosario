<?php  
include "../logica/verificar_sesion.php";
include "../conexion/conexion.php";

if(!empty($_POST)){
    $cedula = $_POST['cedula-soli'];
    $tipo_user = $_SESSION['tipo'];    
    $campos = $conexion->query("SELECT * from usuario WHERE Cedula = '$cedula' AND Tipo_Usuario = 4");
    $registrar = $campos->fetch(PDO::FETCH_OBJ);
    if($campos->rowCount()> 0){


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Solicitud de Expediente Medico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82edd683c2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../img/iconos/ION.png">
    <script src='../js/infosoli.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilo_base.css">
   

</head>
<body>
    <header class="site-header contenedor">
        <a href="pagina_inicio2.php"><img src="../img/logoGob.png" alt="Logo Gobierno"></a>
        <a href="pagina_inicio2.php"><img src="../img/logoION.png" alt="Logo Hospital ION" style="height:70px"></a>
    </header>
    <div class="container__menu">
      <div class="menu">
        <input type="checkbox" id="check__menu">
        <label for="check__menu">
          <i class="fa-solid fa-bars icon__menu"></i>
        </label>
    <nav>
      <ul>
          <li ><a href="../html/pagina_inicio2.php" id="selected"></a></li>
          <li ><?php if($tipo_user == 1 || $tipo_user == 2){?>
            <a href="../html/control_citas.php" >Gestión Citas</a></li>
            <?php } ?></li>
          <li ><a href="../html/gestión_solicitud.php" >Gestión Expediente</a></li>
          <li ><?php if($tipo_user == 3){ ?>
            <a href="../html/gestion_usuario.php" >Gestión Usuario</a>
            <?php } ?></li>
          <li ><a href="../html/servicios2.php" >Servicios</a>
              <ul>
                  <li><a href="../html/gestión_radio.php" > Gestión Radioterapia </a></li>
                  <li><a href="../html/gestión_quimio.php" > Gestión Quimioterapia</a></li>
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
    <section class="contenedor-tabla">
        <div class="row tbl-fixed">
            <h2 class="subtitulo">Gestión de Solicitudes</h2>
        <div class="centrear">  
        <?php if(isset($_GET['msg'])){?>
            <?php $valor = $_GET['msg'];
                  if($valor == "Exito" ){ 
                    echo '<script type="text/JavaScript">
                    Swal.fire({
                        icon: "success",
                        title: "Solicitud Aprobada con exito",
                      })
                          </script>';
                    }
                    else if($valor == "Eliminar"){
                    echo '<script type="text/JavaScript">
                    Swal.fire({
                        icon: "success",
                        title: "Solicitud Rechazada con exito",
                      })
                          </script>';
                    }?>

            <?php } ?>
            <div class="buscar-info-container">

                <div class="contenido">
                    <button type="button" class="btn btn-crear" data-bs-toggle="modal" data-bs-target="#myModal">Buscar Solicitud</button>
                </div>  
                
                
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Buscar Solicitud</h5>
                                <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="../html/buscar_soli.php">
                                    <div class="mb-3" >
                                        <input type="text" class="icono-lupa-placeholder-image" placeholder="Digite la Cédula" name="cedula-soli">
                                    </div>
                            <div class="modal-footer pie-pagina">
                                <button type="submit" class="btn btn-crear">Buscar</button>
                                <button type="submit" class="btn btn-buscar">Cancelar</button>
                            </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                 </div>

        
        </div>
        <table id="tabla-soli">
            <thead>
                <tr>
                    <th class="col">ID_Solicitud</th>
                    <th class="col">Nombre</th>
                    <th class="col">Cédula</th>
                    <th class="col">Email</th>
                    <th class="col">Estado</th>
                    <th class="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $query = "SELECT s.ID_Solicitud , u.Nombre , u.Cedula , u.Email, i.Estado from solicitud_expediente 
                              as s INNER JOIN paciente as p ON p.ID_Paciente = s.ID_Paciente 
                              INNER JOIN usuario as u ON u.ID_Usuario = p.ID_User 
                              INNER JOIN estado_expediente as i ON i.ID_Estado_Expediente = s.Estado WHERE u.Cedula ='$cedula'";
                    $consulta = $conexion->query($query);
                    $consulta->execute();
                    if($consulta->rowCount()>0){
                    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <td data-titulo="ID_Solicitud" class="col"> <?php echo $fila['ID_Solicitud'] ?></td>
                    <td data-titulo="Nombre" class="col"><?php echo $fila['Nombre']?></td>
                    <td data-titulo="Cédula" class="col"><?php echo $fila['Cedula']?></td>
                    <td data-titulo="Email" class="col"><?php echo $fila['Email']?></td>
                    <td data-titulo="Estado" class="col"><?php echo $fila['Estado']?></td>
                  
                    <td> <?php if($tipo_user == 3){?>
                        <div class="contenido">
                            <button type="button" onClick="pasarid()" class="btn btn-editar"data-bs-toggle="modal" data-bs-target="#myModal3">Aprobar</button>
                        </div>
                        <div class="contenido">
                            <button type="button" onClick="pasaridsoli()" class="btn btn-eliminar"  data-bs-toggle="modal" data-bs-target="#myModal4">Rechazar</button>
                        </div>
                     </td>
                     <?php }else{?>
                        Sin Acciones...
                    <?php } ?>
                </tr>
                <?php } }else{?>
                <td data-titulo="Sin Solicitud" class="col" colspan=6>No hay solicitudes para mostrar..</td> 
               <?php } ?>
            </tbody>
        </table>
        </div>
    </section>

    

    <div class="modal" id="myModal3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aprobar Solicitud del Expediente</h5>
                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="../logica/aprobar_soli.php">
                <div class="modal-body centrear">
                    <p class="texto">¿Desea aprobar esta solicitud de expediente?</p>
                    <input type="hidden" name="id-soli">
                    <input type="hidden" name="correo-soli">
                </div>    
                <div class="modal-footer pie-pagina">
                    <button type="submit" class="btn btn-crear">Si</button>
                    <button type="submit" class="btn btn-buscar">No</button>

                </div>

                </form>
            </div>
        </div>
     </div>



    <div class="modal" id="myModal4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rechazar Solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="../logica/rechazar_soli.php">
                <div class="modal-body">
                    <p class="texto">¿Desea rechazar esta Solicitud de Expediente?</p>
                    <input type="hidden" name="soli-id">
                    <input type="hidden" name="soli-correo">
                    </div>
                    <div class="modal-footer pie-pagina">
                        <button type="submit" class=" btn btn-buscar">Si</button>
                        <button type="submit" class="btn btn-crear">No</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>
<footer>
  <img src="../img/logoION.png" alt="Logo Hospital ION" style="height:70px" class="logo">
  <div class="social-icons-container">
    <a href="https://www.facebook.com/ioncologico" class="social-icon"></a>
    <a href="https://www.instagram.com/ioncologico/" class="social-icon"></a>
    <a href="https://twitter.com/ioncologico?lang=es" class="social-icon"></a>
  </div>
  <ul class="footer-menu-container">
    <a href="pagina_inicio2.php"><li class="menu-item">Inicio</li></a>
    <a href="gestión_solicitud.php"><li class="menu-item">Gestión Expediente</li></a>
    <a href="../html/control_citas.php"><li class="menu-item">Gestión Citas</li></a>
    <a href="https://www.ion.gob.pa/resena-historica/"><li class="menu-item">Sobre Nosotros</li></a>
  </ul>
  <span class="copyright">&copy; 2023, Instituto Oncológico Nacional, Todos los derechos reservados.</span>
 

</footer>

</html>

<?php 
  }
  else{
    header("Location: ../html/gestión_solicitud.php?msg=Invalidos");
  }
}
else{
    header("Location: ../html/gestión_solicitud.php?msg=Vacios");
}

?>