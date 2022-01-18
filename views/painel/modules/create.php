<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-4">Cadastrar módulos</h1>
    </div>
    <p class="ml-4">Cadastrar módulos de cursos</p>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_module'])) {
            $CreateModule['modulo_descricao'] = $Post['description'];
            $User = new User();
            $User->createModule($CreateModule);
            if($User->getResult()) {
                Check::var_dump_json($User->getResult());
                header('Location: ' . BASE . '/painel/aulas');
                Error($User->getError());
                // cadastro realizado com sucesso
            } else {
                Error($User->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }   
        }
        ?>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Descrição</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Descrição do módulo" name="description"
                    id="inputPassword" value="<?= isset($Post['description'])? $Post['description']: '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_module" value="Cadastrar módulo">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>