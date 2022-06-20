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
        $Read->FullRead("SELECT m.*, c.curso_titulo, c.curso_descricao, c.curso_img
            FROM matriculas_cursos m 
            LEFT JOIN users u ON u.user_id = m.user_id
            LEFT JOIN cursos c ON c.curso_id = m.curso_id 
            WHERE m.user_id = :ui", "ui={$userId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $DataMatriculas) {
                // Check::var_dump_json($DataMatriculas);
                ?>
        <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course=<?= $DataMatriculas['curso_id'] ?>">
            <div class="col-lg-4 mb-5">

                <div class="card" style="width: 18rem;">
                <?php
                    if($DataMatriculas['curso_img']) {
                        ?>
                    <img style="width: 220; height: 270px;" class="card-img-top" src="<?= BASE ?>/uploads/<?= $DataMatriculas['curso_img']; ?>" alt="Banner do curso">
                <?php
                    } else {
                        ?>
                    <img style="width: 220; height: 270px;" class="img-thumbnail" src="<?= BASE ?>/assets/images/image-not-found.png" />
                <?php
                    }
                ?>
                </div>
                <a href="" class="card-body text-dark">
                    <h5 class="card-title"><?= $DataMatriculas['curso_titulo'] ?></h5>
                    <p class="card-text"><?= $DataMatriculas['curso_descricao'] ?></p>
                </a>
            </div>
        </a>
        <?php
            }
        } else {
            ?>
            <div class="alert alert-primary d-block" role="alert">
                Você ainda não possui cursos! 
                <a href="<?= BASE ?>/painel/dashboard">Ver cursos</a>
            </div>
        <?php
        }
        ?>
    </div> 
</div>
<?= $Component->getFooterDashboard(); ?>