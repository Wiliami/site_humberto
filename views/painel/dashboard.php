<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
$Username = $_SESSION['login']['user_name'];
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="d-sm-flex flex-column mb-4 ml-4">
                <h1 class="h3">Painel</h1>  
                <h2 class="h5 mb-0 text-gray-800 mt-4">Seja bem-vindo(a), <?= $Username ?></h2>
            </div>
        </div>
        <div class="col-6">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0" method="POST">
                        <input type="search" class="form-control mr-sm-2" name="filter" placeholder="Pesquisar meus cursos" value="<?= (!empty($Post['filter']) ? $Post['filter'] : null) ?>" aria-label="Search">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Pesquisar</button>
                    </form>
                </div>
            </nav>
        </div>
    <!-- Fim da row -->
    </div>
    
    <?php
    if($_SESSION["login"]["user_level"] <= 2) {
        ?>
    <h3 class="h6 ml-4">Lançamentos de cursos</h3>
    <div class="row gx-5 container">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos");
        if($Read->getResult()) {
            foreach($Read->getResult() as $DataCourse) {
                ?>
        <a href="<?= BASE ?>/painel/profile/area-curso&curso=<?= $DataCourse['curso_id'] ?>">
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <?php
                    if($DataCourse['curso_img']) {
                        ?>
                    <img style="width: 220; height: 255px;" class="card-img-top" src="<?= BASE ?>/uploads/<?= $DataCourse['curso_img']; ?>" alt="banner do curso">
                    <?php
                    } else {
                        ?>
                    <img style="width: 220; height: 255px;" class="img-thumbnail" src="<?= BASE ?>/assets/images/image-not-found.png" />
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark"><?= $DataCourse['curso_titulo'] ?></h5>
                    <p class="card-text text-dark"><?= $DataCourse['curso_descricao'] ?></p>
                    <a href="<?= BASE ?>/painel/profile/area-curso" class="text-dark">R$<?= number_format($DataCourse['curso_valor'], 2, ',', '.') ?></a>
                </div>
            </div>
            <?php
                }
            } else {
                die(Error("Ainda não existem cursos", 'warning'));
            }
            ?>
        </a>
    </div>
    <?php
        }
    ?>
          

    <!-- Administrativo -->
    <?php
    if($_SESSION['login']['user_level'] >= 6 ) {
        ?>
    <p class="ml-4">Avisos sobre a plataforma</p>
    <?php
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>        