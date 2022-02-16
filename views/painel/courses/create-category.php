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
        <h1 class="h3 mb-0 text-gray-800 ml-4">Cadastrar categoria</h1>
    </div>  
    <p class="ml-4">Página de cadastro de categorias de cursos</p>
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['register_category'])) {
            $CreateCategoria['categoria_name'] = $Post['categoria'];
            $Course = new Course();
            $Course->createCategoryCourse($CreateCategoria);
            if($Course->getResult()) {
                //header('Location: ' . BASE . '/painel/courses/update');
                Error($Course->getError());
                // cadastro realizado com sucesso
            } else {
                Error($Course->getError(), 'warning');
                //falta os campos serem preenchidos nos inputs ou o input recebeu alguma informação errada
            }   
        }
        ?>
        </div>
        <div class="form-group row ml-4">
            <label for="inputPassword" class="col-sm-1 col-form-label btn btn-warning mb-2">Categoria</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nome da categoria" name="categoria" id="inputPassword"
                    value="<?= isset($Post['categoria'])? $Post['categoria']: '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_category" value="Cadastrar categoria">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>