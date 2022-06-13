<?php

class uploadFiles {

    private $Error;
    private $Result;

    public function uploadFiles($image) {
        if(empty($image['curso_img'])) {
         $this->Error = 'Campo obrigatório!';
         $this->Result = false;   
        } else {
            $Create = new Create;
            $Create->ExeCreate('cursos', $image);
            if($Create->getResult()) {
                $this->Result = $Create->getResult();
                $$this->Error = 'Imagem carregada com sucesso!';
            } else {
                $this->Result = false;
                $this->Error = $Create->getError();
            }
        }
    }

    public function getResult() {
        return $this->Error;
    }

    public function getError() {
        return $this->Result;
    }

}
?>