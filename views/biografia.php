<!DOCTYPE html>
<html lang="pt-BR" itemscope itemtype="http://schema.org/WebPage">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
            Page | Biografia
        </title>
        <!--     Fonts and icons     -->
        <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> -->
        <!-- Nucleo Icons -->
        <link href="<?= BASE ?>/src/css/nucleo-icons.css" rel="stylesheet" />
        <link href="<?= BASE ?>/src/css/nucleo-svg.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= BASE ?>/src/css/footer.css" type="text/css">

        <!-- Font Awesome Icons -->
        <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
        <!-- Material Icons -->
        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"> -->
        <!-- CSS Files -->
        <link id="pagestyle" href="<?= BASE ?>/src/css/material-kit.css?v=3.0.0" rel="stylesheet" />
    </head>
    

    <body class="blog-author bg-gray-200">


        <?php

            $Component = new Component();
            echo $Component->getMenu();

        ?>
    
        <header>
            <div class="page-header min-height-400" style="background-image: url('<?= BASE ?>/src/images/humberto-background-bio.jpeg');" loading="lazy">
            <span class="mask bg-gradient-dark opacity-8"></span>
            </div>
        </header>
        <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
        <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
            <!-- START Testimonials w/ user image & text & info -->
            <section class="py-sm-7 py-5 position-relative">
            <div class="container">
                <div class="row">
                <div class="col-12 mx-auto">
                    <div class="mt-n8 mt-md-n9 text-center">
                    <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?= BASE ?>/src/images/humberto.png" alt="humberto" loading="lazy">
                    </div>
                    <div class="row py-5">
                    <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="mb-0">Humberto Oliveira</h3>
                        <div class="d-block">
                            <a href="https://www.facebook.com/educacaoetreinamentos/" type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Siga-me</a>
                        </div>
                        </div>
                        <div class="row mb-4">
                        <div class="col-auto">
                            <span class="h6">323</span>
                            <span>Postagens</span>
                        </div>
                        <div class="col-auto">
                            <span class="h6">3.5k</span>
                            <span>Seguidores</span>
                        </div>
                        <div class="col-auto">
                            <span class="h6">260</span>
                            <span>Seguindo</span>
                        </div>
                        </div>
                        <p class="text-lg mb-0">
                        No último sábado, 30 de outubro, a liderança da Igreja Adventista da região sudoeste 
                        paulista, realizou a cerimônia de ordenação ao Ministério Pastoral dos pastores Thiago da
                        Silva Monteiro e Joel Gomes de Sousa. O evento aconteceu na Igreja Central de Sorocaba e 
                        contou com a presença de líderes paulista da Igreja Adventista, parentes, amigos, pastores e
                        membros de outros distritos.. <br><a href="javascript:;" class="text-info icon-move-right">Mais sobre mim
                            <i class="fas fa-arrow-right text-sm ms-1"></i>
                        </a>
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        
        </div>
        <section class="py-lg-5">
            <div class="container">
            <div class="row">
                <div class="col">
                <div class="card box-shadow-xl overflow-hidden mb-5">
                    <div class="row">
                    <div class="col-lg-5 position-relative bg-cover px-0" style="background-image: url('../assets/img/examples/blog2.jpg')" loading="lazy">
                        <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                        <div class="mask bg-gradient-dark opacity-8"></div>
                        <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                            <h3 class="text-white">Informação de contato</h3>
                            <p class="text-white opacity-8 mb-4">Preencha o formulário e nossa equipe irá entrar em contato com você em 24h.</p>
                            <div class="d-flex p-2 text-white">
                            <div>
                                <i class="fas fa-phone text-sm"></i>
                            </div>
                            <div class="ps-3">
                                <span class="text-sm opacity-8">(92) 99999-9999</span>
                            </div>
                            </div>
                            <div class="d-flex p-2 text-white">
                            <div>
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                            <div class="ps-3">
                                <span class="text-sm opacity-8">humberto@contato.com</span>
                            </div>
                            </div>
                            <div class="d-flex p-2 text-white">
                            <div>
                                <i class="fas fa-map-marker-alt text-sm"></i>
                            </div>
                            <div class="ps-3">
                                <span class="text-sm opacity-8">Manaus, AM 69090-090</span>
                            </div>
                            </div>
                            <div class="mt-4">
                            <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Facebook">
                                <i class="fab fa-facebook"></i>
                            </button>
                            <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Twitter">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Dribbble">
                                <i class="fab fa-dribbble"></i>
                            </button>
                            <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Instagram">
                                <i class="fab fa-instagram"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form class="p-3" id="contact-form" method="post">
                        <div class="card-header px-4 py-sm-5 py-3">
                            <h2>Diga olá!</h2>
                            <p class="lead"> Gostaríamos de conversar com você.</p>
                        </div>
                        <div class="card-body pt-1">
                            <div class="row">
                            <div class="col-md-12 pe-2 mb-3">
                                <div class="input-group input-group-static mb-4">
                                <label>Meu nome é</label>
                                <input type="text" class="form-control" placeholder="Nome completo">
                                </div>
                            </div>
                            <div class="col-md-12 pe-2 mb-3">
                                <div class="input-group input-group-static mb-4">
                                <label>Estou procurando por</label>
                                <input type="text" class="form-control" placeholder="O que você ama">
                                </div>
                            </div>
                            <div class="col-md-12 pe-2 mb-3">
                                <div class="input-group input-group-static mb-4">
                                <label>Sua mensagem</label>
                                <textarea name="message" class="form-control" id="message" rows="6" placeholder="O que eu quero dizer"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 text-end ms-auto">
                                <button type="submit" class="btn bg-gradient-info mb-0">Enviar mensagem</button>
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        

        <?php 

            $Component = new Component();
            echo $Component->getFooterExampleTest();

        ?>
        <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
        <!--   Core JS Files   -->
        <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
        <script src="../assets/js/plugins/parallax.min.js"></script>
        <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
        <script src="../assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>

    </body>
</html>


