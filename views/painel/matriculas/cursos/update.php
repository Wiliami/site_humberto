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
$matriculaId = filter_input(INPUT_GET, 'matricula_update', FILTER_VALIDATE_INT);

$Read = new Read();
$Read->FullRead("SELECT * FROM matriculas_cursos WHERE matricula_id = :mi", "mi={$matriculaId}");
if($Read->getResult()) { 
    $DataMatricula = $Read->getResult()[0];
} else {
    die(Error("Mátricula não encontrada!"));
}
?>
<div class="container">
    <form method="post">
    <?php 
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['update_matriculate'])) {
        $updateMatriculateCourse['curso_id'] = (!empty($Post['course_matriculate'])? $Post['course_matriculate']: null);
        $updateMatriculateCourse['user_id'] = (!empty($Post['user_matriculate'])? $Post['user_matriculate']: null);
    }
    ?>
    <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar matrícula de <b><?= $DataMatricula['user_name'] ?></b></h1>
        <?php
            // Check::var_dump_json($DataMatricula);
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do curso"  name="course_matriculate" value="<?= $DataMatricula['curso_id'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Usuário</label> 
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do usuário matriculado"  name="user_matriculate" value="<?= $DataMatricula['user_id'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/matriculas/cursos/list" class="btn btn-outline-success" title="Voltar para lista de matrículas">Voltar</a>
        <input type="submit" class="btn btn-success" name="update_matriculate" value="Atualizar">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>