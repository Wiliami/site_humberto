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
        <h1 class="h3 mb-0 text-gray-800 ml-4">Matrículas</h1>
    </div>
    <form method="post">
        <div class="form-group row ml-4">         
            <label for="exampleInputEmail1 btn btn-warning">Matrícula</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Nome da aula" 
            value="<?= isset($Post['matriculate'])? $Post['matriculate']: '' ?>">
        </div>
        <div class="form-group row ml-4">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="URL da aula" 
            value="<?= isset($Post['url'])? $Post['url']: '' ?>">
        </div>
        <div class="form-group row ml-4">
            <label for="exampleInputEmail1">Link</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Link da aula" 
            value="<?= isset($Post['link'])? $Post['link']: '' ?>">
        </div>
        <div class="form-group row ml-4">
            <label for="exampleInputEmail1">Aulas</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Nome das aulas" 
            value="<?= isset($Post['lesson'])? $Post['lesson']: '' ?>">
        </div> 
        <input type="submit" class="btn btn-success mb-2 ml-4" name="register_matricula" value="Matricular">
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>