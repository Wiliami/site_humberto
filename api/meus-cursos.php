<?php
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$userId = $_SESSION['login']['user_id'];

$Query = null;
$Parse = null;

switch ($action) {
    case 'read':
        if(!empty($Post['filter'])) {
            $Query = " AND curso_titulo LIKE :title";
            $Parse = "&title=%{$Post['filter']}%";
        }

        $Read = new Read();
        $Read->FullRead('SELECT m.*, c.curso_titulo, c.curso_descricao, c.curso_img 
            FROM matriculas_cursos m
            LEFT JOIN users u ON u.user_id = m.user_id 
            LEFT JOIN cursos c ON c.curso_id = m.curso_id 
            WHERE user_id = :ui{$Query}', "ui={$userId}ui={$Parse}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Search) {
                $jSon['result'] = true;
                $jSon['script'] = "$('.filter').('')";
            }
        } else {
            $jSon['result'] = false;
            $jSon['error']['text'] = 'Nenhuma correspondência foi encontrada!';
        }
    break;

}
echo json_encode($jSon);