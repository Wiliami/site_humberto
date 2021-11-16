 <?php

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>



    <!-- <header class="bg-dark py-5" style="height: 698px;">

        <div class="overlay"></div>

       <img src="<?= BASE ?>/src/images/youtube-white.png" class="" style="width: 230px; height: 130px;"/> 

        <div class="container h-100">           

            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">           
                    <h1 class="display-5 fw-bolder text-white mb-2">Se inscreva no <br /> canal de <br />Humberto Oliveira.</h1>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-danger btn-lg px-4 me-sm-3" href="https://www.youtube.com/watch?v=ti4LSu-ro44">INSCREVA-SE NO CANAL</a>
                </div>  
                </div>
            </div>
        </div>


   </header> -->

   <header class="header-2" style="height: 698px;">
        <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/page-youtube.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-black mb-2">Junte-se a nós!</h1>
                        <p class="lead text-black mt-3">Se inscreva no canal de <br />Humberto Oliveira.</p>
                    </div>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-danger btn-lg px-4 me-sm-3" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">INSCREVA-SE</a>
                    </div>  
                </div>
            </div>
        </div>
    </header>


   <!-- <header class="" style="height: 698px;">            
    <div class="overlay"></div> -->
    
        <!--<img style="width: 100%;" src="<?= BASE ?>/src/images/page-youtube1.jpg" alt="imagem de sobre">
        <div class="container my-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-start text-center text-xl-start">
                <div class="col-lg-8 align-self-end">
                    <h1 class="display-5 fw-bolder text-white mb-2">Se inscreva no <br /> canal de <br /> Humberto Oliveira.</h1>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <a class="btn btn-danger btn-lg px-4 me-sm-3" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">INSCREVA-SE NO CANAL!</a>
                </div>
            </div>
        </div>

    </header> -->

   <?php 

    $Component = new Component();
    echo $Component->getFooter();

    ?>




  