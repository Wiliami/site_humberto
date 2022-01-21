<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
?>
<div id="wrapper">
    <ul class="nav-list navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar mt-6">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 mw-100 navbar-search">
            <div class="input-group">
                <div class="container">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div>
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT * FROM cursos LIMIT 1");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Cursos) {
                                    ?>
                            <span class="font-weight-bold text-white"><?= $Cursos['curso_titulo'] ?></span>
                            <div class="small text-gray-500">1 de 24 aulas completas</div>
                        </div>
                    </div>
                            <?php
                                }
                            } else {
                                Error("Nenhum título de curso!");
                            }
                            ?>
                </div>
                <input type="text" class="form-control bg-light border-0 small rounded-left" name="pesquisar"
                    placeholder="Pesquisar por aulas" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- divisor -->
        <hr class="sidebar-divider my-0">
        <!-- Consulta no banco de dados -->
        <li class="nav-item">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT m.*, a.aula_name FROM modulos m LEFT JOIN aulas a ON a.aula_id LIMIT 3");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Modulos) {
                    ?>
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapse<?= $Modulos['aula_id'] ?>" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <!-- Nome do módulo -->
                <span><?= $Modulos['modulo_name'] ?></span>
            </a>
            <div id="collapse<?= $Modulos['aula_id'] ?>" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- Nome da aula -->
                    <a class="collapse-item" href="<?= BASE ?>/"><?= $Modulos['aula_name'] ?></a>
                </div>
            </div>
            <?php 
                }
            } else {
                Error("Ainda não existe nenhum módulo cadastrado!");
            }
            ?>
        </li>
        <?= $Component->getMenuDashboard(); ?>
        <header
            class="navbar bg-success shadow d-flex align-items-center justify-content-center justify-content-md-between topbar mb-0">
            <ul class="header1" style="list-style: none;">
                <li>
                    <a href="<?= BASE ?>/painel/aulas/nome-da-aula-anterior" class="small text-gray-200"
                        title="Voltar a aula anterior">
                        <div class="fw-normal text-white-50 mb-1">Anterior</div>
                        <i class="fas fa-arrow-circle-left mr-2 text-gray-200"></i>
                        <span>Aula anterior</span>
                    </a>
                </li>
            </ul>
            <div class="topbar-divider d-none d-sm-block"></div>
            <ul class="header2" style="list-style: none;">
                <li>
                    <a href="<?= BASE ?>/painel/aulas/nome-da-proxima-aula" class="small text-gray-200"
                        title="Ir para a próxima aula">
                        <div class="fw-normal text-white-50 mb-1">Próxima</div>
                        <i class="fas fa-arrow-circle-right mr-2 text-gray-200"></i>
                        <span>Próxima aula</span>
                    </a>
                </li>
            </ul>
        </header>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207"
                allowfullscreen></iframe>
        </div>
        <!-- Conteúdo ou informações referente a aula -->
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                <h1 class="h3 mb-0 text-gray-600">Material de apoio</h1>
            </div>
            <p class="h3 mb-0 text-gray-400">Como descrever uma metodologia de um curso?</p>
            <p>Metodologia significa “caminho ou via para a realização de algo”. Ou seja, é o processo utilizado
                para chegar a algum conhecimento. Metodologia é também o estudo das melhores formas de pesquisa para
                cada área do conhecimento.
            </p>
        </div>
        <?= $Component->getFooterDashboard(); ?>