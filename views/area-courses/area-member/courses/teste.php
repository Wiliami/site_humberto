<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card bg-dark text-white">
        <!-- <img class="card-img" src="..." alt="Card image"> -->
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
        </video>
        <div class="card-img-overlay">
            <h5 class="card-title">Plataforma de <br /> evangelismo online <br />edesenvolvimento <br>pessoal.</h5>
            <p class="card-text">Comece um tour pelo site<br /> e saiba como funciona o<br> evangelismo web.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>