<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($action) {
    case 'create';
        $post['comment'] = $comment;
        $Create = new Create();
        $Create->ExeCreate('comment', $post['comment']);
        if($Create->getResult()) {
            $this->Result = $Create->getResult();
            $this->Error = "Comentário publicado com sucesso!";
        } else {
            $this->Result = false;
            $this->Error = $Create->getError();
        }

    break;
}