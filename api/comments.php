<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($action) {
    case 'create';
        $DataCreate['user'] = $_SESSION['login']['user_id'];
        $DataCreate['aula'] = $Post['aula'];
        $DataCreate['comment_text'] = $Post['comment'];
        $Create = new Create();
        $Create->ExeCreate('comments', $DataCreate);
        if($Create->getResult()) {
            $jSon['result'] = $Create->getResult();
            $jSon['error']['text'] = "Comentário publicado com sucesso!";
        } else {
            $jSon['result'] = false;
            $jSon['error']['text'] = $Create->getError();
        }
    break;
}
echo json_encode($jSon);