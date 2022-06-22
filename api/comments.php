<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($action) {
    case 'create';
        $DataCreateComment['user'] = $_SESSION['login']['user_id'];
        $DataCreateComment['aula'] =  $Post['aula'];
        $DataCreateComment['comment_text'] = $Post['comment_user']; 
        $DataCreateComment['comment_status'] = '3';
        $DataCreateComment['comment_create_date'] = date('Y-m-d H:i:s');
        $DataCreateComment['comment_create_user'] = $_SESSION['login']['user_id'];
        $Create = new Create();
        $Create->ExeCreate('comments', $DataCreateComment);
        if($Create->getResult()) {
            $jSon['result'] = $Create->getResult();
            $jSon['error']['text'] = "Comentário publicado com sucesso!";
            $ScriptHtml = 
            "<div class='card comment_{$Create->getResult()}' id='card-comment'> "
                . "<div class='card-header d-flex align-it  ems-center justify-content-between'> "
                    . "<div class='h6' id='username'>{$_SESSION['login']['user_name']}</div>"
                    . "<h5 class='btn btn-success btn-sm'>Aguardando aprovação</h5>"
                . "</div> "
                . "<div class='card-body'> "
                    . "<p class='card-text'>" . str_replace("\n"," ", nl2br($Post['comment_user'], false)) . "</p> "
                    . "<a href='" . BASE . "/' class='btn btn-dark' title='Editar comentário'><i class='fas fa-edit'></i></a> "
                    . "<a href='" . BASE . "/' class='btn btn-dark deleteComment' data-id='{$Create->getResult()}' name='delete_comment' title='Excluir comentário'><i class='fas fa-solid fa-trash'></i></a> "
                . "</div> "
            . "</div> ";
            $jSon['script'] = "
                $('#list_comments').append(\"{$ScriptHtml}\");
                $('#comment_user').val('');
            ";
        } else {
            $jSon['result'] = false;
            $jSon['error']['text'] = $Create->getError();
        }
    break;

    case 'delete_pending':
        $IdComment = (!empty($_POST['comment_id']) ? $_POST['comment_id'] : null);
        $Read = new Read();
        $Read->FullRead("SELECT comment_id FROM comments WHERE comment_id = :id AND comment_status = 3 AND user = :user", "id={$IdComment}&user={$_SESSION['login']['user_id']}");
        if($Read->getResult()) {
            $Delete = new Delete();
            $Delete->ExeDelete("comments", "WHERE comment_id = :id", "id={$IdComment}");
            if($Delete->getResult()) {
                $jSon['result'] = true;
                $jSon['error']['text'] = 'Exclusão realizada com sucesso!';
                $jSon['script'] = "$('.comment_{$IdComment}').remove();";
            } else {
                $jSon['result'] = false;
                $jSon['error']['text'] = 'Não foi possivel excluir!';
            }
        } else {
            $jSon['result'] = false;
            $jSon['error']['text'] = 'Comentário não encontrado!';
        }
        break;
}
echo json_encode($jSon);