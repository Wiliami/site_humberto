<?php
session_start();
require_once '_app/Config.inc.php';



function salvaLog($message, $DataLogs) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $hora = date('Y-m-d H:i:s');

    $mensagem = $message;
    //$mensagem = mysql_escape_string($message);

    $DataLogs['log_hora'] = $hora;
    $DataLogs['log_ip'] = $hora;
    $DataLogs['log_mensagem'] = $mensagem;

    $Create = new Create();
    $Create->ExeCreate('logs', $DataLogs);
}



