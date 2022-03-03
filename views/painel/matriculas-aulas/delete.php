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
?>
<div class="container card-header">
    <div class="py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Excluir aulas</h1>
        <a href="<?= BASE ?>/painel/lesson/list" class="btn btn-success mb-2" title="Voltar para lista de aulas">Voltar</a>
    </div>
    <form method="post">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM matriculas_aulas");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Aulas) {
                ?>
        <h1 class="h5 mb-0 text-gray-800 mb-4">Excluir <?= $Aulas['matricula_aula'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Aula</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da aula" value="<?= $Aulas['matricula_aula'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/matriculas-aulas/list" class="btn btn-outline-success" title="Voltar para lista de matrículas de aulas">Voltar</a>
        <input type="submit" class="btn btn-success" name="delete_matricula" value="Excluir matrícula">     
    </form>
    <?php
        }
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>