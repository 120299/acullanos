<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../constants/settings.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
$myfname = ucwords($_POST['fullname']);
$myemail = $_POST['email'];
$mymessage = $_POST['message'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $smtp_host;                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $smtp_user;             //SMTP username
    $mail->Password   = $smtp_pass;                    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( $myemail , $myfname);
    $mail->addAddress($contact_mail);     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contacto desde la pagina web';
    $mail->Body    = 'El correo del usuario ' . $myemail . ', mensaje del usuario; ' . $mymessage ;

    $mail->send();
    header("location:../contact.php?r=5634");
} catch (Exception $e) {
    header("location:../contact.php?r=2974");
}




?>