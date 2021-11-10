<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE ?>/src/css/index.css" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php
    
    $Component = new Component();

    echo $Component->getMenu();
    echo $Component->getHeader();

    ?>



    <!-- conteúdo principal -->
    <main class="flex-shrink-0" id="content-overview">

        <section class="py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-black mb-2">Pr. Humberto Oliveira</h1>
                            <p class="lead fw-normal text-black-50 mb-4">Além de ser Empresário e Professor, Pr.
                                Humberto Oliveira dedica também parte do seu tempo para o evangelismo e ministério
                                pastoral.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-outline-dark btn-lg px-4" href="<?= BASE ?>/biografia">Leia a minha
                                    história</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5 bg-warning rounded-circle w-290 h-290" src="<?= BASE ?>/src/images/humberto.png" alt="image de Humberto Oliveira" />
                    </div>


                </div>
            </div>
        </section>



        <!-- Cursos box -->
        <section class="py-5 bg-white" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">

                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100" id="cursos">
                                <div class="feature bg-warning bg-gradient text-black rounded-3 mb-3"><i
                                        class="bi bi-collection"></i>
                                    <h2 class="h5">Religião</h2>
                                    <p class="mb-0">Trabalhamos para constituir uma trajetória sólida com base em
                                        valores éticos e morais, com a finalidade de formar cidadãos como você.</p>
                                </div>

                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-building"></i>
                                    <h2 class="h5">Família</h2>
                                    <p class="mb-0">Este curso aborda a importância da família na educação de crianças e
                                        jovensalém de mostrar o papel decisivo desta influência ao longo de toda vida
                                        escolar para o crescimento dos filhos.</p>
                                </div>

                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-toggles2"></i>
                                    <h2 class="h5">Vida financeira</h2>
                                    <p class="mb-0">Estude o curso de Planejamento Financeiro Familiar Grátis com
                                        certificado válido em todo Brasil. Curso grátis online de Planejamento
                                        Financeiro Familiar.</p>
                                </div>

                            </div>
                            <div class="col h-100">
                                <div class="feature bg-warning bg-gradient text-black rounded-3 mb-3"><i
                                        class="bi bi-toggles2"></i>
                                    <h2 class="h5">Vida conjugal</h2>
                                    <p class="mb-0">Neste curso você conhecerá as bases do casamento ao modo de Deus.
                                        Serão ministradas disciplinas como:
                                        <li>A aliança do casamento;</li>
                                        <li>O propósito de Deus para o casamento.</li>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">Cursos | Palestras</h2>
                        <p class="lead fw-normal text-black-50 mb-4">Os cursos oferecidos abrange todas as áreas e
                            oferecem amplo conhecimento.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-outline-dark btn-lg px-4" href="cursos">Saiba mais!</a>
                        </div>
                    </div>


                </div>
            </div>
        </section>



        <!-- Carousel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= BASE ?>/src/images/man-speaker-post.jpg"
                        alt="imagem de palestra" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Como ser uma pessoa confiante?</h5>
                        <p>Saiba quais são as melhores ferramentas sobre perfomance e influência social.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= BASE ?>/src/images/man-speech.jpg" alt="imagem de palestra" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Família, vida financeira e social.</h5>
                        <p>Saiba como ter uma feliz nessas três áreas importantes.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= BASE ?>/src/images/speech-post.jpg" alt="imagem de palestra" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Religião e Ciência</h5>
                        <p>Qual a relação da Religião com a Ciência.</p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>





        <section class="py-5 bg-white">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Conheça os nosso cursos</h2>
                            <p class="lead fw-normal text-muted mb-5">Cursos em diversas áreas</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <video class="card-img-top" muted>
                                <source type="video/mp4" />
                            </video>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                                <a class="text-decoration-none link-dark stretched-link" href="/">
                                    <h5 class="card-title mb-3">Técnicas e perfomance.</h5>
                                </a>
                                <p class="card-text mb-0">Saiba como falar em público e como dominar a timidez na hora
                                    de se expressar para as pessoas.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3"
                                            src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">unitbrasil</div>
                                            <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="card-img-top">
                                <video class="card-img-top" muted>
                                    <source type="video/mp4" />
                                </video>
                            </div>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                                <a class="text-decoration-none link-dark stretched-link" href="/">
                                    <h5 class="card-title mb-3">Vida financeira</h5>
                                </a>
                                <p class="card-text mb-0">Como ter uma vida financeira equilibrada e como ter foco e
                                    resultados na área mais desafiadora do ser humano.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3"
                                            src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">unitbrasil</div>
                                            <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="card-img-top">
                                <video class="card-img-top" muted>
                                    <source type="video/mp4" />
                                </video>
                            </div>




                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Curso</div>
                                <a class="text-decoration-none link-dark stretched-link" href="/">
                                    <h5 class="card-title mb-3">Propósito e carreira</h5>
                                </a>
                                <p class="card-text mb-0">Conheça as principais ferramentas que pessoas bem sucedidas
                                    utilizam para uma vida de propósito.</p>
                            </div>

                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3"
                                            src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">unitbrasil</div>
                                            <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Button -->
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center">
                        <a class="btn btn-warning btn-lg px-4 me-sm-3" href="<?= BASE ?>/pagevideo">Veja todos os
                            cursos</a>
                    </div>

                </div>
            </div>
        </section>



        <!-- Comentários -->
        <section class="testimonials text-center">
            <div class="container">
                <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center">
                    <a class="btn btn-outline-dark btn-lg px-4 me-sm-3" href="/">Feedback</a>
                </div> -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3 h-20 w-20"
                                src="<?= BASE ?>/src/images/andre-sebastian.jpg" alt="imagem de André Silva"
                                style="height: 50px; width: 50px;" />
                            <h5>André Silva</h5>
                            <p class="font-weight-light mb-0">"O conteúdo é muito bom! Muito obrigado, pessoal!."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="<?= BASE ?>/src/images/lauren.jpg"
                                alt="imagem de Lauren" style="height: 50px; width: 50px;" />
                            <h5>Lauren Fontes</h5>
                            <p class="font-weight-light mb-0">"Agradeço muito pela incentivo e aprendizado."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3"
                                src="<?= BASE ?>/src/images/stephanie-liverani.jpg" alt="imagem de Stephanie"
                                style="height: 50px; width: 50px;" />
                            <h5>Sarah W.</h5>
                            <p class="font-weight-light mb-0">"Muito obrigado por disponibilizar esses conteúdos aqui!."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <?php
    
    $Component = new Component();
    echo $Component-> getFooter();
    ?>

</body>

</html>