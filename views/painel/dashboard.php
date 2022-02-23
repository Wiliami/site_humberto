<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seja bem-vindo(a), <?= $_SESSION['login']['user_name'] ?></h1>
    </div>

    <div class="card" style="width: 18rem;">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM cursos");
        if($Read->getResult()) {
            foreach($Read->getResult() as $Cursos) {
                ?>
        <img class="card-img-top" src="<?= BASE ?>/src/images/" alt="Imagem de capa do card">
        <div class="card-body">
            <h5 class="card-title"><?= $Cursos['curso_titulo'] ?></h5>
            <p class="card-text"><?= $Cursos['curso_descricao'] ?></p>
            <a href="#" class="btn btn-success"><?= number_format($Cursos['curso_valor'], 2, ',', '.') ?></a>
        </div>
        <?php
            }
        } else {
            Error("Não exise cursos para exibir!");
        }
        ?>
    </div>

</div>
<?= $Component->getFooterDashboard(); ?>