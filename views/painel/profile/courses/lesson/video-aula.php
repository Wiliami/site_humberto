<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard(); 
echo $Component->getMenuDashboard();
?>
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
    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
</div>
<?= $Component->getFooterDashboard(); ?>