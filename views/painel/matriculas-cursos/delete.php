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
$deleteMatricula = $_GET['delete_matricula']
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Excluir matrícula</h1>
        <a href="<?= BASE ?>/painel/matriculas-cursos/list" class="btn btn-success mb-2" title="Voltar para lista de matrículas">Voltar</a>
    </div>
    <form method="post">
        <?php 
        $Read = new Read();
        $Read->FullRead("SELECT * FROM matriculas_cursos WHERE matricula_id = :mi", "mi={$deleteMatricula}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Matriculas) {
                ?>
        <div class="mb-3">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="matriculate_course" value="<?= $Matriculas['matricula_curso'] ?>">
        </div> 
        <div class="mb-3">
            <label for="exampleInputEmail1">Usuário</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="matriculate_user" value="<?= $Matriculas['matricula_usuario'] ?>">
        </div> 
        <?php
            }
        }
        ?> 
        <input type="submit" class="btn btn-success" name="delete_matricula" value="Excluir matrícula">     
    </form>
</div>
<?= $Component->getFooterDashboard ();?>