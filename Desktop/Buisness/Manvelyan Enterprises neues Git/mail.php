<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$phone = $_POST['phone'];



// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail2 = new PHPMAILER(true);

try {

    //Recipients
    $mail->setFrom('info@manvelyan-ent.de', 'Manvelyan Enterprises');
    $mail2->setFrom($email, $name);

    $mail->addAddress($email, $name);     // Add a recipient
    $mail2->addAddress('info@manvelyan-ent.de','Manvelyan Enterprises');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Anfragen über manvelyan-ent.de';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>' . $message;


    $mail2->isHTML(true);
    $mail2->Subject = 'Anfragen über manvelyan-ent.de';
    $mail2->Body = $message;


    $mail->send();
    $mail2->send();
    echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>

