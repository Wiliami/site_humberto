<?php

require 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

try {

    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>