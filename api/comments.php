<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($action) {
    case 'create';
        $DataCreate['user'] = $_SESSION['login']['user_id'];
        $DataCreate['aula'] =  $Post[''];
        $DataCreate['comment_text'] =  $Post['comment'];
        $DataCreate['comment_create_date'] = date('Y-m-d H:i:s');
        $DataCreate['comment_create_user'] = $_SESSION['login']['user_id'];
        $DataCreate['comment_aprovacao'] = 'Aguardando aprovação';
        $Create = new Create();
        $Create->ExeCreate('comments', $DataCreate);
        if($Create->getResult()) {
            // Check::var_dump_json($Create->getResult());
            $jSon['result'] = $Create->getResult(); 
            $jSon['error']['text'] = "Comentário publicado com sucesso!";
        } else {
            $jSon['result'] = false;
            $jSon['error']['text'] = $Create->getError();
        }
    break;
}
echo json_encode($jSon);