<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-0">Cadastro de módulos</h1>
    </div>
    <p class="ml-0">Cadastrar módulos em um curso</p>
    <form method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_module'])) {
            $CreateModule['modulo_name'] = $Post['module'];
            $CreateModule['modulo_descricao'] = $Post['description'];
            $Course = new Course();
            $Course->createModule($CreateModule);
            if($Course->getResult()) {
                //header('Location: ' . BASE . '/painel/aulas');
                Error($Course->getError());
            } else {
                Error($Course->getError(), 'warning');
            }   
        }
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Módulo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="module" placeholder="Nome do módulo"
            value="<?= isset($Post['module'])? $Post['module']: '' ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="description" placeholder="Descrição do módulo"
            value="<?= isset($Post['description'])? $Post['description']: '' ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="register_module" value="Cadastrar módulo">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>