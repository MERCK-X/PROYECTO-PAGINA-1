<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = $_POST['email'];

    $mail = new PHPMailer(true);

    try 
    {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'x'; // EL QUE ENVIA
        $mail->Password   = 'x'; // CONTRASEÑA DEL EL QUE ENVIA
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // o PHPMailer::ENCRYPTION_SMTPS para SSL
    	$mail->Port       = 587; // o 465 para SSL

        $mail->setFrom('x', 'Clem'); // EL QUE ENVIA
        $mail->addAddress($email);

        $mail->Subject = 'Recuperación de Contraseña';
        $mail->Body    = 'Para restablecer tu contraseña, haz clic en el siguiente enlace: <a href="localhost/Proyecto/LOGIN_FORM.php">Restablecer Contraseña</a>';

        $mail->isHTML(true);

        $mail->send();
        echo 'Se ha enviado un correo electrónico a ' . $email . ' con instrucciones para restablecer tu contraseña.';
    } 
    catch (Exception $e) 
    {
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;
    }
}
?>
