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
<div class="container card-header">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-0">Cadastrar categoria</h1>
    </div>
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
    <form method="post">
        <div class="px-4 py-sm-5 py-3">
        </div>
        <div class="form-group">
            <label for="example">Categoria</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="category" placeholder="Nome da categoria" 
            value="<?= isset($Post['category'])? $Post['category']: '' ?>">
        </div>
        <input type="submit" class="btn btn-success mb-2 ml-0" name="register_category" value="Cadastrar categoria">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>