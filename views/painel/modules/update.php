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
$ModuleId = $_GET['module'];
?>
<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h5 class="h3 mb-0 text-gray-800 ml-2">Atualizar módulos</h5>
        <a href="<?= BASE ?>/painel/modules/list" class="btn btn-success mb-2" title="Voltar para lista de módulos">Voltar</a>
    </div>
        <form method="">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$ModuleId}");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Modulos) {
                    ?>
            <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $Modulos['modulo_name'] ?></h1>
            <div class="mb-3">
                <label for="exampleInputEmail1">Módulo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="module" value="<?= $Modulos['modulo_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Descrição módulo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="<?= $Modulos['modulo_descricao'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Ordem do módulo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="order" value="<?= $Modulos['modulo_ordem'] ?>">
            </div>
        </form>  
        <?php
        }
    } else {
        Error("Nenhum módulo foi selecionado para atualizar!");
    }
    ?>          
</div>
<?= $Component->getFooterDashboard(); ?>