<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$courseId = 1;

switch ($action) {
    case 'create';
        $DataCreateComment['user'] = $_SESSION['login']['user_id'];
        $DataCreateComment['aula'] =  $courseId;
        $DataCreateComment['comment_text'] = $Post['comment'];
        $DataCreateComment['comment_aprovacao'] = 'Aguardando aprovação';
        $DataCreateComment['comment_create_date'] = date('Y-m-d H:i:s');
        $DataCreateComment['comment_create_user'] = $_SESSION['login']['user_id'];
        $Create = new Create();
        $Create->ExeCreate('comments', $DataCreateComment);
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