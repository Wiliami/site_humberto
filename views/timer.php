<?php 

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = time();
} else if (time() - $_SESSION['login'] > 1800) { // sessão iniciada há mais de 30 minutos
    session_regenerate_id(true); // muda o ID da sessão para o ID corrente e invalidar o ID antigo
    $_SESSION['login'] = time();  // atualiza o tempo de criação da sessão
}


?>