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
$lessonId = filter_input(INPUT_GET, 'aula', FILTER_VALIDATE_INT);

$Read = new Read();
$Read->FullRead("SELECT * FROM aulas WHERE aula_id = :ai", "ai={$lessonId}");
if($Read->getResult()) {
    $DataLesson = $Read->getResult()[0];
    } else {
        die(Error("Aula não encontrada!", "primary"));
}
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h1 class="h6 mb-0">Atualizar <b><?= $DataLesson['aula_name'] ?></b></h1>
        </div>
        <div class="card-body"> 
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['update_lesson'])) {
                    $updateLesson['aula_name'] = (!empty($Post['lesson'])? $Post['lesson']: null);
                    $updateLesson['aula_duracao'] = (!empty($Post['time'])? $Post['time']: null);
                    $updateLesson['aula_url'] = (!empty($Post['url'])? $Post['url']: null);
                    $DataLesson = $updateLesson;
                    $Course = new Course();
                    $Course->updateLesson($updateLesson, $lessonId);
                    if($Course->getResult()) {
                        Error($Course->getError());
                        header('Location: ' . BASE . '/painel/courses/lesson/list');
                        die();
                    } else {
                        Error($Course->getError(), 'danger');
                    }   
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome da aula</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da aula" name="lesson" value="<?= $DataLesson['aula_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Duração</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Duração da aula" name="time" value="<?= $DataLesson['aula_duracao'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">URL</label>
                    <input type="text" class="form-control" placeholder="URL da aula" name="url" id="inputPassword" value="<?= $DataLesson['aula_url'] ?>">
                </div>
                <a href="<?= BASE ?>/painel/courses/lesson/list" class="btn btn-outline-success mb-2" title="Voltar para lista de aulas">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="update_lesson" value="Atualizar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>