<?php

if($_SESSION["login"]["user_level"] >= 6) {
    header('Location: ' . BASE . '/painel/dashboard');
    die();
}

?>