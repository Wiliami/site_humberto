<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($action) {
    case 'create';
        $DataCreate['user'] = $_SESSION['login']['user_id'];
        $DataCreate['aula'] = $Post['aula_name'];
        $DataCreate['comment'] = $Post['comment'];
        $Create = new Create();
        $Create->ExeCreate('comments', $DataCreate);
        if($Create->getResult()) {
            $this->Result = $Create->getResult();
            $this->Error = "Comentário publicado com sucesso!";
        } else {
            $this->Result = false;
            $this->Error = $Create->getError();
        }
    break;
}