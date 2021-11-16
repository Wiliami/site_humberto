<?php 

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>

        <!-- <header class="" style="height: 698px; width: 100%;">            
             <div class="overlay"></div>

            <img style="width: 100%;" src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de sobre">
            <div class="container my-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-start text-center text-xl-start">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="display-5 fw-bolder text-white mb-2">Esta é uma <br /> plataforma de <br /> evangelismo online.</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Comece um tour pelo site<br /> e saiba como funciona o evangelismo web.</p>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <a class="btn btn-success btn-lg px-4 me-sm-3" href="login">Começar</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="/">Saiba mais</a> 
                    </div>
                </div>
            </div>

        </header> -->



        <header class="header-2" style="height: 698px;">
            <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/page-youtube1.jpg')">
                <span class="mask bg-gradient-primary opacity-4"></span>
                <div class="container">
                    <div class="row">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Esta é uma <br /> plataforma de <br /> evangelismo online.</h1>
                            <p class="lead text-white mt-3">Comece um tour pelo site<br /> e saiba como funciona o evangelismo web.</p>
                        </div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?= BASE ?>/cadastro">Começar</a>
                        </div>  
                    </div>
                </div>
            </div>
        </header>


        


        <?php

        $Component = new Component();
        echo $Component->getFooterExampleTest();

        ?>


    </body>
</html>