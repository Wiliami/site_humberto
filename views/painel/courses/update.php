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
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800">Atualizar cursos</h5>
        <a href="<?= BASE ?>/painel/courses/list" class="btn btn-success mb-2" title="Voltar para lista de cursos">Voltar</a>
    </div>
    <form method="GET">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_course'])) {
            $udpateCourse['curso_titulo'] = $Post['course'];
            $udpateCourse['curso_descricao'] = $Post['description'];
            $udpateCourse['curso_categoria'] = $Post['category'];
            $udpateCourse['curso_valor'] = $Post['value'];
            $Course = new Course();
            $Course->updateCourse($udpateCourse);
            if($Course->getResult()) {
                Error($Course->getError());
            } else {
                Error($Course->getError(), 'warning');
            }   
        }
        ?>
        <?php 
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$CourseId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Cursos) {
                ?>
        <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $Cursos['curso_titulo'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do curso"  name="course" value="<?= $Cursos['curso_titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descrição</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Descrição do curso" name="description" value="<?= $Cursos['curso_descricao'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Categoria</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Categoria do curso" name="category" value="<?= $Cursos['curso_categoria'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Valor</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Valor do curso" name="value" value="R$<?= number_format($Cursos['curso_valor'], 2, ',', '.') ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="update_course" value="Atualizar curso">
    </form>
    <?php
        }
    } else {
        Error("Nenhum curso foi selecionado para atualizar!");
    }
    ?>
<!-- Fim da div container -->
</div>
<?= $Component->getFooterDashboard(); ?>