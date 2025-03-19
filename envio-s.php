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

    $tipo = $_POST["tipo"];
    $asunto = "Formulario de Inscripcion";
    $body = "<strong>Tipo de Inscripción:</strong> " . $tipo . "<br />";

    if ($tipo == "Individuo") {

        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $fnacimiento = $_POST["fnacimiento"];
        $cuit = $_POST["cuit"];
        $domicilioentregar = $_POST["domicilioentregar"];
        $localidad = $_POST["localidad"];
        $provincia = $_POST["provincia"];
        $cp = $_POST["cp"];
        $tfijo = $_POST["tfijo"];
        $tmovil = $_POST["tmovil"];
        $email = $_POST["email"];


        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $body .= "<strong>Nombre y Apellido:</strong> " . $nombre . "<br />";
        $body .= "<strong>DNI:</strong> " . $dni . "<br />";
        $body .= "<strong>Fecha de Nacimiento:</strong> " . $fnacimiento . "<br />";
        $body .= "<strong>CUIT:</strong> " . $cuit . "<br />";
        $body .= "<strong>Domicilio a entregar:</strong> " . $domicilioentregar . "<br />";
        $body .= "<strong>Localidad:</strong> " . $localidad . "<br />";
        $body .= "<strong>Provincia:</strong> " . $provincia . "<br />";
        $body .= "<strong>Codigo Postal:</strong> " . $cp . "<br />";
        $body .= "<strong>Telefono Fijo:</strong> " . $tfijo . "<br />";
        $body .= "<strong>Telefono Movil:</strong> " . $tmovil . "<br />";
        $body .= "<strong>E-mail:</strong> " . $email . "<br />";

    } else if ($tipo == "Empresa") {

        $nombre = $_POST["enombre"];
        $efecha = $_POST["efecha"];
        $eactividad = $_POST["eactividad"];
        $edireccion = $_POST["edireccion"];
        $elocalidad = $_POST["elocalidad"];
        $eprovincia = $_POST["eprovincia"];
        $ecp = $_POST["ecp"];
        $etfijo = $_POST["etfijo"];
        $email = $_POST["eemail"];
        $eiva = $_POST["iva"];
        $cuit = $_POST["ecuit"];


        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $body .= "<strong>Nombre o Razon Social:</strong> " . $nombre . "<br />";
        $body .= "<strong>Fecha de constitucion:</strong> " . $efecha . "<br />";
        $body .= "<strong>Actividad:</strong> " . $eactividad . "<br />";
        $body .= "<strong>Direccion:</strong> " . $edireccion . "<br />";
        $body .= "<strong>Localidad:</strong> " . $elocalidad . "<br />";
        $body .= "<strong>Provincia:</strong> " . $eprovincia . "<br />";
        $body .= "<strong>Codigo Postal:</strong> " . $ecp . "<br />";
        $body .= "<strong>Telefono Fijo:</strong> " . $etfijo . "<br />";
        $body .= "<strong>E-mail:</strong> " . $email . "<br />";
        $body .= "<strong>Categoría IVA:</strong> " . $eiva . "<br />";
        $body .= "<strong>CUIT:</strong> " . $cuit . "<br />";
    }
    $conoc = $_POST["conoc"];
    $body .= "<strong>¿Como nos conocio?:</strong> " . $conoc . "";



    //Content
  
    $mail->Body = $body; // Mensaje a enviar
    $mail->AltBody = $body;


    $mail->send();
    echo 'enviado';
} catch (Exception $e) {
    echo "No enviado. Mailer Error: {$mail->ErrorInfo}";
}