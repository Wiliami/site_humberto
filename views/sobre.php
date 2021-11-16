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
            <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/humberto-background.jpeg')">
                <span class="mask bg-gradient-primary opacity-4"></span>
                <div class="container">
                    <div class="row">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Esta é uma <br /> plataforma de <br /> evangelismo online.</h1>
                            <p class="lead text-white mt-3">Comece um tour pelo site<br /> e saiba como funciona o evangelismo web.</p>
                        </div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/">Começar</a>
                        </div>  
                    </div>
                </div>
            </div>
        </header>




        <header class="bg-white py-5" style="height: 698px;">
       
            <!-- This div is intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
            
            
            <!-- The HTML5 video element that will create the background video on the header -->
            <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
            </video> -->
            
            
            <div class="overlay"></div>
            
            <div class="container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br /> evangelismo online <br />e desenvolvimento<br /> pessoal.</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Saiba como funciona o evangelismo web.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-warning btn-lg px-4 me-sm-3" href="login">Começar</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#content-overview">Saiba mais</a>
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