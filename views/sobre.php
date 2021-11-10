<?php 

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>

        <header class="" style="height: 698px; width: 100%;">            
             <div class="overlay"></div>

            <img style="width: 100%;" src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de sobre" type="video/mp4">
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

        </header>


        <?php

        $Component = new Component();
        echo $Component->getFooter();

        ?>


    </body>
</html>