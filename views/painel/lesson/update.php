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
$lessonId = $_GET['aula'];

$Read = new Read();
$Read->FullRead("SELECT * FROM aulas WHERE aula_id = :ai", "ai={$lessonId}");
if($Read->getResult()) {
    $DataLesson = $Read->getResult()[0];
} else {
    die(Error("Aula não encontrada!", "warning"));
}
?>
<div class="container card-header">
    <div class="py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Atualizar aulas</h1>
    </div>
    <form method="post">
        <?php
        Check::var_dump_json($DataLesson);
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_lesson'])) {
            $updateLesson['aula_name'] = $Post['lesson'];
            $updateLesson['aula_duracao'] = $Post['time'];
            $updateLesson['aula_url'] = $Post['url'];
            $Course = new Course();
            $Course->updateLesson($updateLesson, $lessonId);
            if($Course->getResult()) {
                Error($Course->getError());
            } else {
                Error($Course->getError(), 'warning');
            }   
        }
        ?>
            <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $DataLesson['aula_name'] ?></h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Aula</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da aula" name="lesson" value="<?= $DataLesson['aula_name'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Duração</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Duração da aula" name="time" value="<?= $DataLesson['aula_duracao'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">URL</label>
                <input type="text" class="form-control" placeholder="URL da aula" name="url" id="inputPassword" 
                    value="<?= $DataLesson['aula_url'] ?>">
            </div>
            <a href="<?= BASE ?>/painel/lesson/list" class="btn btn-outline-success mb-2" title="Voltar para lista de aulas">Voltar</a>
            <input type="submit" class="btn btn-success mb-2"   name="update_lesson" value="Atualizar aula">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>