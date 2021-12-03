<?php
$opt = $_GET['opt'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../constants/settings.php';
require '../constants/db_config.php';
require '../constants/uniques.php';

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email");
	$stmt->bindParam(':email', $opt);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
	
	if ($rec == "0") {
	    print '
	 <div class="alert alert-warning">
     No hay ninguna cuenta está asociada con el correo electrónico <strong>'.$opt.'</strong>
	 </div>
     ';
		
	}else{
    foreach($result as $row)
    {
	
    $myfname = $row['first_name'];
	$mylname = $row['last_name'];
	$mymail = $row['email'];
	$full_name = "$myfname $mylname";
	$idt = 'token'.get_rand_numbers(17).'';
    $token = md5($idt);
    $def_link = 'https://marketingalianza.com/vacantes/reset.php?token='.$token.'';

    $stmt = $conn->prepare("DELETE FROM tbl_tokens WHERE email = :email");
	$stmt->bindParam(':email', $opt);
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO tbl_tokens (email, token) VALUES (:email, :token)");
    $stmt->bindParam(':email', $opt);
	$stmt->bindParam(':token', $token);
    $stmt->execute();	

	$message = "¡¡Hola !! <b>$full_name</b>, <br> has click <a href='https://marketingalianza.com/vacantes/reset.php?token=$token'>aquí</a> para restablecer su contraseña.";   
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

                          
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $smtp_host;                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $smtp_user;             //SMTP username
    $mail->Password   = $smtp_pass;                    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( $mymail , $full_name , 'bwirejobs@no-reply');
    $mail->addAddress( $mymail , $full_name);     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Restablecer password';
    $mail->Body    = $message;

    if(!$mail->send()) {
    print '
	 <div class="alert alert-danger">
     Ocurrió un error, contáctanos para obtener más ayuda.
	 </div>
     ';
    } else {
    print '
	 <div class="alert alert-info">
     Se envió un enlace para restablecer su contraseña a'.$mymail.'.
	 </div>
     ';
    }

	
    }
} 


					  
	}catch(PDOException $e)
    {

    }
	


?>
