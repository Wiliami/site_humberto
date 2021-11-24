<?php 

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>

        <!-- <header class="" style="height: 698px; width: 100%;">            
        
            -------- START HEADER 1 w/ text and image on right ------- -->
        <!-- <header>
        <div class="page-header min-vh-100" style="background-image: url('<?= BASE ?>/src/images/page-youtube1.jpg'); height: 698px;" loading="lazy">
            <span class="mask bg-gradient-dark opacity-5"></span>
            <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
                <h1 class="text-white mb-4">Plataforma de <br />evangelismo <br /> online.</h1>
                <p class="text-white opacity-8 lead pe-5 me-5">Comece um tour pelo site<br /> e saiba como funciona o evangelismo web.</p>
                <div class="buttons">
                    <button type="button" class="btn btn-white mt-4">Começar</button>
                    <button type="button" class="btn text-white shadow-none mt-4">Leia mais</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </header> -->
        <!-- -------- END HEADER 1 w/ text and image on right ------- -->

  


        <div class="overlay"></div>
        <header class="header-2" style="height: 698px;">
            <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/page-youtube1.jpg')">
                <span class="mask bg-gradient-primary opacity-4"></span>
                <div class="container">
                    <div class="row">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br />evangelismo <br /> online.</h1>
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