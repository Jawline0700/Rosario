<?php
include "../logica/verificar_sesion.php";
include("../logica/verificar_quimio.php");
include("../logica/verificar_radio.php");
$tipo_user =  $_SESSION['tipo'];
if($tipo_user == 4){

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

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../img/Carrusel/imagen-carrusel.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../img/Carrusel/imagen-carrusel2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <a href="https://www.ion.gob.pa/dia-mundial-de-la-salud/"><img src="../img/Carrusel/imagen-carrusel3.jpg" class="d-block w-100" alt="..."></a>
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

      <div class= "card text-center fondo" >
    <div class= "card-body">
      <img >
      <H1 class="card-title letras">Instituto Oncológico Nacional</H1>
      <H1><p class="card-text letras">Nuestro Lema: "Por Un Servicio Más Humano"</p></H1>
  <H1>
    <a href="../html/servicios.php" type="button"  class="btn btn-secondary boton-color letras">Servicios</a>
  <H1>
    </div>
    </div>          
      </section>
      <div class="card-group cartas">
        <div class="card">
          <a href="https://www.ion.gob.pa/plataforma-para-entrega-de-medicamentos/"><img src="../img/Carrusel/medicamentos.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title texto">Entrega de Medicamentos</h5>
            <p class="card-text texto">Si desea conocer más información sobre el proceso de entrega de Medicamento seleccione la imagen </p>
          </div>
        </div>
        <div class="card">
          <a href="https://www.ion.gob.pa/horario-oncobus/"><img src="../img/Carrusel/HORARIOTRANSPORTE.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title texto">Horario de Transporte</h5>
            <p class="card-text texto">Si desea conocer más información sobre el OncoBus seleccione la imagen</p>
          </div>
        </div>
        <div class="card">
          <a href="https://www.ion.gob.pa/dia-mundial-de-la-salud/"><img src="../img/Carrusel/ocupacional3.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title texto">Terapia Ocupacional</h5>
            <p class="card-text texto">!ATENCIÓN!...El cambio empieza desde casa</p>
          </div>
        </div>
      </div>
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
    <a href="pagina_inicio.php"><li class="menu-item">Inicio</li></a>
    <a href="solicitud.php"><li class="menu-item">Solicitud Expediente</li></a>
    <a href="gestion_cita.php"><li class="menu-item">Historial Citas</li></a>
    <a href="https://www.ion.gob.pa/resena-historica/"><li class="menu-item">Sobre Nosotros</li></a>
  </ul>
  <span class="copyright">&copy; 2023, Instituto Oncológico Nacional, Todos los derechos reservados.</span>


</footer>

</html>

<?php 
} else{
  header("Location: ../index.php?msg=1");
  exit();
}

?>