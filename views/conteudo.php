    <?php

        $Component = new Component();
        echo $Component->getHeadHtmlPro();
        echo $Component->getMenu();
    
    ?>


    <header class="header-2">
            <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/page-youtube1.jpg')">
                <span class="mask bg-gradient-secondary opacity-4"></span>
                <div class="container">
                    <div class="row">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Junte se a nós!</h1>
                            <p class="lead text-white mt-3">Se inscreva em nosso canal <br> de youtube para acompanhar <br> novos conteúdos!</p>
                        </div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">INSCREVA-SE</a>
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





  