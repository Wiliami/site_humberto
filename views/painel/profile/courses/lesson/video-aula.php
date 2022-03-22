<?php
 $User = new User();
 $User->verifyExistLoginUser();
 $Component = new Component();
 echo $Component->getBlockPageProfile();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE ?>/src/css/lesson.css">
</head>

    <?= $Component->getHeadHtmlDashboard(); ?>
  
    <div class="container">
        <!-- The model -->
        <div class="container__model">
    
            For the first row: display the model name (Basic, Pro, etc.)
            From the second row: display a yes/no icon indicating the feature is available or not

        </div>
                    <!-- Feature name -->
        <div class="container__feature">
        <header class="navbar navbar-expand bg-dark static-top shadow d-flex align-items-center justify-content-center justify-content-md-between">
                    <ul class="header1" style="list-style: none;">
                        <li>
                            <a href="<?= BASE ?>/painel/aulas/nome-da-aula-anterior" class="small text-gray-200">
                                <div class="fw-normal text-white-50 mb-1">Anterior</div>
                                <i class="fas fa-arrow-circle-left mr-2 text-gray-200"></i>
                                <span>Título da aula anterior</span>
                            </a>
                        </li>
                    </ul>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <ul class="header2" style="list-style: none;">
                        <li>
                            <a href="<?= BASE ?>/painel/aulas/nome-da-proxima-aula" class="small text-gray-200">
                                <div class="fw-normal text-white-50 mb-1">Próxima</div>
                                <span>Título da próxima aula</span>
                                <i class="fas fa-arrow-circle-right mr-2 text-gray-200"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207"
                        allowfullscreen>
                    </iframe>
                </div>
        </div>
    </div>

    <?= $Component->getFooterDashboard(); ?>