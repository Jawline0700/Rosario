<?php 
include "../logica/verificar_sesion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio de Radioterapia</title>
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
                  <li><a href="servicio_Radio.php" >Radioterapia </a></li>
                  <li><a href="servicio_Quimio.php" >Quimioterapia</a></li>
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
    <div class="soli-container">
        <div class="soli-info-container">
            <form action="solicitud.html" class="inputs-container">
                <div class="centrear">
                    <label class="texto-login">El turno Actual:</label>
                    <input type="text" placeholder="El Turno Actual #20" class="icono-placeholder-image-fila" readonly >
                </div>
                <div class="centrear">
                    <label class="texto-login">Su turno:</label>
                    <input type="text" placeholder="Su turno es: 18"  class="icono-placeholder-image-fila" readonly>
                </div>
            </form>
        </div>
        </div>

    <div class="card mb-3 " style="max-width: 12000px;">
        <div class="row g-0">
          <div class="col-md-4">
           <a href="../html/servicio_Radio.html"><img src="../img/Radioterapia.png" class="img-fluid rounded-start" alt="Anuncio-Solicitud"></a> 
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title ">Servicio de Radioterapia</h5>
              <p class="card-text texto Izquierda">Si deseas visualizar el turno de Radioterapia en tiempo real , sigue los siguientes pasos:</p>
              <p class="texto Izquierda"> Paso 1: Ingresar al sitio web del ION <br>
                 Paso 2: Una vez dentro del mismo, ubicar la pestaña de Servicios - Radioterapia<br>
                 Paso 3: El sistema te mostrara la posición actual y tu posición asignada <br>
                 Nota: Este servicio solo se puede acceder si usted tiene una cita en Radioterapia</p>
            </div>
          </div>
        </div>
    </div>
</section>
<footer>
    <img src="../img/logoION.png" alt="Logo Hospital ION" style="height:70px" class="logo">
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