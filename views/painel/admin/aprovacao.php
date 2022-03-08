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
$AprovCourse = $_GET['aprovacao'];
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Detalhes de aprovação de cursos</h1>
    </div>
    <p class="ml-0">Aprovação de cursos</p>
    <form action="" method="post">
        <div class="form-group">
            <label for="inputPassword">Curso</label>
            <input type="text" class="form-control" placeholder="Nome do curso" name="course" id="inputPassword" value="<?= isset($Post['course'])? $Post['course']: '' ?>">
        </div>
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>