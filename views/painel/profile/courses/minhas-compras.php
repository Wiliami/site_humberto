<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();  
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$userId =$_SESSION['login']['user_id'];
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-4 d-block">
        <h1 class="h5 mb-0 text-gray-800 ml-4">Minhas compras</h1>
    </div>
    <?php
    $Read = new Read();
    $Read->FullRead('SELECT *
        FROM purchase p
        WHERE user_id = :ui', "ui=$userId}");
    if($Read->getResult()) {
        foreach($Read->getResult() as $DataPurchaseUser) {
            ?>
    <a href="<?= BASE ?>/painel/profile/courses/lesson/area-course&course">
        <div class="col-lg-4 mb-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= BASE ?>/assets/images/backstage_data.png" alt="banner do curso">
            </div>
            <a href="" class="card-body text-dark">
                <h5 class="card-title"><?= $DataPurchaseUser['compra_curso']?></h5>
                <p class="card-text"><?= $DataPurchaseUser['compra_valor'] ?></p>
            </a>
        </div>
     </a>
     <?php
        }
    } else {
        Error('Compra não encontrada', 'warning');
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>