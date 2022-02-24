<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
?>
 <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE ?>/painel/dashboard">
            <div class="sidebar-brand-icon rotate-n-15"></div>
        </a>
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos LIMIT 1");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Cursos) {
                    ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= BASE ?>/painel/dashboard">
                <span><?= $Cursos['curso_titulo'] ?></span>
            </a>
        </li>
        <?php
            }
        } else {
            Error("Ainda não existe cursos!");
        }
        ?>
        <hr class="sidebar-divider">
        <?php
        $Read->FullRead("SELECT * FROM modulos");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Modulos) {
                    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $Modulos['modulo_id'] ?>" aria-expanded="true" aria-controls="collapseTwo">
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
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
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
<?= $Component->getMenuDashboardForPageLesson(); ?>
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
<?= $Component->getFooterDashboard(); ?>