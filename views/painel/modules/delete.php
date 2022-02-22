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
echo $Component->getMenuDashboard();
$ModuleDelete = $_GET['delete_module'];
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800 ml-2">Excluir módulos</h5>
        <a href="<?= BASE ?>/painel/modules/list" class="btn btn-success mb-2" title="Voltar para lista de módulos">Voltar</a>
    </div>
    <form action="">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$ModuleDelete}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Modulos) {
            ?>
        <h1 class="h5 mb-0 text-gray-800 mb-4">Excluir <?= $Modulos['modulo_name'] ?></h1>
        <div class="mb-3">
            <label for="exampleInputEmail1">Módulo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="module" value="<?= $Modulos['modulo_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">Descrição</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="<?= $Modulos['modulo_descricao'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">Ordem</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="order" value="<?= $Modulos['modulo_ordem'] ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="delete_module" value="Excluir módulo">
    </form>
    <?php
        }
    } else {
        Error("Nenhum módulo foi selecionado para excluir!");
    }   
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>