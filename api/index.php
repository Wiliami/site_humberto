<?php
session_start();
// require_once('./_app/Config.inc.php');
require_once('_app/Config.inc.php');

$route = filter_input(INPUT_GET, 'route', FILTER_DEFAULT);

$location = ($route ? __DIR__ . '/' . $route . '.php' : '');
if(file_exists($location) && !is_dir($location)) {
    require_once($location);
} else {
    $jSon['error']['text'] = 'Rota não encontrada!';
    $jSon['result'] = false;

    echo json_encode($jSon);
    //404
}