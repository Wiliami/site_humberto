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
    case 'admin':
        require_once('./views/admin/admin.php');
        break;
    case 'login':
        require_once('./views/login.php');
        break;
    case 'cadastro':
        require_once('./views/cadastro.php');
        break;
    case 'validate':
        require_once('.views/validateLogin.php');
        break;
    case 'dashboard':
        require_once('./views/dashboard.php');
        break;
    case 'forgot':
        require_once('./views/forgot.php');
        break;
    case 'logout':
        require_once('./views/logout.php');
        break;
    case 'contato':
        require_once('./views/contato.php');
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
    case 'biografia':
        require_once('./views/biografia.php');
        break;
    case 'cursos':
        require_once('./views/cursos.php');
        break;
    case 'pagevideo':
        require_once('./views/pagevideo.php');
        break;
    case 'admin':
        require_once('./views/admin/admin.php');
        break;
    case '404':
        require_once('./views/notFound.php');
        break;
    case 'user-dados':  
        require_once('./views/userData.php');
        break;
    case 'forgot-reset-success':  
        require_once('./views/forgot-reset-sucess.php');
        break;
    case 'forgot-reset':  
        require_once('./views/forgot-reset.php');
        break;
    case 'forgot-sent':  
        require_once('./views/forgot-sent.php');
        break;
}


?>






