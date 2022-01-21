<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-start mb-4 d-block">
        <h1 class="h3 mb-0 text-gray-800">Olá, <?= $_SESSION['login']['user_name'] ?></h1>
    </div>
</div>
<div class="row gx-5 container">
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
            <img src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de fundo"/>
            <div class="card-body p-4">
                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
                <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/profile/aulas">
                <?php
                $Read = new Read();
                $Read->FullRead("SELECT * FROM cursos");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $Cursos) {
                        ?>
                    <h5 class="card-title mb-3"><?= $Cursos['curso_titulo'] ?></h5>
                </a>
                <p class="card-text mb-0"><?= $Cursos['curso_descricao'] ?></p>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                            <div class="small">
                                <div class="fw-bold"><?= $Cursos['curso_categoria'] ?></div>
                                <div class="text-muted"><?= $Cursos['curso_create_date'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    Error("Ainda não exite cursos cadastrados!");
                }   
                ?>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>