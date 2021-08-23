<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

if (empty($_POST["Correo"]) || empty($_POST["Nombre"]) || empty($_POST["Consulta"])) {
    header("Location:Form.html");
}

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                       
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '';                     
    $mail->Password   = '';                                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          
    $mail->Port       = 587;                                  

    //Recipients
    $mail->setFrom($_POST['Correo'], $_POST['Nombre']);
    $mail->addAddress('');     

    // Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Travel Exp Consulta';
    $mail->Body    = $_POST['Consulta'];
    $mail->send();
} catch (Exception $e) {
    echo header("Location:Form.html");
}

?>