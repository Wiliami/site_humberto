<?php
ob_start();
session_start();
require_once '_app/Config.inc.php';

$getURL = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setURL = (empty($getURL) ? 'index' : $getURL);
$URL  = explode('/', $getURL);
$URL[0] = (!empty($URL[0]) ? $URL[0] : 'index');


$Location = './views/' . implode('/', $URL) . '.php';
if(file_exists($Location) && !is_dir($Location)) {
    require_once($Location);
} else {
    require_once('./views/404.php');
}
ob_end_flush();
?>