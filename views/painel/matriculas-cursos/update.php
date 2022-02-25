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
echo $Component->getMenuDashboard();
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800 ml-2">Atualizar matrícula de cursos</h5>
        <a href="<?= BASE ?>/painel/matriculas-cursos/list" class="btn btn-success mb-2" title="Voltar para lista de matrículas de cursos">Voltar</a>
    </div>
    <form method="">
        <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $Matriculas['modulo_name'] ?></h1>
        <div class="mb-3">
            <label for="exampleInputEmail1">Usuário</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="module" value="<?= $Modulos['modulo_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">Curso</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="<?= $Modulos['modulo_descricao'] ?>">
        </div>
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>