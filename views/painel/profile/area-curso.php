<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
?>
<head>
    <link rel="stylesheet" href="<?= BASE ?>/src/css/index.css" type="text/css">
</head>
<!-- <div class="container">
    <div class="d-sm-flex aligen-items-center justify-content-between mb-4 ml-4">
        <h1 class="h5 mb-0 text-gray-800">Título do curso</h1>      
    </div>
    <p class="ml-4">Descrição do curso</p>
</div> -->
<?= $Component->getMenu(); ?>


<header class="bg-white py-5">
        <div class="overlay"></div>
     
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br /> evangelismo online <br />e
                        desenvolvimento <br>pessoal.</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Comece um tour pelo site<br /> e saiba como funciona o
                        <br> evangelismo web.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-warning btn-lg px-4 me-sm-3" href="<?= BASE ?>/pages/cadastro">Começar</a>
                        <a class="btn btn-outline-warning" href="#content-overview">Saiba mais</a>
                        <!-- <div class="justify-content-sm-center justify-content-xl-end">
                                <a class="btn btn-success text-black btn-lg px-4" href="/">Suporte</a>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
<?= $Component->getFooterDashboard(); ?>