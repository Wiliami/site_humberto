<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
// echo $Component->getHeadHtmlDashboard();
// echo $Component->getSideBarDashboard();
// echo $Component->getLiAdministrativoDashboard();
// echo $Component->getLiCoursesDashboard();
// echo $Component->getLiPagesDashboard();
// echo $Component->getMenuDashboard();

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/src/css/details.css">
        <title>Projeto Player Spotify</title>
    </head>
    <body>
    <div></div>
    <img src="imagens/rock.jpg">
    <div class="descricao">
        <h2>Nome da música</h2>
        <i>Nome</i>
    </div>
    <div class="duracao">
        <div class="barra">
            <progress value="3" max="1"></progress>
            <div class="ponto"></div>
        </div>
        <div class="tempo">
            <p class="inicio">0:00</p>
            <p class="fim">3:40</p>
        </div>
    </div>
    <div class="player">
        <i class="fas fa-step-backward setas anterior"></i>
        <i class="fas fa-play-circle botao-play"></i>
        <i class="fas fa-pause-circle botao-pause"></i>
        <i class="fas fa-step-forward setas proximo"></i>
    </div>
    <audio src="musicas/We Ride! - Reed Mathis.mp3"></audio>