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
$CourseId = $_GET['update_curso'];

$Read = new Read();
$Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$CourseId}");
if($Read->getResult()) {
    $DataCourse = $Read->getResult()[0]; // certezad que só existe um dado
} else {
    Error("Nenhum curso foi selecionado para atualizar!");
    }
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800">Atualizar cursos</h5>
    </div>
    <form method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_course'])) {
            if(empty($Post['course'])) {
                $updateCourse['curso_titulo'] = $Post['course'];
            } elseif(empty($Post['description'])) {
                $updateCourse['curso_descricao'] = $Post['description'];
            } elseif(empty($Post['category'])) {
                $updateCourse['curso_categoria'] = $Post['category'];
            } elseif(empty($Post['value'])) {
                $updateCourse['curso_valor'] = $Post['value'];
            } else {
                $DataCourse = $updateCourse;
                $Course = new Course();
                $Course->updateCourse($updateCourse, $CourseId);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'warning');
                }   
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
            <label for="exampleInputPassword1">Categoria</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Categoria do curso" name="category" value="<?= $DataCourse['curso_categoria'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Valor</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Valor do curso" name="value" value="R$<?= number_format($DataCourse['curso_valor'], 2, ',', '.') ?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_course" value="Atualizar curso">
        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-outline-success" title="Voltar para a lista de cursos">Voltar</a>
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>