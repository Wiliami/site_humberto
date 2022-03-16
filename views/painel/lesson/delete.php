<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
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
$courseId = filter_input(INPUT_GET, 'delete_aula', FILTER_VALIDATE_INT);
?>
<div class="container">
    <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM aulas WHERE aula_id = :ai", "ai={$courseId}");
        if($Read->getResult()) { 
            $DataLesson = $Read->getResult()[0];
        } else {
            die(Error("Nenhuma aula foi selecionada para excluir!"));
        }
    ?>
</div>

<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800">Excluir | Excluir aulas</h5>
    </div>
    <form method="post">
        <?php 
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['lesson_delete'])) {
            $Course = new Course();
            $Course->deleteLesson($courseId);
            if($Course->getResult()) {
                Error($Course->getError());
            } else {
                Error($Course->getError());
            }
        }
        ?>
        <h1 class="h5 mb-0 text-gray-800 mb-4">Excluir <?= $DataLesson['aula_name'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Aula</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da aula" name="lesson" value="<?= $DataLesson['aula_name'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Duração da aula</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Duração da aula" name="time" value="<?= $DataLesson['aula_duracao'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">URL</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="URL da aula" name="url" value="<?= $DataLesson['aula_url'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/lesson/list" class="btn btn-outline-success mb-2" title="Voltar para lista de aulas">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="lesson_delete" value="Excluir aula">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>