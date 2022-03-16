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
$matriculaId = filter_input(INPUT_GET, 'matricula_update', FILTER_VALIDATE_INT);

$Read = new Read();
$Read->FullRead("SELECT * FROM matriculas_cursos WHERE matricula_id = :mi", "mi={$matriculaId}");
if($Read->getResult()) { 
    $DataMatricula = $Read->getResult()[0];
} else {
    Error("Mátricula não encontrada!");
}
?>
<?= $Component->getMenuDashboard();?>
<div class="container">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Atualizar matrícula</h1>
        <a href="<?= BASE ?>/painel/matriculas/cursos/list" class="btn btn-success mb-2" title="Voltar para lista de matrículas">Voltar</a>
    </div>
    <form method="post">
    <?php 
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['update_matriculate'])) {
        $update_matriculate[''] = (!empty($Post['course_matriculate'])? $Post['course_matriculate']: null);
        $update_matriculate[''] = (!empty($Post['user_matriculate'])? $Post['user_matriculate']: null);
    }
    ?>
    <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar matrícula no curso <b><?= $Matricula['matricula_curso'] ?> </b>do usuário <?= $Matricula['matricula_usuario'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da matrícula"  name="course_matriculate" value="<?= $Matricula['matricula_curso'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Usuário</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do usuário matriculado"  name="user_matriculate" value="<?= $Matricula['matricula_usuario'] ?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_matriculate" value="Atualizar matrícula">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>