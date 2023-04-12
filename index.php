<?php
include "conexion/conexion.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/iconos/ION.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilo_login.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <div class="login-container">
        <div class="login-info-container">
            <h1 class="title">Inicio De Sesión</h1>
            <div class="logo-login">
                <div class="logo-elemento">
                    <a href="https://www.presidencia.gob.pa/"><img src="img/logoGob.png" alt="Logo del Gobierno"></a>
                    <span>Gobierno de Panamá</span>
                </div>
                <div class="logo-elemento">
                    <a href="https://www.ion.gob.pa/"><img src="img/LogoION.jpg" alt="Logo de Instituto Oncologico Nacional"></a>
                    <span>Instituto Oncológico Nacional</span>
                </div>
            </div>
        <form action="html/pagina_inicio.php" class="inputs-container">
            <div class="izquierda">
                <label class="texto-login">Número de Cédula</label>   
            </div>
            <div class="centrear">
                <input type="text" placeholder="Digite su Cédula" class="icono-placeholder-image">
            </div>
            <div class="izquierda">
                <label class="texto-login">Contraseña</label>
            </div>
            <div class="centrear">
            <input type="password"  placeholder="Digite su Contraseña" class="icono-placeholder-image2">
            <input type="submit" class="btn" value="Iniciar Sesión" >
            <button class="btn btn-cancelar">Cancelar</button>
            </div>
      
    </form>  
        </div>
        <img class="image-container"src="img/login.svg" alt="Inicio de Sesión">
    </div>
</body>
</html>