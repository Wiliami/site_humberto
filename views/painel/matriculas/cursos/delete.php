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
$MatriculaId = filter_input(INPUT_GET, 'delete_matricula', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Excluir matrícula</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php 
                $Read = new Read();
                $Read->FullRead("SELECT * FROM matriculas_cursos WHERE matricula_id = :mi", "mi={$MatriculaId}");
                if($Read->getResult()) {
                    foreach($Read->getResult() as $Matriculas) {
                        ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Curso</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="matriculate_course" value="<?= $Matriculas['curso_id'] ?>">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="matriculate_user" value="<?= $Matriculas['user_id'] ?>">
                </div> 
                <?php
                    }
                }
                ?>
                <a href="<?= BASE ?>/painel/matriculas/cursos/list" class="btn btn-outline-success" title="Voltar para lista de matrículas">Voltar</a>
                <input type="submit" class="btn btn-danger" name="delete_matricula" value="Excluir">     
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard ();?>