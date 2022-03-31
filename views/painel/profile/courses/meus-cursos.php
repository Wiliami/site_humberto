<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$Username = $_SESSION['login']['user_name'];
$userId = $_SESSION['login']['user_id'];
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4 d-block">
        <h1 class="h5 mb-0 text-gray-800 ml-4">Meus cursos</h1>
    </div>
    <div class="row gx-5 container">
        <?php
          $Read = new Read();
          $Read->FullRead("SELECT m.*, c.curso_titulo, c.curso_descricao
              FROM matriculas_cursos m 
              LEFT JOIN users u ON u.user_id = m.user_id
              LEFT JOIN cursos c ON c.curso_id = m.curso_id 
              WHERE m.user_id = :ui", "ui={$userId}");
          if($Read->getResult()) {
              foreach($Read->getResult() as $Mat) {
                  ?>
        <div class="col-lg-4 mb-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= BASE ?>/src/images/backstage_data.png" alt="banner do curso">
            </div>
            <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $Mat['curso_id'] ?>"class="card-body">
                <h5 class="card-title"><?= $Mat['curso_titulo'] ?></h5>
                <p class="card-text"><?= $Mat['curso_descricao'] ?></p>
            </a>
        </div>
        <?php
            }
        } else {
            Error("Cursos não encontrados", 'danger');
        }
        ?>
    </div>
    <div class="container">
        <a href="<?= BASE ?>/painel/dashboard" class="btn btn-success">Ver cursos</a>  
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>