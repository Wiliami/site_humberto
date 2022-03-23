<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$Username = $_SESSION['login']['user_name'];
$userId = $_SESSION['login']['user_id'];
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4 d-block">
        <h1 class="h3 mb-0 text-gray-800 ml-2">Olá, <?= $Username ?></h1>
    </div>
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT m.*, c.curso_titulo, c.curso_descricao
        FROM matriculas_cursos m 
        LEFT JOIN users u ON u.user_id = m.user_id
        LEFT JOIN cursos c ON c.curso_id = m.curso_id 
        WHERE m.user_id = :id", "id={$userId}");
    if($Read->getResult()) {
        foreach($Read->getResult() as $Mat) {
            //Check::var_dump_json($Mat);
            ?>
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
            <img src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de fundo"/>
            <div class="card-body p-4">
                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
                <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/profile/courses/lesson/lesson">
                    <h5 class="card-title mb-3"><?= $Mat['curso_titulo'] ?></h5>
                </a>
                <p class="card-text mb-0"><?= $Mat['curso_descricao'] ?></p>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                            <div class="small">
                                <div class="fw-bold"><?= number_format($Mat['matricula_valor_pago'], 2, ',', '.')  ?></div>
                                <div class="text-muted"><?= date('d/m/Y', strtotime($Mat['matricula_create_date'])) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    } else {
         Error("Parece que você não está matriculado em nenhum curso!", 'warning');
    } 
    ?>
</div>
<div class="container">
    <a href="<?= BASE ?>/painel/dashboard" class="btn btn-success">Ver cursos</a>  
</div>
<?= $Component->getFooterDashboard(); ?>