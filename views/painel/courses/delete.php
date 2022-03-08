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
$CourseId = $_GET['delete_curso'];
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800 ml-2">Excluir | Excluir cursos</h5>
        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-success mb-2" title="Voltar para lista de cursos">Voltar</a>
    </div>
    <form method="GET">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['delete_course'])) {
                $deleteCourse['curso_titulo'] = $Post['course'];
                $deleteCourse['curso_descricao'] = $Post['description'];
                $deleteCourse['curso_categoria'] = $Post['categoria'];
                $Course = new Course();
                $Course->deleteCourse($deleteCourse);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'warning');
                }
            } 
        ?>
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$deleteCourse}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Cursos) {
                ?>
        <h1 class="h5 mb-0 text-gray-800 ml-4 mb-4">Excluir <?= $Cursos['curso_titulo'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do curso" name="course" value="<?= $Cursos['curso_titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Descrição do curso" name="description" value="<?= $Cursos['curso_descricao'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Categoria</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Categoria do curso" name="categoria" value="<?= $Cursos['curso_categoria'] ?>">
        </div>
        <input type="submit" class="btn btn-success mb-2" data-toggle="modal" data-target="#modalMatricula" 
        name="delete_course" id="" value="Excluir curso">
    </form>
    <?php
        } 
    } else { 
        Error("Nenhum curso foi selecionado para excluir!"); 
    } 
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>