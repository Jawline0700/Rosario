<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.PHP';

include("../conexion/conexion.php");

if(!empty($_POST)){

    $nombre_user = $_POST['nombre-crear'];
    $cedula_crear = $_POST['cedula-crear'];
    $edad_crear = $_POST['edad-crear'];
    $email_crear = $_POST['email-crear'];
    $user_tipo = $_POST['user-tipo'];
    $telefono = $_POST['telefono-crear'];
    $estado = 1;
    mt_srand(time());
    $password1 = mt_rand(10000, 1000000);
    $mail = new PHPMailer(true);

    $verificar = $conexion->query("SELECT * from usuario WHERE Cedula = '$cedula_crear' AND Email= '$email_crear'");
    $registrar = $verificar->fetch(PDO::FETCH_OBJ);

    if($verificar->rowCount() == 0){

        if($user_tipo == 1){

            $stmt = $conexion->prepare("INSERT INTO usuario (Nombre,Cedula,Edad,Email,Password,Telefono,Tipo_Usuario,Estado) values (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre_user);
            $stmt->bindParam(2,$cedula_crear);
            $stmt->bindParam(3,$edad_crear);
            $stmt->bindParam(4,$email_crear);
            $stmt->bindParam(5,$password1);
            $stmt->bindParam(6,$telefono);
            $stmt->bindParam(7,$user_tipo);
            $stmt->bindParam(8,$estado);
            $stmt->execute();
            $especial = $_POST['especial'];
            $id_usuario = $conexion->lastInsertId();
            



            
            $sentencia2 = $conexion->prepare("INSERT INTO Medico(ID_Usuario,ID_Especialidad) values (?,?)");
            $sentencia2->bindParam(1,$id_usuario);
            $sentencia2->bindParam(2,$especial);
            $sentencia2->execute();

            
    try {
        //Server settings
       // $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();        
        $mail->CharSet = 'UTF-8';                                   //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rosario1936ion@gmail.com';                     //SMTP username
        $mail->Password   = 'hgogffhmjdcuoxsz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     
        //Recipients
        $mail->setFrom('RosarioION1936@gmail.com', 'Creación de Usuario');
        $mail->addAddress($email_crear);     //Add a recipient
       
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Instituto Oncológico Nacional - Creación de Usuario - Rosario ';
        $mail->Body    = 'La creación de su usuario se ha realizado con exito 
                          su Contraseña es la siguiente'.$password1;
    
        $mail->send();

    } catch (Exception $e) {
        echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
    }

    header("Location: ../html/gestion_usuario.php?msg=Exito2");

        }
        else if($user_tipo == 2){

            $stmt = $conexion->prepare("INSERT INTO usuario (Nombre,Cedula,Edad,Email,Password,Telefono,Tipo_Usuario,Estado) values (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre_user);
            $stmt->bindParam(2,$cedula_crear);
            $stmt->bindParam(3,$edad_crear);
            $stmt->bindParam(4,$email_crear);
            $stmt->bindParam(5,$password1);
            $stmt->bindParam(6,$telefono);
            $stmt->bindParam(7,$user_tipo);
            $stmt->bindParam(8,$estado);
            $stmt->execute();
            $especial = $_POST['especial'];
            $id_usuario = $conexion->lastInsertId();

            $sentencia2 = $conexion->prepare("INSERT INTO Enfermera(ID_Especialidad,ID_Usuario) values (?,?)");
            $sentencia2->bindParam(1,$especial);
            $sentencia2->bindParam(2,$id_usuario);
            $sentencia2->execute();

    try {
        //Server settings
       // $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();        
        $mail->CharSet = 'UTF-8';                                   //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rosario1936ion@gmail.com';                     //SMTP username
        $mail->Password   = 'hgogffhmjdcuoxsz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     
        //Recipients
        $mail->setFrom('RosarioION1936@gmail.com', 'Creación de Usuario');
        $mail->addAddress($email_crear);     //Add a recipient
       
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Instituto Oncológico Nacional - Creación de Usuario - Rosario ';
        $mail->Body    = 'La creación de su usuario se ha realizado con exito 
                          su Contraseña es la siguiente'.$password1;
    
        $mail->send();

    } catch (Exception $e) {
        echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
    }
    
    header("Location: ../html/gestion_usuario.php?msg=Exito2");

        }
        else if($user_tipo == 3){


            $stmt = $conexion->prepare("INSERT INTO usuario (Nombre,Cedula,Edad,Email,Password,Telefono,Tipo_Usuario,Estado) values (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre_user);
            $stmt->bindParam(2,$cedula_crear);
            $stmt->bindParam(3,$edad_crear);
            $stmt->bindParam(4,$email_crear);
            $stmt->bindParam(5,$password1);
            $stmt->bindParam(6,$telefono);
            $stmt->bindParam(7,$user_tipo);
            $stmt->bindParam(8,$estado);
            $stmt->execute();
            $id_usuario = $conexion->lastInsertId();

            $sentencia2 = $conexion->prepare("INSERT INTO administrador(ID_Usuario) values (?)");
            $sentencia2->bindParam(1,$id_usuario);
            $sentencia2->execute();
            try {
                //Server settings
               // $mail->SMTPDebug = 0;                    //Enable verbose debug output
                $mail->isSMTP();        
                $mail->CharSet = 'UTF-8';                                   //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'rosario1936ion@gmail.com';                     //SMTP username
                $mail->Password   = 'hgogffhmjdcuoxsz';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
             
                //Recipients
                $mail->setFrom('RosarioION1936@gmail.com', 'Creación de Usuario');
                $mail->addAddress($email_crear);     //Add a recipient
               
            
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Instituto Oncológico Nacional - Creación de Usuario - Rosario ';
                $mail->Body    = 'La creación de su usuario se ha realizado con exito 
                                  su Contraseña es la siguiente'.$password1;
            
                $mail->send();
        
            } catch (Exception $e) {
                echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
            }


            header("Location: ../html/gestion_usuario.php?msg=Exito2");



        }
        else if ($user_tipo == 4){

            
            $stmt = $conexion->prepare("INSERT INTO usuario (Nombre,Cedula,Edad,Email,Password,Telefono,Tipo_Usuario,Estado) values (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre_user);
            $stmt->bindParam(2,$cedula_crear);
            $stmt->bindParam(3,$edad_crear);
            $stmt->bindParam(4,$email_crear);
            $stmt->bindParam(5,$password1);
            $stmt->bindParam(6,$telefono);
            $stmt->bindParam(7,$user_tipo);
            $stmt->bindParam(8,$estado);
            $stmt->execute();
            $id_usuario = $conexion->lastInsertId();

            $sentencia2 = $conexion->prepare("INSERT INTO paciente(ID_User) values (?)");
            $sentencia2->bindParam(1,$id_usuario);
            $sentencia2->execute();


            try {
                //Server settings
               // $mail->SMTPDebug = 0;                    //Enable verbose debug output
                $mail->isSMTP();        
                $mail->CharSet = 'UTF-8';                                   //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'rosario1936ion@gmail.com';                     //SMTP username
                $mail->Password   = 'hgogffhmjdcuoxsz';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
             
                //Recipients
                $mail->setFrom('RosarioION1936@gmail.com', 'Creación de Usuario');
                $mail->addAddress($email_crear);     //Add a recipient
               
            
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Instituto Oncológico Nacional - Creación de Usuario - Rosario ';
                $mail->Body    = 'La Creación de su usuario se ha realizado con éxito 
                                  su Contraseña es la siguiente: '.$password1;
            
                $mail->send();
        
            } catch (Exception $e) {
                echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
            }

            header("Location: ../html/gestion_usuario.php?msg=Exito2");
        }

    }
    else{
        header("Location: ../html/gestion_usuario.php?msg=Error2");
    }
}





?>