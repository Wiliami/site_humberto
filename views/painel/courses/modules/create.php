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
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            $DataCourse = $Read->getResult()[0];
        } else {
            Error("Curso não encontrado!", 'danger');
        }
        ?>
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <div class="h6 mb-0 text-gray-800 ml-0">Cadastrar módulo no curso <b><?= $DataCourse['curso_titulo'] ?></b></div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_module'])) {
                    $CreateModule['modulo_name'] = $Post['module'];

                    
                    //$CreateModule['modulo_ordem'] = $Post['order'];
                    $CreateModule['curso_id'] = $courseId;
                    $Course = new Course();
                    $Course->createModuleCourse($CreateModule, $DataCourse);
                    if($Course->getResult()) {
                        //header('Location: ' . BASE . '/painel/aulas');
                        Error($Course->getError());
                    } else {
                        Error($Course->getError(), 'warning');
                    }   
                }
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Módulo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="module" placeholder="Nome do módulo"
                    value="<?= isset($Post['module'])? $Post['module']: '' ?>">
                </div>
                <!-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ordem</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="order" placeholder="Número de ordem do módulo"
                    value=" isset($Post['order'])? $Post['order']: '' ">
                </div> -->
                <a href="<?= BASE ?>/painel/courses/modules/list" class="btn btn-outline-success" title="Voltar para lista de módulos">Voltar</a>
                <input type="submit" class="btn btn-success" name="create_module" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>