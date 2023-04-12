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
        <label for="check__menu">
          <i class="fa-solid fa-bars icon__menu"></i>
        </label>
    <nav>
      <ul>
          <li ><a href="../html/pagina_inicio2.php" id="selected"></a></li>
          <li ><a href="../html/control_citas.php" >Gestión Citas</a></li>
          <li ><a href="../html/gestión_solicitud.php" >Gestión Expediente</a></li>
          <li ><a href="../html/gestion_usuario.php" >Gestión Usuario</a></li>
          <li ><a href="../html/servicios2.php" >Servicios</a>
              <ul>
                  <li><a href="../html/gestión_radio.php" > Gestión Radioterapia </a></li>
                  <li><a href="../html/gestión_quimio.php" > Gestión Quimioterapia</a></li>
              </ul>
          </li>
          
          <li ><a href="../index.php" >Cerrar Sesión</a></li>   
      </ul>
  </nav>
</div>     
</div>
    <section class="contenedor-tabla">
        <div class="row tbl-fixed">
            <h2 class="subtitulo">Gestión de Solicitudes</h2>
        <div class="centrear">  
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
                                <form>
                                    <div class="mb-3" >
                                        <input type="text" class="icono-lupa-placeholder-image" placeholder="Digite la Cédula">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer pie-pagina">
                                <button type="submit" class="btn btn-crear">Buscar</button>
                                <button type="submit" class="btn btn-buscar">Cancelar</button>

                            </div>
                        </div>
                    </div>
                 </div>

        
        </div>
        <table>
            <thead>
                <tr>
                    <th class="col">Cédula</th>
                    <th class="col">Nombre</th>
                    <th class="col">Apellido</th>
                    <th class="col">Estado</th>
                    <th class="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-titulo="Cédula" class="col">8-960-165</td>
                    <td data-titulo="Apellido" class="col">Castillo</td>
                    <td data-titulo="Nombre" class="col">Wencers</td>
                    <td data-titulo="Estado" class="col">En Espera</td>
                    <td> 
                        <div class="contenido">
                            <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3">Aprobar</button>
                        </div>
                        <div class="contenido">
                            <button type="button" class="btn btn-eliminar" data-bs-toggle="modal" data-bs-target="#myModal4">Rechazar</button>
                        </div>
                     </td>
                </tr>
                <tr>
                    <td data-titulo="Cédula" class="col">8-123-32</td>
                    <td data-titulo="Apellido" class="col">Rodriguez</td>
                    <td data-titulo="Nombre" class="col">Cristobal</td>
                    <td data-titulo="Estado" class="col">Cancelada</td>
                    <td> 
                            
                        <div class="contenido">
                                <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3" >Editar</button>
                        </div>
                        <div class="contenido">
                            <button typr="button" class="btn btn-eliminar"  data-bs-toggle="modal" data-bs-target="#myModal4" >Eliminar</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-titulo="Cédula" class="col">8-960-165</td>
                    <td data-titulo="Apellido" class="col">Luigi </td>
                    <td data-titulo="Nombre" class="col">Santana</td>
                    <td data-titulo="Estado" class="col">Espera</td>
                    <td> 
                        <div class="contenido">
                                <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3" >Editar</button>
                        </div>
                        <div class="contenido">
                            <button typr="button" class="btn btn-eliminar"  data-bs-toggle="modal" data-bs-target="#myModal4" >Eliminar</button>
                        </div>
                </tr>
                <tr>
                <td data-titulo="Cédula" class="col">8-960-165</td>
                    <td data-titulo="Apellido" class="col">Elianys</td>
                    <td data-titulo="Nombre" class="col">Gonzalez</td>
                    <td data-titulo="Estado" class="col">Espera</td>
                    <td> 
                        <div class="contenido">
                                <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3" >Editar</button>
                        </div>
                        <div class="contenido">
                            <button typr="button" class="btn btn-eliminar"  data-bs-toggle="modal" data-bs-target="#myModal4" >Eliminar</button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td data-titulo="Cédula" class="col">8-960-165</td>
                    <td data-titulo="Apellido" class="col">Luigi </td>
                    <td data-titulo="Nombre" class="col">Santana</td>
                    <td data-titulo="Estado" class="col">Espera</td>
                    <td> 
                        <div class="contenido">
                                <button type="button" class="btn btn-editar" data-bs-toggle="modal" data-bs-target="#myModal3" >Editar</button>
                        </div>
                        <div class="contenido">
                            <button typr="button" class="btn btn-eliminar"  data-bs-toggle="modal" data-bs-target="#myModal4" >Eliminar</button>
                        </div>
                    </td>
                </tr>
                
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
                <div class="modal-body centrear">
                    <p class="texto">¿Desea aprobar esta solicitud de expediente?</p>
                </div>    
                <div class="modal-footer pie-pagina">
                    <button type="submit" class="btn btn-crear">Si</button>
                    <button type="submit" class="btn btn-buscar">No</button>

                </div>

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

                <div class="modal-body">
                    <p class="texto">¿Desea rechazar esta Solicitud de Expediente?</p>
                  
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
    <a href="../html/control_citas.php"><li class="menu-item">Gestión Citas</li></a>
    <a href="https://www.ion.gob.pa/resena-historica/"><li class="menu-item">Sobre Nosotros</li></a>
  </ul>
  <span class="copyright">&copy; 2023, Instituto Oncológico Nacional, Todos los derechos reservados.</span>


</footer>

</html>