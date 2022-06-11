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
    <div class="d-sm-flex flex-column mb-4 ml-4">
        <h1 class="h3">Painel</h1>  
        <h2 class="h5 mb-0 text-gray-800 mt-4">Seja bem-vindo(a), <?= $Username ?></h2>
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
            foreach($Read->getResult() as $Cursos) {
                ?>
        <a href="<?= BASE ?>/painel/profile/area-curso&curso=<?= $Cursos['curso_id'] ?>">
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= BASE ?>/src/images/medias-sociais.jpg" alt="banner do curso">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark"><?= $Cursos['curso_titulo'] ?></h5>
                    <p class="card-text text-dark"><?= $Cursos['curso_descricao'] ?></p>
                    <a href="<?= BASE ?>/painel/profile/area-curso" class="text-dark">R$<?= number_format($Cursos['curso_valor'], 2, ',', '.') ?></a>
                </div>
            </div>
            <?php
                }
            } else {
                Error("Ainda não existem cursos", 'warning');
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