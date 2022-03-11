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
$levelId = $_GET['level']; 
?>

<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM users_levels WHERE level_id = :li", "li={$levelId}");
    if($Read->getResult()) {
        $DataLevel = $Read->getResult()[0];
    } else {
        Error('Nível de usuário não encontrado!');
    }
    ?>
</div>
<div class="container">
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['update_lesson'])) {
        $updateLevelUser['level_id'] = (!empty($Post['level_name']) ? $Post['level_number'] : null );
        $updateLevelUser['level_desc'] = (!empty($Post['level_number']) ? $Post['level_number'] : null );
        $User = new User();
        $User->updateLevelUser($updateLevelUser, $levelId); 
        if($User->getResult()) {
            Error($User->getError());
        } else {
            Error($User->getError());
        }
    }
    ?>
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Atualizar <b><?= $DataLevel['level_desc'] ?></b></h1>
    </div>
    <form action="" method="post" class="card-header">
        <div class="form-group">
            <label for="exampleInputEmail1">Nível</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="level_name"
            value="<?= $DataLevel['level_desc']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Númeração</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="level_number"
            value="<?= $DataLevel['level_id'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/admin/nivel-user" class="btn btn-outline-success mb-2" title="Voltar para lista de níveis">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="update_lesson" value="Atualizar nível">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>