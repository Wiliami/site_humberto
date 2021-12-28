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
        <h1 class="h3 mb-0 text-gray-800">Suporte</h1>
    </div>
        <p>Em que podemos te ajudar?!</p>
</div>
<?php
echo $Component->getFooterDashboard();
?>