<?php
 
    //finalizando a sessão do usuário
    session_start();
    session_destroy();

    header('Location: ' . BASE . '/login');

?>