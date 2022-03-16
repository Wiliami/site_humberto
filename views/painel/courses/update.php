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
$courseId = filter_input(INPUT_GET, 'update_curso', FILTER_VALIDATE_INT);
?>
<div class="container">
    <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
        if($Read->getResult()) {
            $DataCourse = $Read->getResult()[0];
        } else {
            Error("Curso não encontrado!", 'warning');
                ?>
            <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success" title="Voltar para a lista de cursos">Voltar</a>
    <?php
        die();
        }   
    ?>
</div>

<div class="container">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800">Atualizar cursos</h5>
    </div>
    <form method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_course'])) {
            $updateCourse['curso_titulo'] = (!empty($Post['course']) ? $Post['course'] : null);
            $updateCourse['curso_descricao'] = (!empty($Post['description']) ? $Post['description'] : null);
            $updateCourse['curso_valor'] = (!empty($Post['valor']) ? $Post['valor'] : null);
            $DataCourse = $updateCourse;
            // Check::var_dump_json($DataCourse);
            $Course = new Course();
            $Course->updateCourse($updateCourse, $courseId);
            if($Course->getResult()) {
                Error($Course->getError());
            } else {
                Error($Course->getError(), 'warning');
            }   
        }
        ?>
        <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $DataCourse['curso_titulo'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do curso"  name="course" value="<?= $DataCourse['curso_titulo'] ?>">
        </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Descrição do curso" name="description" value="<?= $DataCourse['curso_descricao'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword2">Valor</label>
            <input type="number" step="0.01" class="form-control" id="exampleInputPassword2" placeholder="Valor do curso" name="valor" value="<?= $DataCourse['curso_valor'] ?>">
        </div>
    
        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success" title="Voltar para a lista de cursos">Voltar</a>
        <input type="submit" class="btn btn-success" name="update_course" value="Atualizar curso">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>