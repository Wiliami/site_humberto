<?php 

include("class.phpmailer.php");


    function email($para_email, $para_name, $assunto, $html) {

        $mail2 = new PHPMailer();
        $mail2->isSMTP();

        $mail2->Host       = "mail2example.com";    // SMTP server example
        $mail2->Port       = 587;                    // set the SMTP port for the GMAIL server
        $mail2->SMTPAuth   = true;                  // enable SMTP authentication
        $mail2->Username   = "email";            // SMTP account username example
        $mail2->Password   = "password";
        
        
        

        $mail2->From = "endereco@gmial.com";
        $mail2->FromName = "Alguma frase aqui!";


        $mail2->AddAddress($para_email, $para_name);

        $mail2->Subject = "$assunto";

        $mail2->AltBody = "Uma mensagem bla bla aqui!";

        $mail2->MsgHTML($html);

        if ($mail2->send()) {
            return "1";
        } else {
            return $mail->ErrorInfo;
        }
    
    }
    
    $corpo_email = "<html><body><p>Olá, esse é um teste de envio de e-mail!</p></body></html>";

    email($para_email, $para_name, $assunto, $html); 



?>