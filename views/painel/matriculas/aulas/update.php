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
$matriculaId = filter_input(INPUT_GET, 'matricula_update_aula', FILTER_VALIDATE_INT);
?>
<div class=container>
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * 
        FROM matriculas_aulas ma
        LEFT JOIN users u ON u.user_id = ma.user_id
        LEFT JOIN aulas a ON a.aula_id = ma.aula_id
        WHERE ma.matricula_id = :mi", "mi={$matriculaId}");
    if($Read->getResult()) {
        $DataMatriculaLesson = $Read->getResult()[0];
    } else {
        die(Error("Mátricula não encontrada!", 'warning'));
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h1 class="h5 mb-0 text-gray-800">Atualizar matrícula de <b><?= $DataMatriculaLesson['user_name'] ?></b></h1>
        </div>
        <div class="card-body">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['update_matriculate'])) {
                   $updateMatriculateLesson['aula_id'] = (!empty($Post['lesson'])? $Post['lesson']: null);
                   $updateMatriculateLesson['user_id'] = (!empty($Post['user'])? $Post['user']: null);
                   $Course = new Course();
                   $Course->updateMatriculateLesson($updateMatriculateLesson, $matriculaId);
                   if($Course->getResult()) {
                       Error($Course->getError());
                   } else {
                       Error($Course->getError(), 'warning');
                   }
                } 
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Aula</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da aula"  name="lesson" value="<?= $DataMatriculaLesson['aula_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do usuário"  name="user" value="<?= $DataMatriculaLesson['user_name'] ?>">
                </div>
                <a href="<?= BASE ?>/painel/matriculas/aulas/list" class="btn btn-outline-success" title="Voltar para lista de matrículas">Voltar</a>
                <input type="submit" class="btn btn-success" name="update_matriculate" value="Atualizar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>