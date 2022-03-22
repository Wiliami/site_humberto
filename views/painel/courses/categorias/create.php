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
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h5 mb-0 text-gray-800 ml-0">Cadastrar categoria</h1>
        </div>
        <div class="card-body">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['register_category'])) {
                $CreateCategoria['categoria_name'] = $Post['category'];
                $Course = new Course();
                $Course->createCategoryCourse($CreateCategoria);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'warning');
                }   
            }
            //header('Location: ' . BASE . '/painel/courses/categorias/list');
            ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="example">Categoria</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="category" placeholder="Nome da categoria" 
                        value="<?= isset($Post['category'])? $Post['category']: '' ?>">
                    </div>
                    <a href="<?= BASE ?>/painel/courses/categorias/list" class="btn btn-outline-success mb-2" title="Voltar para a lista de categorias">Voltar</a>
                    <input type="submit" class="btn btn-success mb-2" name="register_category" value="Cadastrar">
                </form>
            </div> 
    </div> 
</div>
<?= $Component->getFooterDashboard(); ?>