<?php 
include "../logica/verificar_sesion.php"; 
include "../conexion/conexion.php";

    if(!empty($_POST)){
            $cedula = $_POST['cedula'];
            $tipo_user = $_SESSION['tipo'];

            $campos = $conexion->query("SELECT * from usuario WHERE Cedula = '$cedula' AND Tipo_Usuario = 4");

            $registrar = $campos->fetch(PDO::FETCH_OBJ);

     if($campos->rowCount()> 0){

                if($tipo_user == 4){
                    header("Location: pagina_inicio.php");
                }
        
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82edd683c2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../img/iconos/ION.png">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilo_base.css">
    <script>
         function pasardatos(){
            const tabla = document.getElementById("tabla");
            
            tabla.addEventListener('click', (e)=>{
                e.stopPropagation(); 
                 var id =  e.target.parentElement.parentElement.parentElement.children[0].textContent;
                 document.getElementsByName('cita-id')[0].value = id;
            })
        }
    </script>
   


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
          <li >
            <a href="../html/control_citas.php" >Gestión Citas</a></li>
            </li>
          <li ><a href="../html/gestión_solicitud.php" >Gestión Expediente</a></li>
          <li >
               <a href="../html/gestion_usuario.php" >Gestión Usuario</a> 
        </li>
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
            <h2 class="subtitulo">Gestión de Citas</h2>
        <div class="centrear">  
            <div class="buscar-info-container">
            <?php if(isset($_GET['msg'])){
                  $valor = $_GET['msg'];
                  if($valor == "Exito" ){ 
                    echo '<script type="text/JavaScript">
                    Swal.fire({
                        icon: "success",
                        title: "Cita Editada con exito",
                      })
                          </script>';
                    } else if($valor == "Vacios"){
                        echo '<script type="text/JavaScript">
                       Swal.fire({
                        icon: "warning",
                        title: "Campos Vacios",
                      })
                          </script>';
                    }
                    else if($valor == "Invalidos"){
                        echo '<script type="text/JavaScript">
                       Swal.fire({
                        icon: "error",
                        title: "Campos Invalidos",
                      })
                          </script>';
                    }
                    else if($valor == "Eliminar"){
                    echo '<script type="text/JavaScript">
                    Swal.fire({
                        icon: "success",
                        title: "Cita Eliminada con Exito",
                      })
                          </script>';
                    }
                    else if($valor == "Exito2"){
                        echo '<script type="text/JavaScript">
                        Swal.fire({
                            icon: "success",
                            title: "Cita Creada con exito",
                          })
                              </script>';
                    }
            } ?>                   
                <div class="contenido">
                    <button type="button" class="btn btn-crear" data-bs-toggle="modal" data-bs-target="#myModal">Buscar Cita</button>
                </div>
              <?php if($tipo_user == 1 ) { ?>
                <div class="contenido">
                    <button type="button" class="btn btn-buscar" data-bs-toggle="modal" data-bs-target="#myModal2">Crear Cita</button>
                </div>
                <?php } ?>
                
                     <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Buscar Paciente</h5>
                                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                                </div>
                                
                                <div class="modal-body">
                                    <form action= "buscar_cita.php" method="Post">
                                        <div class="mb-3" >
                                            <input type="text" class="icono-lupa-placeholder-image" placeholder="Digite la Cédula" name="cedula">
                                        </div>
                                        <div class="modal-footer pie-pagina">
                                    <button type="submit" class="btn btn-crear">Buscar</button>
                                    <button type="Reset" class="btn btn-buscar">Cancelar</button>

                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                     </div>


                     <div class="modal" id="myModal2">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Crear Cita</h5>
                                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <form action="../logica/insertar_citas.php" method="POST">
                                        <div class="mb-3">
                                            <label class="texto">Fecha de Cita</label>
                                            <br>
                                            <input type="date" class="seleccion" name="fecha" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="texto">Cédula Paciente</label>
                                            <input type="text" class="icono-placeholder-image" placeholder="Digite la Cédula" name="cedula" required>

                                        </div>
                                        <div class="mb-3">
                                            <label class="texto">Medico:</label>
                                            <br>
                                            <select id="Medicos" class="seleccion" name="medico" required>
                                                <?php 
                                                $informacion = $conexion->prepare("SELECT med.ID_Usuario, med.Nombre FROM usuario med 
                                                                                    WHERE med.Tipo_Usuario = 1");
                                                $informacion->execute();
                                                $data = $informacion->fetchAll();
                                                foreach($data as $identificador):
                                                    echo '<option value="'.$identificador["ID_Usuario"].'  name="medico">'.$identificador["Nombre"].'</option>';
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <br>
                                            <label class="texto">Tipo de Tratamiento</label>
                                            <br>
                                            <select id="Tipo" class="seleccion" name="tratamiento" required>
                                            <?php 
                                            $consultar = $conexion->prepare("SELECT * From tipo_tratamiento ");
                                            $consultar->execute();
                                            $info = $consultar->fetchAll();
                                            foreach($info as $valor):?>
                                             <option value= <?php echo $valor["ID_Tipo_Tratamiento"]?> ><?php echo $valor["Tipo"]?></option>';
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <div class="modal-footer pie-pagina">
                                        <button type="submit" class="btn btn-crear">Crear</button>
                                        <button type="reset" class="btn btn-buscar">Cancelar</button>
                                  </div>
                                    </form>
                                </div>
                               

                            </div>
                        </div>
                     </div>
                   
                
        
        </div>
        <table id="tabla">
            <thead>
                <tr>
                    <th class="col">ID_Cita</th>
                    <th class="col">Cédula</th>
                    <th class="col">Nombre</th>
                    <th class="col">Fecha Cita</th>
                    <th class="col">Estado</th>
                    <th class="col">Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php  
                    $query = "SELECT c.ID_Cita, med.Nombre, pac.Cedula, c.Fecha, e.Estado 
                    FROM cita c 
                    JOIN usuario pac ON c.ID_Paciente = pac.ID_Usuario 
                    JOIN usuario med ON c.ID_Paciente = med.ID_Usuario 
                    JOIN estado as e ON c.ID_Estado_Cita = e.ID_Estado
                    WHERE pac.Cedula = '$cedula' AND pac.Estado = 1
                    ORDER BY Actividad DESC";
                    $consulta=$conexion->query($query);
                    $consulta->execute();
                    if($consulta->rowCount()>0){
                    while($dato=$consulta->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <td data-titulo="ID_Cita" class="col"><?php echo $dato['ID_Cita']?></td>
                    <td data-titulo="Cédula" class="col"><?php echo $dato['Cedula']?></td>
                    <td data-titulo="Nombre" class="col"><?php echo $dato['Nombre']?></td>
                    <td data-titulo="Fecha Cita" class="col"><?php echo $dato['Fecha']?></td>
                    <td data-titulo="Estado" class="col"><?php echo $dato['Estado']?></td>
                    <td> 
                        <?php if($tipo_user == 1){?>
                        <div class="contenido">
                            <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3">Editar</button>
                        </div>
                        <div class="contenido">
                            <button type="button"  onclick="pasardatos()" class="btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#myModal4">Eliminar</button>
                        </div>
                        <?php }else{?>
                            Sin acciones...
                        <?php }?>
                     </td>
                </tr>
                <?php } }else{ ?>
                    <td data-titulo="Sin Cita" class="col" colspan=6>No Mantiene Citas...</td> 
                 <?php  } ?>  
            </tbody>
        </table>
        </div>
    </section>

    

    <div class="modal" id="myModal3">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Cita</h5>
                                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body centrear input-edit">
                                    <form action="../logica/editar_cita.php" method="POST" name="edit">
                                        <div class="mb-3">
                                            <label class="texto">Fecha de Cita</label>
                                            <br>
                                            <input type="date" class="seleccion" name="fecha-editar" readonly disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="texto">Cédula Paciente</label>
                                            <input type="text" class="icono-placeholder-image" placeholder="Digite la Cédula" name="cedula-editar" readonly disabled>

                                        </div>
                                        <div class="mb-3">
                                            <label class="texto">Medico:</label>
                                            <br>
                                            <select id="Medicos" class="seleccion" name="medico" readonly disabled>
                                                <?php 
                                                $informacion = $conexion->prepare("SELECT med.ID_Usuario, med.Nombre 
                                                                                    FROM usuario med 
                                                                                    WHERE med.Tipo_Usuario = 1");
                                                $informacion->execute();
                                                $data = $informacion->fetchAll();
                                                foreach($data as $identificador):
                                                    echo '<option value="'.$identificador["ID_Medico"].'  name="medico">'.$identificador["Nombre"].'</option>';
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <br>
                                            <label class="texto">Tipo de Tratamiento</label>
                                            <br>
                                            <select id="Tipo" class="seleccion" name="tratamiento" readonly disabled>
                                            <?php 
                                            $consultar = $conexion->prepare("SELECT * From tipo_tratamiento ");
                                            $consultar->execute();
                                            $info = $consultar->fetchAll();
                                            foreach($info as $valor):?>
                                             <option value= <?php echo $valor["ID_Tipo_Tratamiento"]?> ><?php echo $valor["Tipo"]?></option>';
                                            <?php endforeach; ?>
                                            </select>
                                        </div>                    
                                        <div class="mb-3">
                                        <br>
                                        <label class="texto">Estado de la Cita</label>
                                        <br>
                                        <select id="estado" class="seleccion" name="estado" >
                                            <?php 
                                            $consultar = $conexion->prepare("SELECT * from estado");
                                            $consultar->execute();
                                            $info = $consultar->fetchAll();
                                            foreach($info as $valor):?>
                                            <option value= <?php echo $valor["ID_Estado"]?> ><?php echo $valor["Estado"]?></option>';
                                            <?php endforeach; ?>
                                            ?>
                                        </select>
                                        <input type="hidden" name=id-cita>
                                        </div>
                                    <div class="modal-footer pie-pagina">
                                        <button type="submit" class="btn btn-crear">Editar</button>
                                        <button type="reset" class="btn btn-buscar">Cancelar</button>
                                  </div>
                                    </form>
                                </div>
                               

                            </div>
                        </div>
                     </div>
    <div class="modal" id="myModal4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="../logica/eliminar_cita.php">
                <div class="modal-body">
                    <p class="texto">¿Desea eliminar esta cita?</p>
                    <input type="hidden" name=cita-id>
                    <div class="modal-footer pie-pagina">
                        <button type="submit" class=" btn btn-buscar">Si</button>
                        <button type="submit" class="btn btn-crear">No</button>
                     </div>
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
  <img src="../img/LogoION.png" alt="Logo Hospital ION" style="height:70px" class="logo">
  <div class="social-icons-container">
    <a href="https://www.facebook.com/ioncologico" class="social-icon"></a>
    <a href="https://www.instagram.com/ioncologico/" class="social-icon"></a>
    <a href="https://twitter.com/ioncologico?lang=es" class="social-icon"></a>
  </div>
  <ul class="footer-menu-container">
    <a href="pagina_inicio2.php"><li class="menu-item">Inicio</li></a>
    <a href="gestión_solicitud.php"><li class="menu-item">Gestión Expediente</li></a>
    <a href="gestion_cita.php"><li class="menu-item">Gestión Citas</li></a>
    <a href="https://www.ion.gob.pa/resena-historica/"><li class="menu-item">Sobre Nosotros</li></a>
  </ul>
  <span class="copyright">&copy; 2023, Instituto Oncológico Nacional, Todos los derechos reservados.</span>


</footer>

<script src='../js/enviarinfo.js'></script>

</html>
<?php 
  }
  else{
    header("Location: ../html/control_citas.php?msg=Invalidos");
  }
}
else{
    header("Location: ../html/control_citas.php?msg=Vacios");
}

?>
