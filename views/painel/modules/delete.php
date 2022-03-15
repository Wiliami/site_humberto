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
$moduleId = $_GET['delete_module'];
?>

<div class="container">
    <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM modulos WHERE modulo_id = :mi", "mi={$moduleId}");
        if($Read->getResult()) {
            $DataModule = $Read->getResult()[0];
        } else {
            Error("Módulo não encontrado!", 'danger');
            ?>
        <a href="<?= BASE ?>/painel/modules/list" class="btn btn-outline-primary" title="Voltar para a lista de módulos">Voltar</a>    
    <?php
            die();
        }
    ?>
</div>

<div class="container card-header">
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['delete_module'])) {
        $Course = new Course();
        $Course->deleteModule($moduleId);
        if($Course->getResult()) {
            Error($Course->getError());
        } else {
            Error($Course->getError());
        }
    }
    ?>
    <form action="" method="post">
        <h1 class="h5 mb-0 text-gray-800 mb-4">Excluir <b><?= $DataModule['modulo_name'] ?></b></h1>
        <div class="mb-3">
            <label for="exampleInputEmail1">Módulo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="module" placeholder="Nome do módulo" value="<?= $DataModule['modulo_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">Ordem</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="order" placeholder="Número da ordem do módulo" value="<?= $DataModule['modulo_ordem'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/modules/list" class="btn btn-outline-primary mb-2" title="Voltar para lista de módulos">Voltar</a>
        <!-- <input type="submit" class="btn btn-success" name="delete_module" value="Excluir módulo"> -->

        <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModal">
            Excluir
        </button>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir <b><?= $DataModule['modulo_name']; ?></b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir módulo?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" type="button" data-dismiss="modal">
                            Cancelar
                        </button>
                        <input type="submit" class="btn btn-danger" name="delete_module" value="Excluir">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>