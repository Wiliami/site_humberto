<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
$CoursesUser = $_GET['user'];
?>
<div class="row gx-5 container">
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <i class="fas fa-layer-plus"></i>
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$CoursesUser}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $User) {
                ?>
            <h1 class="h3 mb-0 text-gray-800">Cursos de <?= $User['user_name'] ?></h1>
        <?php
            }
        }
        ?>
        <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-success mb-2" title="Voltar para lista de cursos de usuário">Voltar</a>
    </div>
    <div>
    <?php
    $Read->FullRead("SELECT m.*, c.curso_titulo, c.curso_descricao
        FROM matriculas m 
        LEFT JOIN users u ON u.user_id = m.user_id
        LEFT JOIN cursos c ON c.curso_id = m.curso_id 
        WHERE m.user_id = :id
        ", "id={$_SESSION['login']['user_id']}");
    if($Read->getResult()) {
        foreach($Read->getResult() as $Matriculas) {
            ?>
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
            <img src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de fundo"/>
            <div class="card-body p-4">
                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
                <a class="text-decoration-none link-dark stretched-link" href="<?= BASE ?>/painel/profile/aulas">
                    <h5 class="card-title mb-3"><?= $Matriculas['curso_titulo'] ?></h5>
                </a>
                <p class="card-text mb-0"><?= $Matriculas['curso_descricao'] ?></p>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                            <div class="small">
                                <div class="fw-bold"><?= number_format($Matriculas['matricula_valor_pago'], 2, ',', '.')  ?></div>
                                <div class="text-muted"><?= date('d/m/Y', strtotime($Matriculas['matricula_create_date'])) ?></div>
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
        Error("Usuário selecionado(a) não possui nenhum curso!");
    }   
    ?>
</div>
</div>
<?= $Component->getFooterDashboard(); ?>