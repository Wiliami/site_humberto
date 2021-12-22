<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
echo $Component->getBarraMenuOptions();
?>
<!-- Conteúdo que vai ser exibido na dashboard -->
<!-- ***Begin Page Content*** -->
<div class="container-fluid">
    <!-- ***Page Heading*** -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Generate Report
            </a> 
        
    </div>
    <p>Conteúdo da dashboard</p>
</div>

<!-- /.container-fluid -->
<?php
echo $Component->getFooterDashboard();
?>
           
