<?php 
include "../logica/verificar_sesion.php";
include "../conexion/conexion.php";
$tipo_user = $_SESSION['tipo'];

    if(!empty($_POST)){
            $cedula = $_POST['cedula-search'];
            $campos = $conexion->query("SELECT * from usuario WHERE Cedula = '$cedula' AND Estado = 1");
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
    <title>Gestión de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82edd683c2.js" crossorigin="anonymous"></script>
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../img/iconos/ION.png">
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
          <li >
            <a href="../html/control_citas.php" >Gestión Citas</a></li>
        </li>
          <li ><a href="../html/gestión_solicitud.php" >Gestión Expediente</a></li>
          <li >
            <a href="../html/gestion_usuario.php" >Gestión Usuario</a></li>
          <li ><a href="../html/servicios2.php" >Servicios</a>
              <ul>
                  <li><a href="../html/gestión_radio.php">Gestión Radioterapia </a></li>
                  <li><a href="../html/gestión_quimio.php">Gestión Quimioterapia</a></li>
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
            <h2 class="subtitulo">Gestión de Usuarios</h2>
        <div class="centrear">  
            <div class="buscar-info-container">
            <?php if(isset($_GET['msg'])){?>
            <?php $valor = $_GET['msg'];
                  if($valor == "Exito" ){ 
                    echo '<script type="text/JavaScript">
                    Swal.fire({
                        icon: "success",
                        title: "Usuario Editado con exito",
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
                        title: "Usuario Eliminado con Exito",
                      })
                          </script>';
                    }
                    else if($valor == "Exito2"){
                        echo '<script type="text/JavaScript">
                        Swal.fire({
                            icon: "success",
                            title: "Usuario Creado con exito",
                          })
                              </script>';
                    }
                    else if($valor == "Error2"){
                        echo '<script type="text/JavaScript">
                        Swal.fire({
                            icon: "error",
                            title: "Cedula o Correo ya registrado",
                          })
                              </script>';
                    }
                    ?>
            <?php } ?>
                <div class="contenido">
                    <button type="button" class="btn btn-crear" data-bs-toggle="modal" data-bs-target="#myModal">Buscar Usuario</button>
                </div>

                <?php if($tipo_user == 3){ ?>
                <div class="contenido">
                    <button type="button" class="btn btn-buscar" data-bs-toggle="modal" data-bs-target="#myModal2">Crear Usuario</button>
                </div>
                <?php } ?>
                
                     <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Buscar Usuario</h5>
                                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST" Action="buscar_user.php">
                                        <div class="mb-3" >
                                            <input type="text" class="icono-lupa-placeholder-image" placeholder="Digite la Cédula" name="cedula-search" pattern="[A-Za-z0-9]+[-]" title="No acepta caracteres especiales">
                                        </div>
                                        <div class="modal-footer pie-pagina">
                                            <button type="submit" class="btn btn-crear">Buscar</button>
                                            <button type="reset" class="btn btn-buscar">Cancelar</button>
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
                                    <h5 class="modal-title">Crear Usuario</h5>
                                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                                </div>

                <div class="modal-body centrear">
                    <form method="POST"  action="../logica/crear_usuario.php">
                        <div class="mb-3">
                            <label class="texto">Nombre:</label>
                            <br>
                            <input type="text" class="seleccion icono-placeholder-image" placeholder="Digite el Nombre" name="nombre-crear" required>
                        </div>
                        <div class="mb-3">
                            <label class="texto">Cédula:</label>
                            <input type="text" class="icono-cedula" placeholder="Digite la Cédula" name="cedula-crear" required>

                        </div>
                        <div class="mb-3">
                            <label class="texto">Edad:</label>
                            <br>
                            <input type="number" class="seleccion icono-edad"  placeholder="Digite la edad" name="edad-crear" min=1 max=120 required>
                        </div>
                        <div class="mb-3">
                            <br>
                            <label class="texto">Correo Electronico:</label>
                            <br>
                            <input type="email" class="seleccion icono-email" placeholder="Digite el Email" name="email-crear" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Debe contener tres cadenas separadas por un @ y un punto" required>
                        </div>
                        <div class="mb-3">
                            <label class="texto">Télefono:</label>
                            <input type="text"  placeholder="Digite su Telefono" name="telefono-crear" title="Ingrese un número de 8 Digitos">
                        </div>
                        <div class="mb-3">
                            <br>
                            <label class="texto">Tipo de Usuario:</label>
                            <br>
                            <select id="estado-crear" class="seleccion" name="user-tipo" required>
                                <?php  
                                $informacion = $conexion->prepare("SELECT * from rol_usuario");
                                $informacion->execute();
                                $data = $informacion->fetchAll();
                                foreach($data as $fila):?>
                                  <option value="<?php echo $fila["ID_Rol"]?>"><?php echo $fila["Descripcion"]?></option>
                                <?php endforeach;?> 
    
                            </select>
                            </div>

                            <div class="mb-3">
                            <br>
                            <label class="texto">Especialidad</label>
                            <br>
                            <select required id="especial-crear" class="seleccion" name="especial">
                                <?php  
                                $informacion = $conexion->prepare("SELECT * from Especialidad");
                                $informacion->execute();
                                $data = $informacion->fetchAll();
                                echo '<option disabled selected>Seleccione una opción:</option>';
                                foreach($data as $fila):
                                    echo '<option value="'.$fila["ID_Especialidad"].'name="id-especialidad">'.$fila["Nombre"].'</option>';
                                endforeach;
                                ?>
                            </select>
                            </div>
                        <div class="modal-footer pie-pagina">
                                    <button type="submit" class="btn btn-crear">Crear</button>
                                    <button type="Reset" class="btn btn-buscar">Cancelar</button>
                        </div>
                    </form>
                </div>

                            </div>
                        </div>
                     </div>


                   
                
        
        </div>
        <table id="tabla-user">
            <thead>
                <tr>
                    <th class="col">ID_Usuario</th>
                    <th class="col">Nombre</th>
                    <th class="col">Cédula</th>
                    <th class="col">Telefono</th>
                    <th class="col">Email</th>
                    <th class="col">Tipo Usuario</th>
                    <th class="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                  if($_SESSION['tipo'] == 3){
                        $query = "SELECT  u.ID_Usuario, u.Nombre, u.Cedula, u.Edad , u.Email ,u.Telefono ,r.Descripcion FROM `usuario`  as u 
                        INNER JOIN rol_usuario as r ON u.Tipo_Usuario = r.ID_Rol WHERE u.Cedula ='$cedula' AND u.Estado = 1";
                        $bandera = true;

                  }else{
                        $query = "SELECT  u.ID_Usuario, u.Nombre, u.Cedula, u.Edad , u.Email ,u.Telefono ,r.Descripcion FROM `usuario`  as u 
                        INNER JOIN rol_usuario as r ON u.Tipo_Usuario = r.ID_Rol WHERE u.Cedula ='$cedula' AND u.Estado = 1 AND u.tipo_usuario = 3";
                        $consulta = $conexion->query($query);
                        $consulta->execute();
                    if($consulta->rowCount()>0){
                       $bandera = false;
               }else{
                $query = "SELECT  u.ID_Usuario, u.Nombre, u.Cedula, u.Edad , u.Email ,u.Telefono ,r.Descripcion FROM `usuario`  as u 
                INNER JOIN rol_usuario as r ON u.Tipo_Usuario = r.ID_Rol WHERE u.Cedula ='$cedula' AND u.Estado = 1";
                $bandera = true;
               }
                  }
                   
                    $consulta = $conexion->query($query);
                    $consulta->execute();
                    if($bandera == true){
                    while($dato =$consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                    
                    <td data-titulo="ID:" class="col"><?php echo $dato['ID_Usuario']?></td>
                    <td data-titulo="Nombre:" class="col"><?php echo $dato['Nombre']?></td>
                    <td data-titulo="Cédula:" class="col"><?php echo $dato['Cedula']?></td>
                    <td data-titulo="Telefono:" class="col"><?php echo $dato['Telefono'] ?></td>
                    <td data-titulo="Correo:" class="col"><?php echo $dato['Email'] ?></td>
                    <td data-titulo="Tipo Usuario:" class="col"><?php echo $dato['Descripcion']?></td>
                    <td> <?php if($_SESSION['tipo'] == 3){?>
                        <div class="contenido">
                                <button type="button" onclick="llenardatos()" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3" >Editar</button>
                        </div>
                        <div class="contenido">
                            <button typr="button" onclick="deleteusario();" class="btn btn-eliminar"  data-bs-toggle="modal" data-bs-target="#myModal4" >Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php }else{?>
                      Sin Acciones..
            <?php  } 
                } }else{?>
                    <td data-titulo="Usuario" class="col" colspan=7 >Usuario no Encontrado</td> 
            <?php } ?>
            </tbody>
        </table>
        </div>
    </section>

    

    <div class="modal" id="myModal3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body centrear">
                    <form method="POST" action="../logica/update_user.php">
                        <div class="mb-3">
                            <label class="texto">Nombre:</label>
                            <br>
                            <input type="text" class="seleccion icono-placeholder-image" placeholder="Digite el Nombre" name="nombre-user" required>
                        </div>
                        <div class="mb-3">
                            <label class="texto">Cédula:</label>
                            <input type="text" readonly class="icono-cedula" placeholder="Digite la Cédula" name="cedula-user" required>

                        </div>
                        <div class="mb-3">
                            <br>
                            <label class="texto">Correo Electronico:</label>
                            <br>
                            <input type="email" class="seleccion icono-email" placeholder="Digite el Email" name="correo-user" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Debe contener tres cadenas separadas por un @ y un punto" required>
                        </div>
                        <div class="mb-3">
                            <label class="texto">Télefono:</label>
                            <input type="text"  placeholder="Digite su Telefono" name="telefono-user" title="Ingrese un número de 8 Digitos">
                        </div>

                        <div class="mb-3">
                            <br>
                            <label class="texto">Tipo de Usuario:</label>
                            <br>
                            <select id="estado-editar" class="seleccion" name="user-tipo" required>
                            <?php  
                                $informacion = $conexion->prepare("SELECT * from rol_usuario");
                                $informacion->execute();
                                $data = $informacion->fetchAll();
                                echo '<option disabled selected>Seleccione una opción:</option>';
                                foreach($data as $fila):?>
                                   <option value="<?php echo $fila["ID_Rol"]?>"><?php echo $fila["Descripcion"]?></option>
                                <?php endforeach; ?> 

                            </select>
                            <input type="hidden" name="id-usuario">
                        </div>
                        <div class="mb-3">
                            <br>
                            <label class="texto">Especialidad</label>
                            <br>
                            <select required id="especial-editar" class="seleccion" name="especial">
                                <?php  
                                $informacion = $conexion->prepare("SELECT * from Especialidad");
                                $informacion->execute();
                                $data = $informacion->fetchAll();
                                echo '<option disabled selected>Seleccione una opción:</option>';
                                foreach($data as $fila):
                                    echo '<option value="'.$fila["ID_Especialidad"].'name="id-especialidad">'.$fila["Nombre"].'</option>';
                                endforeach;
                                ?>
                            </select>
                            </div>
                        <div class="modal-footer pie-pagina">
                                    <button type="submit" class="btn btn-crear">Guardar</button>
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
                <form method=POST action="../logica/eliminar_user.php">
                <div class="modal-body">
                    <p class="texto">¿Desea eliminar este Usuario?</p>
                    <input type="hidden" name="delete">
                     <div class="modal-footer pie-pagina">
                        <button type="submit" class=" btn btn-buscar">Si</button>
                        <button type="Reset" class="btn btn-crear">No</button>
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
    <script src="../js/infouser.js"></script>

    <script>
                    function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : evt.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                    }

                        $("#estado-crear").change(function(){
                             console.log($("#estado-crear").val());
                            if($("#estado-crear").val() == 4 || $("#estado-crear").val() == 3 ){
                                $('#especial-crear').prop('disabled', 'disabled');
                            }
                            else{
                                $('#especial-crear').prop('disabled', false);
                            }
                        })                        
                        $("#estado-editar").change(function(){
                             console.log($("#estado-editar").val());
                            if($("#estado-editar").val() == 4 || $("#estado-editar").val() == 3 ){
                                $('#especial-editar').prop('disabled', 'disabled');
                            }
                            else{
                                $('#especial-editar').prop('disabled', false);
                            }
                        })                 
    </script>

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

</html>



<?php 
  }
  else{
    header("Location: ../html/gestion_usuario.php?msg=Invalidos");
  }
}
else{
    header("Location: ../html/gestion_usuario.php?msg=Vacios");
}

?>