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
    <!-- container-fluid -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seja bem-vindo(a), <?= $_SESSION['login']['user_name'] ?></h1>
    </div>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Imagem de capa do card">
        <div class="card-body">
            <h5 class="card-title">Nome do curso</h5>
            <p class="card-text">Descrição do curso</p>
            <a href="#" class="btn btn-primary">Valor do curso</a>
        </div>
    </div>

</div>
<?= $Component->getFooterDashboard(); ?>