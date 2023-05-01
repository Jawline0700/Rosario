<?php 

    include("../logica/verificar_sesion.php");
    include("../conexion/conexion.php");
    $tipo_user = $_SESSION['tipo'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Quimioterapia</title>
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
          <li ><?php if($tipo_user == 3){?>
            <a href="../html/gestion_usuario.php" >Gestión Usuario</a>
            <?php } ?>
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
            <h2 class="subtitulo">Gestión de Quimioterapia</h2>
        <div class="centrear">  
            <div class="buscar-info-container">
                   
                <div class="contenido">

                    <div class="mb-3">
                        <label class="texto">Turno Actual:</label>
                        <br>
                        <input type="text" id="turnoActual" class="seleccion icono-placeholder-image-fila" readonly placeholder="#17">
                    </div>
                    <div class="contenido">
                    <button type="button" class="btn btn-buscar">Crear Cola</button>
                </div>
                </div>
    
        </div>
        <table>
            <thead>
                <tr>
                    <th class="col">Maquina</th>
                    <th class="col">Cédula</th>
                    <th class="col">Enfermera</th>
                    <th class="col">Estado</th>
                    <th class="col">Turno</th>
                    <th class="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sentencia = $conexion->prepare("SELECT ci.ID_Cita, ci.ID_Paciente, co.ID_Maquina, u.Cedula, co.ID_Enfermera, ci.ID_Estado_Cita, ci.Orden FROM cita ci 
                                                RIGHT JOIN cola co ON ci.ID_Paciente=co.ID_Paciente
                                                INNER JOIN paciente p ON ci.ID_Paciente=p.ID_Paciente
                                                INNER JOIN usuario u ON p.ID_User=u.ID_Usuario
                                                WHERE ci.ID_Tipo_Tratamiento = 2 AND ci.Fecha = CURDATE() ORDER BY ci.Orden");
                $sentencia->execute();
                $registro = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                if(count($registro) > 0){
                foreach($registro as $reg){
                ?>
                <tr id='<?php echo $reg['ID_Cita'] ?>'>
                <?php 

                    if($reg['ID_Maquina'] == null){
                        $reg['ID_Maquina'] = "No asignado";
                    }

                    if($reg['ID_Enfermera'] == null){
                        $reg['ID_Enfermera'] = "No asignado";
                    }

                    $estadoCita = "Cancelada";
                    switch($reg['ID_Estado_Cita']){
                        case 1: $estadoCita = 'Realizada';
                                break;
                        case 2: $estadoCita = 'En Proceso';
                                break;
                        case 3: $estadoCita = 'Pendiente';
                                break;
                    }

                ?>
                <td data-titulo="Maquina" class="col"><?php echo $reg['ID_Maquina'] ?></td>
                <td data-titulo="Cédula" class="col"><?php echo $reg['Cedula'] ?></td>
                <td data-titulo="Enf." class="col"><?php echo $reg['ID_Enfermera'] ?></td>
                <td data-titulo="Estado" class="col"><?php echo $estadoCita; ?></td>
                <td data-titulo="Turno" class="col"><?php echo $reg['Orden'] ?></td>
                <td> 
                    <?php if($tipo_user == 2){ ?>
                    <div class="contenido">
                        <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3">Modificar</button>
                    </div>
                    <?php }else{?>
                        Sin Acciones...
                  <?php  } ?>
                </td>
                </tr>
                <?php }} else { ?>
                <td  class="col" colspan=6>No hay citas aún...</td> 
                <?php } ?>
            </tbody>
        </table>
        </div>
    </section>

    <div class="modal" id="myModal3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Actualizar Turno</h5>
                    <button type="button" class="btn-close btn-cerrar" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body centrear">
                    <form>
                        <div class="mb-3">
                            <label class="texto">Maquina:</label>
                            <br>
                            <input type="text" class="seleccion">
                        </div>
                        <div class="mb-3">
                            <label class="texto">Cédula:</label>
                            <input type="text" class="icono-placeholder-image" placeholder="Digite la Cédula">

                        </div>
                        <div class="mb-3">
                            <label class="texto">Enfermera:</label>
                            <br>
                            <select id="Medicos" class="seleccion">
                                <br>
                                <option value="" class="seleccion">Rosa Perez</option>
                                <option value="" class="seleccion">Mariano Gomez</option>
                                <option value="" class="seleccion">Israel </option>
                                <option value="" class="seleccion">Farrah Moan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <br>
                            <label class="texto">Estado:</label>
                            <br>
                            <select id="Tipo de Tratamiento" class="seleccion">
                                <option value="" class="seleccion">En Proceso</option>
                                <option value="" class="seleccion">Finalizado</option>
                                <option value="" class="seleccion">Disponible</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <br>
                            <label class="texto">Turno:</label>
                            <br>
                            <input type="text" class="seleccion icono-placeholder-image-fila" placeholder="#18" readonly>
                           
                        </div>
                    </form>
                </div>
                <div class="modal-footer pie-pagina">
                    <button type="submit" class="btn btn-crear">Modificar</button>
                    <button type="submit" class="btn btn-buscar">Cancelar</button>

                </div>

            </div>
        </div>
     </div>



    <div class="modal" id="myModal4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalizar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p class="texto">¿Desea Finalizar esta Radioterapia?</p>
                  
                    </div>
                    <div class="modal-footer pie-pagina">
                        <button type="submit" class=" btn btn-buscar">Si</button>
                        <button type="submit" class="btn btn-crear">No</button>
                </div>
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
    <a href="gestion_cita.php"><li class="menu-item">Gestión Citas</li></a>
    <a href="https://www.ion.gob.pa/resena-historica/"><li class="menu-item">Sobre Nosotros</li></a>
  </ul>
  <span class="copyright">&copy; 2023, Instituto Oncológico Nacional, Todos los derechos reservados.</span>


</footer>

<?php 
    
    $_SESSION['tratamiento']=4;
    include("../logica/turnos.php"); 
    unset($_SESSION['tratamiento']);
    
  ?>

</html>