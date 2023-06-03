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
    <title>Gestión de Radioterapia</title>
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
                    <li ><a href="../html/control_citas.php" >Gestión Citas</a></li></li>
                    <li ><a href="../html/gestión_solicitud.php" >Gestión Expediente</a></li>
                    <li ><a href="../html/gestion_usuario.php" >Gestión Usuario</a></li>
                    <li >
                        <a href="../html/servicios2.php" >Servicios</a>
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
            <h2 class="subtitulo">Gestión de Radioterapia</h2>
            <div class="centrear">  
                <div class="buscar-info-container">
                    <div class="contenido">
                        <div class="mb-3">
                            <label class="texto">Turno Actual:</label>
                            <br>
                            <input type="text" id="turnoActual" style="width: 170%; margin-left: -35%;" class="seleccion icono-placeholder-image-fila" readonly placeholder="#17">
                        </div>
                    </div>
                </div>
                <table id="tabla-citas">
                    <thead>
                        <tr>
                            <th class="col" style="display: none;">ID_Cita</th>
                            <th class="col">Maquina</th>
                            <th class="col">Cédula</th>
                            <th class="col">Personal Medico</th>
                            <th class="col">Estado</th>
                            <th class="col">Turno</th>
                            <th class="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sentencia = $conexion->prepare("SELECT ci.ID_Cita, ci.ID_Maquina, pac.Cedula, med.Nombre, ci.ID_Estado_Cita, ci.Orden 
                                                            FROM cita ci 
                                                            JOIN usuario pac ON ci.ID_Paciente = pac.ID_Usuario 
                                                            JOIN usuario med on ci.ID_Medico = med.ID_Usuario 
                                                            WHERE ci.ID_Tipo_Tratamiento = 3 AND ci.Fecha = CURDATE() AND ci.ID_Estado_Cita = 2
                                                            ORDER BY Orden ASC");
                        $sentencia->execute();
                        $registro1 = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                        $sentencia2 = $conexion->prepare("SELECT ci.ID_Cita, ci.ID_Maquina, pac.Cedula, med.Nombre, ci.ID_Estado_Cita, ci.Orden 
                                                            FROM cita ci 
                                                            JOIN usuario pac ON ci.ID_Paciente = pac.ID_Usuario 
                                                            JOIN usuario med on ci.ID_Medico = med.ID_Usuario 
                                                            WHERE ci.ID_Tipo_Tratamiento = 3 AND ci.Fecha = CURDATE()
                                                                AND ci.ID_Estado_Cita BETWEEN 1 AND 4 AND ci.ID_Estado_Cita != 2
                                                            ORDER BY FIELD(ci.ID_Estado_Cita, 3, 1, 4), Orden ASC");
                        $sentencia2->execute();
                        $registro2 = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
                        $registro = array_merge($registro1, $registro2); ?>
                        
                        <?php 
                        if(count($registro) > 0){
                            foreach($registro as $reg){
                        
                                if($reg['ID_Maquina'] == null){
                                    $reg['ID_Maquina'] = "No asignada";
                                }

                                if($reg['ID_Medico'] == null){
                                    $reg['ID_Medico'] = "No asignado";
                                }

                                $estadoCita = "Cancelada";
                                $colorEstadoCita = "bg-danger";
                                switch($reg['ID_Estado_Cita']){
                                    case 1: $estadoCita = 'Realizada';
                                            $colorEstadoCita = "bg-primary";
                                            break;
                                    case 2: $estadoCita = 'En Proceso';
                                            $colorEstadoCita = "bg-success";
                                            break;
                                    case 3: $estadoCita = 'Pendiente';
                                            $colorEstadoCita = "bg-warning";
                                            break;
                                }
                        ?>
                        <tr>
                            <td data-titulo="ID_Cita" class="col" style="display: none;"><?php echo $reg['ID_Cita'] ?></td>
                            <td data-titulo="Maquina" class="col"><?php echo $reg['ID_Maquina'] ?></td>
                            <td data-titulo="Cédula" class="col"><?php echo $reg['Cedula'] ?></td>
                            <td data-titulo="P.Medico" class="col"><?php echo $reg['Nombre'] ?></td>
                            <td data-titulo="Estado" class="semaforo col d-flex m-0 justify-content-space-between align-items-center"><p class="nombreEstado"><?php echo $estadoCita; ?></p><p class="colorEstado rounded-circle <?php echo $colorEstadoCita ?>"></p></td>
                            <td data-titulo="Turno" class="col"><?php echo $reg['Orden'] ?></td>
                            <td> 
                                <?php if($tipo_user == 2){ ?>
                                    <div class="contenido">
                                        <button type="button" class="btn btn-editar" onclick="MappearCita()" data-bs-toggle="modal" data-bs-target="#myModal3">Modificar</button>
                                    </div>
                                <?php } else {?>
                                    Sin Acciones...
                                <?php } ?>
                            </td>
                        </tr>
                        <?php }} else { ?>
                            <td  class="col" colspan=6>No hay citas aún...</td> 
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
                    <form method="POST" action="../logica/update_cita.php">
                        <input type="text" style="display: none;" name="id-cita" id="id-cita">
                        <div class="mb-3">
                            <label class="texto">Maquina:</label>
                            <br/>
                            <select id="selectMaquina" name="selectMaquina" class="seleccion" required>
                                <?php 
                                $info = $conexion->prepare("SELECT ID_Maquina
                                                            FROM maquina 
                                                            WHERE Tipo = 1 AND Estado = 1 AND NOT EXISTS 
                                                                (SELECT 1 
                                                                FROM cita 
                                                                WHERE cita.ID_Maquina = maquina.ID_Maquina AND
                                                                        fecha = CURDATE() AND ID_Tipo_Tratamiento = 3 AND ID_Estado_Cita = 2)");
                                $info->execute();
                                $data = $info->fetchAll();
                                echo '<option value="null" selected>Ninguna</option>';
                                $estado = "Disponible";
                                foreach($data as $fila): ?>
                                    <option value=<?php echo $fila["ID_Maquina"]?>><?php echo $fila["ID_Maquina"] ?></option>
                                <?php endforeach ?>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label class="texto">Cédula:</label>
                            <input type="text" id="cedula-cita" name="cedula-cita" class="icono-placeholder-image" disabled >
                        </div>
                        <div class="mb-3">
                            <label class="texto">Personal Médico:</label>
                            <br>
                            <select id="selectPersonalMedico" name="selectPersonalMedico" class="seleccion">
                            <?php  
                                $info = $conexion->prepare("SELECT ID_Usuario, Nombre FROM usuario WHERE Tipo_Usuario = 1 OR Tipo_Usuario = 2"); 
                                $info->execute();
                                $data = $info->fetchAll(); ?>
                                <option disabled >Seleccione una opción:</option>
                                <?php foreach($data as $fila): ?>
                                    <option value=<?php echo $fila["ID_Usuario"] ?>><?php echo $fila["Nombre"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="texto">Estado:</label>
                            <br>
                            <select id="selectEstado" name="selectEstado" class="seleccion">
                            <?php 
                                $info = $conexion->prepare("SELECT * FROM Estado");
                                $info->execute();
                                $data = $info->fetchAll();
                                foreach($data as $fila): ?>
                                    <option value=<?php echo $fila["ID_Estado"] ?>><?php echo $fila["Estado"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="texto">Turno:</label>
                            <br>
                            <input type="text" id="turno-cita" name="turno-cita" class="seleccion icono-placeholder-image-fila" readonly disabled>
                        </div><br/>
                        <div class="modal-footer pie-pagina">
                            <button type="submit" class="btn btn-crear">Modificar</button>
                            <button type="reset" class="btn btn-buscar">Cancelar</button>
                        </div>
                        <input type="hidden" name="gestion" value="1" />
                        <!-- gestion: 1=Radio, 2=Quimio, 3=Pacientes -->
                    </form>
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

    <script src='../js/gestionServicios.js'> </script>

    <footer style="margin-top: 100px">
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

    <?php 
        
        $_SESSION['tratamiento'] = 3; 
        include("../logica/turnos.php"); 
        unset($_SESSION['tratamiento']);
        
    ?>
</body>
</html>