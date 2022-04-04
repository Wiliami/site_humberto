<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
$Username = $_SESSION['login']['user_name'];
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
?>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?= BASE ?>/src/images/icon_small.png" alt="logo unit" class="btn-sm" style="width: 45px; height: 40px;">
            </div>
            <!-- <div class="sidebar-brand-text mx-3 btn-sm">Unitbrasil</div> -->
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT mc.*, c.curso_titulo
                FROM matriculas_cursos mc
                LEFT JOIN cursos c ON c.curso_id = mc.curso_id
                WHERE mc.curso_id = :ci", "ci={$courseId}");
            if($Read->getResult()) {
                $DataCourse = $Read->getResult()[0];
                    ?>
            <a class="nav-link" href="<?= BASE ?>/painel/profile/courses/meus-cursos">
                <i class="fas fa-book"></i>
                <?= $DataCourse['curso_titulo'] ?>
            </a>    
        <?php
        } else {
            die(Error('Curso não encontrado!', ''));
        }
        ?>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <?php
        $Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Modules) {
                ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $Modules['modulo_id'] ?>"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        <span><?= $Modules['modulo_name'] ?></span>
                    </a>
                    <div id="collapse<?= $Modules['modulo_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            $Read->FullRead("SELECT * FROM aulas WHERE modulo_id = :mi", "mi={$Modules['modulo_id']}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Lesson) {
                                    ?>
                            <a class="collapse-item" href="https://player.vimeo.com/video/137857207"><?= $Lesson['aula_name'] ?></a>
                            <?php           
                                }
                            } else {
                                Error('Aula não encontrada!', '');
                            }
                            ?>
                        </div>
                    </div>
                </li>
        <?php
            }
        } else {
            Error('Módulos não encontrados', 'warning');
        }
        ?>
        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
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
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Procurar aulas..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
                                        placeholder="Procurar aulas..." aria-label="Search"
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
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information | Minha conta -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Seja bem-vindo(a), <?= $Username ?></span>
                            <img class="img-profile rounded-circle"
                                src="<?= BASE ?>/src/images/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/pages/profile-user">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Minha conta
                            </a>
                            <a class="dropdown-item" href="<?= BASE ?>/painel/profile/pages/reset-password">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Mudar senha
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container mt-0">
                <header class="navbar navbar-expand bg-success static-top shadow d-flex align-items-center justify-content-center justify-content-md-between">
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
                <!-- <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
                </div> -->
                <video class="video-fluid z-depth-1" autoplay controls loop muted>
                    <source src="" type="video/mp4" />
                    <!-- <progress value="0.5" max=""></progress> -->
                </video>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
       
        
<?= $Component->getLinkScriptFooterDashboard(); ?>