<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/Exception.php';
require 'includes/PHPMailer/PHPMailer.php';
require 'includes/PHPMailer/SMTP.php';


$mail = new PHPMailer(true);

try {

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'c0080296.ferozo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'envio@aposgran.org.ar';                     //SMTP username
    $mail->Password   = '3/ZUg7w4lN';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('envio@aposgran.org.ar', 'Aposgran');
    $mail->addAddress('aposgran@bcr.com.ar', 'Comunicacion Aposgran');     //Add a recipient
    //$mail->addAddress('agi.iniguez@gmail.com', 'Comunicacion Aposgran');     //Add a recipient
    //$mail->addReplyTo($email, $nombre);

    //$tipo = $_POST["tipo"];
    $asunto = "Formulario de Inscripcion Seminario Girasol";
    $body = "<strong>Inscripción:</strong><br />";


    $nombre = $_POST["nombre"];
    $domicilioentregar = $_POST["domicilioentregar"];
    $dni = $_POST["dni"];
    $tmovil = $_POST["tmovil"];
    $email = $_POST["email"];
    $recibirinfo = $_POST["recibirinfo"];

    $empresainst = $_POST["empresainst"];
    $cargo = $_POST["cargo"];
    $localidad = $_POST["localidad"];
    $provincia = $_POST["provincia"];
    $pais = $_POST["pais"];
    $cuit = $_POST["cuit"];


    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $body .= "<strong>Nombre y Apellido:</strong> " . $nombre . "<br />";
    $body .= "<strong>Domicilio a entregar:</strong> " . $domicilioentregar . "<br />";
    $body .= "<strong>DNI:</strong> " . $dni . "<br />";
    $body .= "<strong>Telefono Movil:</strong> " . $tmovil . "<br />";
    $body .= "<strong>E-mail:</strong> " . $email . "<br />";
    $body .= "<strong>¿Desea recibir informacion?:</strong> " . $recibirinfo . "<br />";

    $body .= "<strong>Empresa/Institucion:</strong> " . $empresainst . "<br />";
    $body .= "<strong>Cargo:</strong> " . $cargo . "<br />";
    $body .= "<strong>Localidad:</strong> " . $localidad . "<br />";
    $body .= "<strong>Provincia:</strong> " . $provincia . "<br />";
    $body .= "<strong>Pais:</strong> " . $pais . "<br />";
    $body .= "<strong>CUIT:</strong> " . $cuit . "<br />";


    //Content

    $mail->Body = $body; // Mensaje a enviar
    $mail->AltBody = $body;


    $mail->send();
    echo 'enviado';
} catch (Exception $e) {
    echo "No enviado. Mailer Error: {$mail->ErrorInfo}";
}
