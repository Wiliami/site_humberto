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
$levelId = filter_input(INPUT_GET, 'level', FILTER_VALIDATE_INT);
?>
<div class="container">
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['update_lesson'])) {
        $updateLevelUser['level_desc'] = (!empty($Post['level_name']) ? $Post['level_name'] : null );
        $User = new User();
        $User->updateLevelUser($updateLevelUser, $levelId); 
        if($User->getResult()) {
            Error($User->getError());
            header('Location: ' . BASE . '/painel/admin/level-user/list');
            die();
        } else {
            Error($User->getError());
        }
    }
    ?>
     <div class="card shadow">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT ul.*, ul.level_desc
                FROM users_levels ul
                LEFT JOIN users u ON u.user_id = ul.level_id
                WHERE ul.level_id = :li", "li={$levelId}");
            if($Read->getResult()) {
                $DataLevel = $Read->getResult()[0];
                ?>
                <h1 class="h6 mb-0">Atualizar <b><?= $DataLevel['level_desc'] ?></b></h1>           
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do nível</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="level_name" placeholder="Nome do nível de usuário"
                    value="<?= $DataLevel['level_desc'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nível</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="level_number"
                    value="<?= $DataLevel['level_id'] ?>">
                </div>
                <a href="<?= BASE ?>/painel/admin/level-user/list" class="btn btn-outline-success mb-2" title="Voltar para lista de níveis">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="update_lesson" value="Atualizar">
            </form>
            <?php
            } else {
                Error('Nível não encontrado!', 'warning');
            }
            ?>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>