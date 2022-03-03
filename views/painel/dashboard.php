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
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800">Seja bem-vindo(a), <?= $_SESSION['login']['user_name'] ?></h1>
    </div>
    <?php
    if($_SESSION['login']['user_level'] <= 2) {
        ?>
    <p class="ml-4">Cursos que já estão disponíveis</p>
    <div class="row gx-5 container">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM cursos");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Cursos) {
                ?>
        <div class="col-lg-4 mb-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= BASE ?>/src/images/backstage_data.png" alt="banner do curso">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $Cursos['curso_titulo'] ?></h5>
                <p class="card-text"><?= $Cursos['curso_descricao'] ?></p>
                <a href="<?= BASE ?>/painel/profile/compra-curso" class="text-black">R$<?= number_format($Cursos['curso_valor'], 2, ',', '.') ?></a>
            </div>
        </div>
        <?php
            }
        } else {
            Error("Não existem cursos para serem exibidos aqui!");
        }
        ?>
    </div>
    <?php
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>