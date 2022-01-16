<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<!-- Conteúdo que vai ser exibido -->
<div class="container-fluid">
    <!-- ***Page Heading*** -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Configuração</h1>
    </div>
        <p>Página de configuração</p>
</div>
<?php
echo $Component->getFooterDashboard();
?>


       