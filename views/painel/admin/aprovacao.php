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
$AprovCourse = $_GET['aprovacao'];
?>
<div class="container card-header">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM compras WHERE compra_id = :ci", "ci={$AprovCourse}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Compras) {
                ?>
        <h1 class="h3 mb-0 text-gray-800">Aprovação de <b><?= $Compras['compra_curso'] ?></b></h1>
        <?php
            }
        } else {
            Error("Nenhuma aprovação de curso foi selecionado!");
        }
        ?>
    </div>
    <p class="ml-0">Aprovação de cursos</p>
    <form action="" method="post">
        <div class="form-group">
            <label for="inputPassword">Curso</label>
            <input type="text" class="form-control" placeholder="Nome do curso" name="course" id="inputPassword" value="<?= isset($Compras['compra_curso'])? $Compras['compra_curso']: '' ?>">
        </div>
        <div class="form-group">
            <label for="inputPassword">Status</label>
            <input type="text" class="form-control" placeholder="Status da aprovação do curso" name="status" id="inputPassword" value="<?= isset($Compras['compra_status'])? $Compras['compra_status']: '' ?>">
        </div>
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>