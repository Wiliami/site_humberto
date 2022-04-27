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
$moduleId = filter_input(INPUT_GET, 'module', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$moduleId}");
            if($Read->getResult()) {
                $DataModule = $Read->getResult()[0];
                    ?>
            <h1 class="h6 mb-0 text-dark">Cadastrar aula no módulo: <b><?= $DataModule['modulo_name'] ?></b></h1>
            <?php
            } else {
                Error('Módulo não encontrado!', 'danger');
            }
            ?>
        </div>
        <div class="card-body"> 
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_lesson'])) {
                    $CreateLesson['aula_name'] = $Post['lesson'];
                    $CreateLesson['aula_duracao'] = $Post['time'];
                    $CreateLesson['aula_url'] = $Post['url'];
                    $CreateLesson['modulo_id'] = $moduleId;
                    $Course = new Course();
                    $Course->createLessonModule($CreateLesson);
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
                    <label for="inputPassword">Nome da aula</label>
                        <input type="text" class="form-control" placeholder="Nome da aula" name="lesson" id="inputPassword"
                            value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Duração</label>
                        <input type="text" class="form-control" placeholder="Duração da aula" name="time" id="inputPassword"
                            value="<?= isset($Post['time'])? $Post['time']: '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">URL</label>
                        <input type="text" class="form-control" placeholder="URL da aula" name="url" id="inputPassword"
                            value="<?= isset($Post['url'])? $Post['url']: '' ?>">
                </div>
                <a href="<?= BASE ?>/painel/courses/lesson/list" class="btn btn-outline-success mb-2" title="Voltar para lista de categorias">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="create_lesson" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>