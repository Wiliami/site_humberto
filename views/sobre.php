<?php 
$Component = new Component();
echo $Component->getHeadHtmlHome();
echo $Component->getMenu();
?>
<div class="container">
    <header class="header-2">
        <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/assets/images/page-youtube.jpg')">
            <span class="mask bg-gradient-dark opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br />cursos online.</h1>
                        <p class="lead text-white mt-3">Já conhece os nossos cursos?<br />Em breve estaremos<br>disponibilizando os cursos nessa plataforma!</p>
                    </div>
                    <div class="d-grid gap-3 d--flsmex justify-content-sm-center justify-content-xl-start">
                        <!-- <a class="btn btn-info btn-lg px-4 me-sm-3" href="<?= BASE ?>/cadastro">Começar</a> -->
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
                        O objetivo desta plataforma é criar conteúdos<br>
                        exclusivos e cursos que em breve estaremos<br> disponibilizando aqui.
                    </div>
                    <div class="d-grid gap-3 d--flsmex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" style="margin-top: 10px;" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">Canal no youtube</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $Component->getFooterHome(); ?>