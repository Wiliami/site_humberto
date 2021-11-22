<?php

session_start();
require_once '_app/Config.inc.php';

$getURL = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setURL = (empty($getURL) ? 'index' : $getURL);
$URL  = explode('/', $getURL);
$URL[0] = (!empty($URL[0]) ? $URL[0] : 'index');


switch ($URL[0]) {
    case 'index':
        require_once('./views/index.php');
        break;
    case 'login':
        require_once('./views/login.php');
        break;
    case 'cadastro':
        require_once('./views/cadastro.php');
        break;
    case 'dashboard':
        require_once('./views/dashboard.php');
        break;
    case 'reset-password':
        require_once('./views/reset-password.php');
        break;
    case 'logout':
        require_once('./views/logout.php');
        break;
    case 'sobre':
        require_once('./views/sobre.php');
        break;  
    case 'conteudo':
        require_once('./views/conteudo.php');
        break;
    case 'unitbrasil':
        require_once('./views/unitbrasil.php');
        break;
    case 'page-profile':
        require_once('./views/pege-profile.php');
        break;
    case 'cursos':
        require_once('./views/cursos.php');
        break;
    case 'page-video':
        require_once('./views/pagevideo.php');
        break;
    case '404':
        require_once('./views/not-found.php');
        break;
    case 'profile':  
        require_once('./views/profile.php');
        break;
    case 'reset-password-success':  
        require_once('./views/reset-password-success.php');
        break;
    case 'forgot-sent':  
        require_once('./views/forgot-sent.php');
        break;
    case 'verifica':
        require_once('./views/verifica_tipo.php');
        break;
    case 'forgot-password':
        require_once('./views/forgot-password.php');
        break;
}



if ($URL != [0]) {

    // $Component = new Component();
    // echo $Component->get_not_found_error_404();
    // exit();
    echo 'Página nao encontrada!';
    die();

}


?>






