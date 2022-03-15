<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<!-- Slider Start -->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-xl-7">
            <div class="block">
                <div class="divider mb-3"></div>
                <span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
                <h1 class="mb-3 mt-3">Your most trusted health partner</h1>
                
                <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
                <div class="btn-container ">
                    <a href="<?= BASE ?>" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Make appoinment <i class="icofont-simple-right ml-2  "></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>