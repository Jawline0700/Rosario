<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


include('../conexion/conexion.php');
include("verificar_solicitud.php");

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.PHP';

if(isset($_POST['cedula'])){

    $cedula = $_POST['cedula'];
    $idpaciente = $_POST['ID-Paciente'];
    $estado = 1;
    $consulta = $conexion->query("SELECT Email from usuario WHERE Cedula = '$cedula'and Tipo_Usuario = 4;");
    $row  = $consulta->fetch(PDO::FETCH_OBJ);

    if($consulta->rowCount()>0){

    $correo = $row->Email;
    
    $retorno = $conexion->query("SELECT Expendiente_Entregado from solicitud_expediente as
                                s inner Join paciente as p ON s.ID_Paciente = p.ID_Paciente 
                                INNER JOIN usuario as u On u.ID_Usuario = p.ID_User 
                                WHERE p.ID_Paciente = '$idpaciente';" );

    $row = $retorno->fetch(PDO::FETCH_OBJ);

if($retorno->rowCount() == 0){
         
    $mail = new PHPMailer(true);
    $insercion = $conexion->prepare("INSERT INTO solicitud_expediente (ID_Paciente,Expendiente_Entregado) values (?,?)");
    $insercion->bindParam(1, $idpaciente);
    $insercion->bindParam(2, $estado);
    $insercion->execute();

    try {
        //Server settings
       // $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                                           //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rosario1936ion@gmail.com';                     //SMTP username
        $mail->Password   = 'hgogffhmjdcuoxsz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     
        //Recipients
        $mail->setFrom('RosarioION1936@gmail.com', 'Solicitud Expediente Medico');
        $mail->addAddress($correo, 'Joe User');     //Add a recipient
       
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Instituto Oncológico Nacional - Solicitud de Expediente Médico - Rosario ';
        $mail->Body    = 'Su Solicitud de Expediente Medico sera procesada, revise periodicamente su correo 
                          ya que sera notificado por este medio cuando este disponible su expediente medico, 
                         para que sea retirado de manera presencial.';
    
        $mail->send();
       header("Location: ../html/solicitud.php?msg= Su Solicitud se envio con éxito.");
    } catch (Exception $e) {
        echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
    }


}

else{
    header("Location: ../html/solicitud.php?msg= Usted ya solicito su Expediente Médico");
}
   
    }
    else{
      header("Location: ../html/solicitud.php?msg= Ingrese un Correo Valido");
    }


    

}
else{
 echo ("No entro");
}






?>