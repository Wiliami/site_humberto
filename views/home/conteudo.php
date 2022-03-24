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
                    <img src="<?= BASE ?>/src/images/youtube-white.png"
                        class="d-sm-flex justify-content-sm-center justify-content-xl-start" alt="youtube logo"
                        style="height: 200px; width: 300px;">
                    <h1 class="display-5 fw-bolder text-white mb-2">Junte-se a nós!</h1>
                    <p class="lead text-white mt-3">
                    Se inscreva em nosso canal <br>
                    do youtube para acompanhar <br>
                    novos conteúdos!
                    </p>
                </div>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3"
                        href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">INSCREVA-SE NO CANAL</a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="header-2 mt-4">
    <div class="page-header min-vh-100 relative">
        <span class="mask opacity-4"></span>
        <div class="container">
            <div class="row">
                <div class="my-5 text-center text-xl-start">
                    <h3 class="mb-0">Conteúdo através da mídia</h3>
                </div>
                <p class="text-lg mb-0">
                Acreditamos que as mídias sociais têm o poder<br> de impulsionar conteúdos relevantes para as
                pessoas. <br>Então, usamos esta ferramenta de divulgação de conteúdos,<br> o youtube, para criar e
                postar conteúdos de qualidade.
                </div>
                <div class="d-grid gap-3 d--flsmex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" style="margin-top: 10px;" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">Canal no youtube</a>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Vídeos background -->
<section class="py-5 bg-white">
    <div class="container px-5 my-5">
        <div class="d-flex justify-content-start align-items-center mb-2">
            <span class="fw-bolder text-dark"> Lançamentos | Confira os vídeos mais recentes do canal</span>
        </div>
        <div class="row gx-5">
            <div class="col-lg-4 mb-5">
                <div class="d-flex align-items-center">
                    <iframe width="360" height="215" src="https://www.youtube.com/embed/NqS42PgzG00"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="d-flex align-items-center border-1">
                    <iframe width="360" style="border-radius: 7;" height="215"
                        src="https://www.youtube.com/embed/RIDwf9LZP0M" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="d-flex align-items-center">
                    <iframe width="360" height="215" src="https://www.youtube.com/embed/YJswtuiYLNc"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="my-5 py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                <div class="front front-background">
                    <header class="bg-white py-5">
                        <div class="overlay"></div>
                        <div class="container h-100">
                            <div class="d-flex h-100 text-center align-items-center mt-3">
                                <div class="my-5 text-center text-xl-start">
                                    <h1 class="display-5 fw-bolder text-dark mb-2">Eventos</h1>
                                    <p class="lead fw-normal text-dark-50 mb-4">Camporee de Conquistadores realizado em
                                        23 de outubro de 2021 na Venezuela</p>
                                    <div
                                        class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                        <!-- <a class="btn btn-warning btn-lg px-4 me-sm-3" href=" ' . BASE . '/cadastro">Começar</a> -->
                                        <a class="btn btn-danger btn-lg px-4"
                                            href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg/videos">Acesse
                                            a playlist</a>
                                        <!-- <div class="justify-content-sm-center justify-content-xl-end">
                                        <a class="btn btn-success text-black btn-lg px-4" href="/">Suporte</a>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="col-lg-6 ms-auto">
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <div class="info">
                            <iframe width="260" height="215" src="https://www.youtube.com/embed/j2WfAqpYnM4"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info">
                            <iframe width="260" height="215" src="https://www.youtube.com/embed/x15_wgECOSg"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start mt-5">
                    <div class="col-md-6 mt-3">
                        <iframe width="260" height="215" src="https://www.youtube.com/embed/YJswtuiYLNc"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="info">
                            <iframe width="260" height="215" src="https://www.youtube.com/embed/uhuDxPtoYyo"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $Component->getFooterHome(); ?>