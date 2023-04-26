<?php  include "../logica/verificar_sesion.php";

$tipo_user = $_SESSION['tipo'];


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicio</title>
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
          <li > <?php if($tipo_user == 1 || $tipo_user == 2){?>
            <a href="../html/control_citas.php" >Gestión Citas</a></li>
            <?php } ?>
          <li >
            <a href="../html/gestión_solicitud.php" >Gestión Expediente</a> 
          <li ><?php if($tipo_user == 3){?>
            <a href="../html/gestion_usuario.php" >Gestión Usuario</a>
            <?php }?></li>
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
<br>
<br>
<br>
      <section>
       

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
               <a href="../html/control_citas.html"><img src="../img/gestión-citas.png" class="d-block w-100" alt="Imagen de la Gestión de Citas"></a>
            </div>
            <div class="carousel-item">
              <a href="../html/gestión_solicitud.html"><img src="../img/Gestión- Expediente.png" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
              <a href="../logica/servicios2.php"><img src="../img/Gestión Quimioterapia..png" class="d-block w-100" alt="..."></a>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
        <br>

      <div class= "card text-center fondo" >
    <div class= "card-body">
      <img >
      <H1 class="card-title letras">Instituto Oncológico Nacional</H1>
      <H1><p class="card-text letras">Nuestro Lema: "Por Un Servicio Más Humano"</p></H1>
  <H1>
    <a href="../html/servicios2.php" type="button"  class="btn btn-secondary boton-color letras">Servicios</a>
  <H1>
    </div>
    </div>          
      </section>
      <br>
      <div class="card-group cartas">
        <div class="card">
          <img src="../img/Carrusel/imagen-carrusel3.jpg" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title texto">Nuestra Visión:</h5>
            <p class="card-text texto">Ser líderes en la atención, investigación, prevención y rehabilitacíon del paciente con cáncer en Panamá..</p>
          </div>
        </div>
        <div class="card">
          <img src="../img/hospital.jpeg" class="card-img-top" alt="..." style="height: 130%; width: 120%;"></a>
          <div class="card-body">
            <br>
            <br>
            <br>
            <h5 class="card-title texto">Nuestra Misión:</h5>
            <p class="card-text texto">Ser una institución especializada en la rama de la oncología, cuyo propósito fundamental es brindar una excelente atención médica, social y familiar, a toda la población panameña, con el apoyo de la comunidad; y en la que intervienen directamente un equipo humano altamente calificado y de gran sensibilidad humana.</p>
          </div>
        </div>
        <div class="card">
         <img src="../img/Carrusel/valores.jpg" class="card-img-top" alt="..." style="height:125%; width: 100%;"></a>
          <div class="card-body">
            <br>
            <br>
            <br>
            <h5 class="card-title texto">Nuestro Valores:</h5>
            <p class="card-text texto">
                Servicio, <br>
                Responsabilidad,<br>
                Solidaridad , Fraternidad y Participación <br>
                Respeto<br>
                Honestidad<br>
                Justicia<br>
                Tolerancia <br>
                </p>
          </div>
        </div>
      </div>
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