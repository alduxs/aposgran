<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/Exception.php';
require 'includes/PHPMailer/PHPMailer.php';
require 'includes/PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $comment = $_POST["mensaje"];
    $asunto = "Mensaje desde la Web - Contacto";

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
    $mail->addReplyTo($email, $nombre);



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $body = "<strong>Nombre y Apellido:</strong> " . $nombre . "<br />";
    $body .= "<strong>E-mail:</strong> " . $email . "<br />";
    $body .= "<strong>Mensaje:</strong> <br />" . $comment . "";
    $mail->Body = $body; // Mensaje a enviar
    $mail->AltBody = $body;


    $mail->send();
    echo 'enviado';
} catch (Exception $e) {
    echo "No enviado. Mailer Error: {$mail->ErrorInfo}";
}