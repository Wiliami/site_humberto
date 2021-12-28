<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
echo $Component->getBarraMenuOptions();
?>
<!-- Boas vindas ao usuário -->
<div class="container-fluid">
    <!-- ***Page Heading*** -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seja bem-vindo(a), <?= $_SESSION['login']['user_name'] ?></h1>
    </div>
</div>
<!-- Conteúdo que vai ser exibido -->
<div class="container-fluid">
    <!-- ***Page Heading*** -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-500">Dashboard</h1>
    </div>
        <p>Conteúdo</p>
</div>
<?php
echo $Component->getFooterDashboard();
?>
           
