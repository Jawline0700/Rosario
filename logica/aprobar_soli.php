<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include('../conexion/conexion.php');

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.PHP';

if(!empty($_POST)){
    $id = $_POST['id-soli'];
    $estado = 1;
    $correo = $_POST['correo-soli'];
    $data = ['id'=>$id,'estado'=>$estado];
    $sql = "UPDATE solicitud_expediente set Estado=:estado WHERE ID_Solicitud =:id";
    $stmt = $conexion->prepare($sql);
    if($stmt->execute($data)){
    }
    

    $mail = new PHPMailer(true);
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
        $mail->setFrom('RosarioION1936@gmail.com', 'Solicitud Expediente Medico');
        $mail->addAddress($correo);     //Add a recipient
       
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Instituto Oncológico Nacional - Solicitud de Expediente Médico - Rosario ';
        $mail->Body    = 'Su Solicitud de Expediente Médico fue aprobada comuniquese lo mas pronto posible al Insituto Oncologico Nacional.';
    
        $mail->send();
        header("Location: ../html/gestión_solicitud.php?msg=Exito");
    } catch (Exception $e) {
        echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
    }


}
?>