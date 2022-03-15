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
$categoriaId = filter_input(INPUT_GET, 'categoria_update', FILTER_VALIDATE_INT);
?>
<div class="container mb-2">
    <?php
        $Read = new Read(); 
        $Read->FullRead("SELECT * FROM categoria_cursos WHERE categoria_id = :ci", "ci={$categoriaId}");
        if($Read->getResult()) {
            $DataCategory = $Read->getResult()[0];  
        } else {
            die(Error('Categoria não encontrada!', 'danger'));
        }
    ?>
</div>
<div class="container">
    <form action="" method="post">
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['update_category'])) {
            $createCategory['categoria_name'] = (!empty($Post['category'])? $Post['category'] : null);
            $DataCategory = $createCategory;
            $Course = new Course();
            $Course->updateCategoryCourse($createCategory, $categoriaId);
            if($Course->getResult()) {
                Error($Course->getResult());
            } else {
                Error($Course->getError(), 'warning');
            }
        }
        ?>
        <h1 class="h5 mb-0 text-gray-800">Atualizar <b><?= $DataCategory['categoria_name'] ?></b></h1>
        <div class="form-group">
            <label for="example">Categoria</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="category" placeholder="Nome da categoria" 
            value="<?= $DataCategory['categoria_name'] ?>">
        </div>
        <a href="<?= BASE ?>/painel/courses/categorias/list" class="btn btn-outline-success mb-2" title="Voltar para lista de categorias">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="update_category" value="Atualizar">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>