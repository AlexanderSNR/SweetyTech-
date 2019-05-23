<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../public/Librerias/Mail/Exception.php';
require '../public/Librerias/Mail/PHPMailer.php';
require '../public/Librerias/Mail/SMTP.php';

$user= $_GET['user'];
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$template = file_get_contents('../view/Gestion/plantilla_Cambio.php');



try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'zthiven45@gmail.com';                     // SMTP username
    $mail->Password   = 'brayanes98';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('zthiven45@gmail.com');
    $mail->addAddress('zthiven45@gmail.com');     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'REGISTRO CUENTA DULCES MOMENTOS';
    $mail->AddEmbeddedImage($Imagen, '../public/img/logo.png'); 
    $mail->Body = $template;
   
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("location:../view/User/c_clientes.php");