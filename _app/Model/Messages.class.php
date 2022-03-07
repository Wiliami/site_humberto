<?php 

class Message {
    private $Result;
    private $Error;


    public function createSendMessagesAndAlerts($Messages) {
        if(empty($Messages['message_text'])) {
            $this->Error = 'Escreva uma mensagem no campo';
            $this->Result = false;
        } else {
        $Create = new Create();
        $Create->ExeCreate("alerts_messages", $Messages);
            if($Create->getResult()) {
                $this->Result = $Create->getResult();
                $this->Error = "A mensagem foi cadastrada com sucesso!";
            } else {
                $this->Result = false;
                $this->Error = $Create->getError();
            }
        }
    }

}
?>