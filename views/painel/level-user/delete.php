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
$DeleteNivel = $_GET['nivel_delete']; 
?>
<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM users_levels WHERE level_id = :li", "li={$DeleteNivel}");
    if($Read->getResult()) {
        foreach($Read->getResult() as $level) {
            ?>
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Excluir nível <?= $level['level_desc'] ?></h1>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Nível</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="level-name"
            value="<?= $level['level_desc']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Númeração</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="level-number"
            value="<?= $level['level_id'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/admin/nivel-user" class="btn btn-outline-success mb-2" title="Voltar para lista de níveis">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="register_lesson" value="Excluir nível">
    </form>
    <?php
        }
    } else {
        Error('Nenhum nível de usuário foi selecionado para excluir!');
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>