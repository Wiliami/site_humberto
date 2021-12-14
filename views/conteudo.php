<?php
$Component = new Component();
echo $Component->getHeadHtmlReset();
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
<section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="row">
            <div class="col-12 mx-auto">
                <div class="mt-n8 mt-md-n9 text-center">
                    Produção de conteúdos para o Youtube
                </div>
                <div class="row py-5">
                <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto" style="margin-top: 20px;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="mb-0">Conteúdo através da mídia</h3>
                    </div>
                    <p class="text-lg mb-0">
                        Acreditamos que as mídias sociais têm o poder de implusionar conteúdos relevantes para pessoas. Então, usamos este canal de divulgação de conteúdos, o youtube, para anunciar o evangelho e preparar pessoas para reino celeste.  
                    </a>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
<?php
$Component = new Component();
echo $Component->getFooterHome();
?>
    </body>
</html>





  