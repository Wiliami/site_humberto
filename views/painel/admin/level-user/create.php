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
    <div class="card-header">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar Nível</h1>
    </div>
    <form method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_level'])) {
            $createLevel['level_desc'] = $Post['name-level'];
            $createLevel['level_id'] = $Post['level'];
            $User = new User();
            $User->createLevelUser($createLevel);
            if($User->getResult()){
                Error($User->getError());
            } else {
                Error($User->getError(), 'warning'); 
            }
        }
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Categoria</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name-level" placeholder="Nome da categoria" 
            value="<?= isset($Post['name-level'])? $Post['name-level']: '' ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nível</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="level" placeholder="Número da categoria" 
            value="<?= isset($Post['level'])? $Post['level']: '' ?>">
        </div>
        <a href="<?= BASE ?>/painel/admin/level-user/list" class="btn btn-outline-success mb-2" title="Voltar para lista de categorias">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="register_level" value="Cadastrar">
    </form>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>