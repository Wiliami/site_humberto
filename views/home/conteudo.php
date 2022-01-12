<?php
$Component = new Component();
echo $Component->getHeadHtmlHome();
echo $Component->getMenu();
?>
<header class="header-2">
    <div class="page-header min-vh-100 relative"
        style="background-image: url('<?= BASE ?>/src/images/page-youtube1.jpg')">
        <span class="mask bg-gradient-secondary opacity-4"></span>
        <div class="container">
            <div class="row">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Junte-se a nós!</h1>
                    <p class="lead text-white mt-3">Se inscreva em nosso canal <br> do youtube para acompanhar <br>
                        novos conteúdos!</p>
                </div>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3"
                        href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">INSCREVA-SE NO CANAL</a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-sm-7 py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto text-center text-xl-start">
                <div class="mt-n8 mt-md-n9 text-start">
                    Produção de conteúdos para o Youtube
                </div>
                <div class="row py-5">
                    <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <!-- Title -->
                            <h3 class="mb-0">Conteúdo através da mídia</h3>
                        </div>
                        <p class="text-lg mb-0 text-start">
                        Acreditamos que as mídias sociais têm o poder de impulsionar conteúdos relevantes para as
                        pessoas. Então, usamos esta ferramenta de divulgação de conteúdos, o youtube, para criar e postar conteúdos de qualidade.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vídeos background -->
<section class="py-5 bg-white">
    <div class="container px-5 my-5">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h3 class="mb-0">Últimos vídeos lançados</h3>
        </div>
        <div class="row gx-5">
            <div class="col-lg-4 mb-5">
                <div class="d-flex align-items-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/NqS42PgzG00" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <div class="d-flex align-items-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/RIDwf9LZP0M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <div class="d-flex align-items-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/YJswtuiYLNc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <div class="d-flex align-items-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/x15_wgECOSg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <div class="d-flex align-items-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/uhuDxPtoYyo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <div class="d-flex align-items-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/6n58QTH3xLc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $Component->getFooterHome(); ?>