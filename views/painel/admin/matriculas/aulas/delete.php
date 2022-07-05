<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
$matriculaId = filter_input(INPUT_GET, 'delete_matricula_aula', FILTER_VALIDATE_INT);

$Read = new Read();
$Read->FullRead("SELECT ma.*, u.user_name, a.aula_name
    FROM matriculas_aulas ma
    LEFT JOIN users u ON u.user_id = ma.user_id
    LEFT JOIN aulas a ON a.aula_id = ma.aula_id
    WHERE matricula_id = :mi", "mi={$matriculaId}");
if($Read->getResult()) {
    $DataMatriculaLesson = $Read->getResult()[0];
} else {
    Error('Matrícula não encontrada!');
}
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h1 class="h5 mb-0 text-gray-800">Excluir <b><?= $DataMatriculaLesson['aula_name'] ?></b></h1>
        </div>
        <div class="card-body">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['delete_matriculate'])) {
                    $Course = new Course();
                    $Course->deleteMatriculateLesson($matriculaId);
                    if($Course->getResult()) {
                        Error($Course->getError());
                    } else {
                        Error($Course->getError(), 'warning');
                    }
                }
            ?>
            <form method="post">
                <a href="<?= BASE ?>/painel/matriculas/aulas/list" class="btn btn-outline-success" title="Voltar para lista de matrículas de aulas">Voltar</a>
                <input type="submit" class="btn btn-danger" name="delete_matriculate" value="Excluir">     
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>