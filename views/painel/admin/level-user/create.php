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
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h6 mb-0">Cadastrar Nível</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['create_level'])) {
                    $createLevel['level_desc'] = $Post['name_level'];
                    $User = new User();
                    $User->createLevelUser($createLevel);
                    if($User->getResult()){
                        Error($User->getError());
                        header('Location: ' . BASE . '/painel/admin/level-user/list');
                        die();
                    } else {
                        Error($User->getError(), 'warning'); 
                    }
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Categoria</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name_level" placeholder="Nome da categoria" 
                    value="<?= isset($Post['name_level'])? $Post['name_level']: '' ?>">
                </div>
                <a href="<?= BASE ?>/painel/admin/level-user/list" class="btn btn-outline-success mb-2" title="Voltar para lista de categorias">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="create_level" value="Cadastrar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>