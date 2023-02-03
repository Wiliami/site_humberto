<?php


$Read = new Read();
$Read->FullRead('SELECT * FROM users');
if($Read->getResult()) {
    foreach($Read->getResult() as $DataUser) {
        ?>
        <a><?= $DataUser['user_name'] ?></a>
    <?php }
    } else {
        die(Error('Lista de usuários não encontrada', 'warning'));
    }
