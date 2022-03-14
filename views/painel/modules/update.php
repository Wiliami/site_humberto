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
$moduleId = $_GET['module'];
?>

<div class="container">
    <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$moduleId}");
        if($Read->getResult()) {
            $DataModule = $Read->getResult()[0];
        } else {    
            die(Error("Módulo não encontrado!", 'danger'));
        }
    ?>
</div>

<div class="container card-header">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <b><?= $DataModule['modulo_name'] ?></b></h1>
    </div>
        <form method="post">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['update_module'])) {
                $updateModule['modulo_name'] = (!empty($Post['module']) ? $Post['module'] :  null );
                $updateModule['modulo_ordem'] = (!empty($Post['order']) ? $Post['order'] : null );
                $Course = new Course();
                $Course->updateModule($updateModule, $moduleId);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'warning');
                }
            }
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1">Módulo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="module" value="<?= $DataModule['modulo_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Ordem do módulo</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="order" value="<?= $DataModule['modulo_ordem'] ?>">
            </div>
            <a href="<?= BASE ?>/painel/modules/list" class="btn btn-outline-success" title="Voltar para lista de módulos">Voltar</a>
            <input type="submit" class="btn btn-success" name="update_module" value="Atualizar módulo">
        </form>     
</div>
<?= $Component->getFooterDashboard(); ?>