<?php


class Comment {

    private $Error;
    private $Result;
    
    public function createCommentLesson($CreateComment) {
        if(empty($CreateComment['comment_user'])) {
            $this->Error = "Campo obrigatório!";
            $this->Result = false;
        } else {
            $CreateComment['comment_create_date'] = date("Y-m-d H:i:s");
            $CreateComment['comment_create_user'] = $_SESSION['login']['user_id'];
            $CreateComment['comment_aprovacao'] = 'Aguardando aprovação';
            $Create = new Create();
            $Create->ExeCreate("comments", $CreateComment);
            if($Create->getResult()) {
                $this->Result = $Create->getResult();
                $this->Error = "Comentário publicado com sucesso!";
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