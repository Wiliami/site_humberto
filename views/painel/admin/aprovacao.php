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
$courseId = filter_input(INPUT_GET, 'aprovacao', FILTER_VALIDATE_INT); 
?>
<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM compras WHERE compra_id = :ci", "ci={$courseId}");
    if($Read->getResult()) {
        $DataPurchase = $Read->getResult()[0];
    } else {
        die(Error("Aprovação de curso não encontrada!", 'warning'));
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">        
            <h1 class="h5 mb-0 text-gray-800">Aprovação de <b><?= $DataPurchase['compra_curso'] ?></b></h1>
        </div>    
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="inputPassword">Curso</label>
                    <input type="text" class="form-control" placeholder="Nome do curso" name="course" id="inputPassword" value="<?= isset($DataPurchase['compra_curso'])? $DataPurchase['compra_curso']: '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Status</label>
                    <input type="text" class="form-control" placeholder="Status da aprovação do curso" name="status" id="inputPassword" value="<?= isset($DataPurchase['compra_status'])? $DataPurchase['compra_status']: '' ?>">
                </div>
            </form>
            <a href="<?= BASE ?>/painel/admin/pages/cursos-aprovados" class="btn btn-outline-success" title="Voltar para lista de aprovados">Voltar</a>
            <input type="submit" class="btn btn-success" name="" value="Aprovar">
        </div>
    </div>            
</div>
<?= $Component->getFooterDashboard(); ?>