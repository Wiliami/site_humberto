<?php 

class Message {
    private $Result;
    private $Error;


    public function createSendMessagesAndAlerts($Message) {
        if(empty($Message['message_text'])) {
            $this->Error = 'Campo obrigatório!';
            $this->Result = false;
        } else {
        $Create = new Create();
        $Create->ExeCreate("alerts_messages", $Message);
            if($Create->getResult()) {
                $this->Result = $Create->getResult();
                $this->Error = "A mensagem foi cadastrada com sucesso!";
            } else {
                $this->Result = false;
                $this->Error = $Create->getError();
            }
        }
    }

    public function createCommentLesson($Message) {
        if(empty($Message['comment_text'])) {
            $this->Error = "Campo obrigatório!";
            $this->Result = false;
        } else {
            $Create = new Create();
            $Create->ExeCreate("comments", $Message);
            if($Create->getResult()) {
                $this->Result = $Create->getResult();
                $this->Error = "Comentário enviado com sucesso!";
            } else {
                $this->Result = false;
                $this->Error = $Create->getError();
            }
        }
    }
    

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

}
?>