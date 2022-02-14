<?php
// $User = new User();
// $User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
?>
 <!-- Page Wrapper -->
 <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE ?>/painel/dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <!-- <div class="sidebar-brand-text mx-3">Logo</div> -->
        </a>
        <!-- Divider -->
        <li class="nav-item active">
        <a class="nav-link" href="<?= BASE ?>/painel/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Painel</span></a>
                <!-- Sidebar Toggler (Sidebar) -->
        </li>
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM modulos");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Modulos) {
                    ?>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $Modulos['modulo_id'] ?>" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span><?= $Modulos['modulo_name'] ?></span>
            </a>
            <div id="collapse<?= $Modulos['modulo_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php
                    $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :id", "id={$Modulos['modulo_id']}");
                    if($Read->getResult()) {
                        foreach($Read->getResult() as $Aula) {
                            ?>
                    <a class="collapse-item" href="<?= BASE ?>/painel/admin/list-user"><?= $Aula['aula_name']?></a>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
                }
            } else {
                Error("Ainda não existem cursos nesta plataforma!");
            }
            ?>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fas fa-book"></i>
                <span>Cursos</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/meus-cursos">Meus cursos</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/minhas-compras">Minhas compras</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/cursos-finalizados">Cursos finalizados</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/cursos-pendentes">Cursos pendentes</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/help">Ajuda</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/suporte">Suporte</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/profile/settings">Configurações</a>
                    <a class="collapse-item" href="<?= BASE ?>/painel/dashboard">Dashboard</a>
                </div>
            </div>
        </li> -->
                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                        aria-controls="collapsePages">
                        <i class="fas fa-pager"></i>
                        <span>Páginas</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Cursos:</h6>
                            <a class="collapse-item" href="<?= BASE ?>/painel/courses/create">Cadastrar cursos</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/courses/list">Lista de cursos</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/courses/update">Atualizar cursos</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/courses/delete">Excluir cursos</a>

                            <h6 class="collapse-header">Módulos:</h6>
                            <a class="collapse-item" href="<?= BASE ?>/painel/modules/create">Cadastrar módulos</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/modules/list">Lista de módulos</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/modules/update">Atualizar módulos</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/modules/delete">Deletar módulos</a>

                            <h6 class="collapse-header">Aulas:</h6>
                            <a class="collapse-item" href="<?= BASE ?>/painel/lesson/create">Cadastrar aulas</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/lesson/list">Lista de aulas</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/lesson/update">Atualizar aulas</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/lesson/delete">Deletar aulas</a>

                            <h6 class="collapse-header">Outras páginas:</h6>
                            <a class="collapse-item" href="<?= BASE ?>/painel/profile/help">Ajuda</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/profile/suporte">Suporte</a>
                            <a class="collapse-item" href="<?= BASE ?>/painel/dashboard">Dashboard</a>
                        </div>
                    </div>
                </li> -->
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Nav Item - Alerts -->
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
                        <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas as
                            alertas
                        </a>
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
                                <div class="text-truncate">Curso sobre gestão financeiro já está disponível com mais
                                    de 12 módulos.</div>
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
                                <div class="text-truncate">Cursos sobre finanças foram os que tiveram maior acesso
                                    pelo usuários nesta semana.</div>
                                <div class="small text-gray-500">Alerta do sistema · 2 minutos atrás</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Leia mais mensagens</a>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Seja bem-vindo(a), <?= $_SESSION["login"]["user_name"] ?></span>
                        <img class="img-profile rounded-circle" src="<?= BASE ?>/src/images/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/profile-user">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Minha conta
                        </a>
                        <a class="dropdown-item" href="<?= BASE ?>/painel/profile/reset-password">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Mudar senha
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= BASE ?>/pages/logout" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Conteúdo que vai ser exibido na dashboard
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                    Generate Report
                                </a> 
                        </div>
                        <p>Qualquer conteúdo aqui</p>
                    </div> -->
        <!-- /.container-fluid -->
        <!-- End of Main Content -->
        <?= $Component->getFooterDashboard(); ?>