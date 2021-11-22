<?php 

class EmailSend {

    private $Result;
    private $Error;

    function getResult() {
        return $this->Result;
    }

    function getError() {
        return $this->Error;
    }

    function sendEmail(array $dataEmail) {
        /**
         * $dataEmail['userEmail'] = null;
         * $dataEmail['userName'] = null;
         * $dataEmail['title'] = null;
         * $dataEmail['body'] = null;
         */
        try {

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
        
            $mail->Host       = EMAIL_HOST;
            $mail->SMTPAuth   = true; 
            $mail->Username   = EMAIL_USER; 
            $mail->Password   = EMAIL_PASS; 
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
            $mail->Port       = EMAIL_PORT;
        
            //Recipients
            $mail->setFrom(COMPANY_EMAIL, COMPANY_NAME);
            $mail->addAddress($dataEmail['userEmail'], $dataEmail['userName']);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $dataEmail['title'];
            $mail->Body    = $dataEmail['body'];
            $mail->AltBody = $dataEmail['body'];
            
            $mail->send();
            $this->Error = 'E-mail enviado com sucesso!';
            $this->Result = true;
        
        } catch (Exception $e) {
            $this->Error = "E-mail NÃO enviado: {$mail->ErrorInfo}";
            $this->Result = false;
        }
        
    }
}


?>