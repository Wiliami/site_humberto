        <?php 

            $Component = new Component();
            echo $Component->getHeadHtmlPro();
            echo $Component->getMenu();

        ?>


        <header class="header-2">
            <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/page-youtube.jpg')">
                <span class="mask bg-gradient-secondary opacity-4"></span>
                <div class="container">
                    <div class="row">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br />evangelismo <br /> online.</h1>
                            <p class="lead text-white mt-3">Já conhece o evangelismo web?<br />Se cadastre e saiba como<br> funciona o evangelismo web!</p>
                        </div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-info btn-lg px-4 me-sm-3" href="<?= BASE ?>/cadastro">Começar</a>
                        </div>  
                    </div>
                </div>
            </div>
        </header> 


        <?php

            $Component = new Component();
            echo $Component->getFooterHomeTeste();

        ?>
        
    </body>
</html>