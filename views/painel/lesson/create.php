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
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-4">Cadastro de aulas</h1>
    </div>
    <p class="ml-4">Cadastrar aulas em um curso</p>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['register_lesson'])) {
                $CreateLesson['aula_name'] = $Post['aula'];
                $Course = new Course();
                $Course->createLesson($CreateLesson);
                if($Course->getResult()) {
                    Error($Course->getError());
                    header('Location: ' . BASE . '/painel/aulas');
                } else {
                    Error($Course->getError(), 'warning');
                } 
            }
            ?>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome da aula" name="aula" id="inputPassword"
                    value="<?= isset($Post['aula'])? $Post['aula']: '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_lesson" value="Cadastrar aula">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>