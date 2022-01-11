<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seja bem-vindo(a), <?= $_SESSION['login']['user_name'] ?></h1>
    </div>
    <p>Conteúdo</p>
</div>
<?= $Component->getFooterDashboard(); ?>