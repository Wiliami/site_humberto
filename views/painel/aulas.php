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
            <div class="container-fluid">
            <?php 
            $Read = new Read();
            $Read->FullRead("SELECT * FROM cursos LIMIT 1");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Cursos) {
                    ?>
                <div class="d-sm-flex align-items-center justify-content-between mb-4 d-block">
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"><?= $Cursos['curso_titulo'] ?></h1>
                        </div>
                        <p>24 aulas</p>
                    </div>
            <?php
                }
            } else {
                Error("Nenhum título de curso existe!");
            }
            ?>
                </div>
            </div>
                <input type="text" class="form-control bg-light border-0 small" name="pesquisar" placeholder="Pesquisar aulas..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> 
    <!-- divisor -->
    <hr class="sidebar-divider my-0"> 
    <?php 
    $Read->FullRead("SELECT m.*, c.curso_descricao 
            FROM modulos m 
            LEFT JOIN cursos c ON c.curso_id = c.curso_titulo");
    if($Read->getResult()) {
    foreach($Read->getResult() as $Modulos) {
        ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= BASE ?>#" data-toggle="collapse" data-target="#collapse<?= $Modulos['modulo_id'] ?>" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Nome seção</span>
        </a>
        <div id="collapse<?= $Modulos['modulo_id'] ?>" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE ?>/">Aula nome</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">
    <?php
        }
    } else {
        Error("Ainda não existem cursos nesta plataforma!");
    }   
        ?>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    </ul>  
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Pequisar aulas..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alertas
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">05 de Janeiro de 2022</div>
                                    <span class="font-weight-bold">O curso sobre finanças acaba de ser lançado!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">02 de Janeiro de 2022</div>
                                    Novos cursos serão lançados a qualquer momento.
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">07 de Janeiro de 2022</div>
                                    Curso sobre coaching será lançado em breve!!!
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas as alertas</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Mensagens
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">4 cursos estão sob análise.</div>
                                    <div class="small text-gray-500">Emily Gonçalves · 58 minutos atrás</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Curso sobre gestão financeiro já está disponível com mais de 12 módulos.</div>
                                    <div class="small text-gray-500">Carlos André · Há um dia</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Foram vendidos 2 cursos nesta semana</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2 dias atrás</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                        alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Cursos sobre finanças foram os que tiveram maior acesso pelo usuários nesta semana.</div>
                                    <div class="small text-gray-500">Alerta do sistema · 2 minutos atrás</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Leia mais mensagens</a>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Seja bem-vindo(a),  <?= $_SESSION['login']['user_name'] ?></span>
                            <img class="img-profile rounded-circle" src="<?= BASE ?>/src/images/undraw_profile.svg">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/profile-user">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Meus dados
                            </a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/meus-cursos">
                                <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                                Meus cursos
                            </a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/help">
                                <i class="fas fa-question fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ajuda
                            </a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/suporte">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Suporte
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= BASE ?>/logout" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Sair
                            </a>   
                        </div>
                    </li>
                </ul>
            </nav>
            <header class="navbar bg-success shadow d-flex align-items-center justify-content-center justify-content-md-between topbar mb-0">
                <ul class="header1" style="list-style: none;">
                    <li>
                        <a href="<?= BASE ?>/painel/aulas/nome-da-aula-anterior" class="small text-gray-200" title="Voltar a aula anterior">
                            <div class="fw-normal text-white-50 mb-1">Anterior</div>
                            <i class="fas fa-arrow-circle-left mr-2 text-gray-200"></i>
                            <span>Aula anterior</span>
                        </a>
                    </li>
                </ul>
                <div class="topbar-divider d-none d-sm-block"></div>
                <ul class="header2" style="list-style: none;">  
                    <li>  
                        <a href="<?= BASE ?>/painel/aulas/nome-da-proxima-aula" class="small text-gray-200" title="Ir para a próxima aula">
                            <div class="fw-normal text-white-50 mb-1">Próxima</div>
                            <i class="fas fa-arrow-circle-right mr-2 text-gray-200"></i>
                            <span>Próxima aula</span>
                        </a>
                    </li>
                </ul>     
            </header>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
            </div>


            <!-- Conteúdo ou informações referente a aula -->
            <div class="containxer-fluid">
                <!-- ***Page Heading*** -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-600">Material de apoio</h1>
                </div>
                    <p class="h3 mb-0 text-gray-400">Como descrever uma metodologia de um curso?</p>
                    <p>Metodologia significa “caminho ou via para a realização de algo”. Ou seja, é o processo utilizado para chegar a algum conhecimento. Metodologia é também o estudo das melhores formas de pesquisa para cada área do conhecimento.</p>
                    <p>Metodologia significa “caminho ou via para a realização de algo”. Ou seja, é o processo utilizado para chegar a algum conhecimento. Metodologia é também o estudo das melhores formas de pesquisa para cada área do conhecimento.</p>
            </div> 
<?= $Component->getFooterDashboard(); ?>
