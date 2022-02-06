<?php $Component = new Component(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Humberto Oliveira | Home</title>
        <!-- Estiliza o background do Header -->
        <link rel="stylesheet" href="<?= BASE ?>/src/css/index.css" type="text/css">
        <!-- Template oficial do projeto -->
        <link id="pagestyle" href="<?= BASE ?>/src/css/material-kit.css?v=3.0.0" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Esse css estiliza os ícones de redes sociais do footer index -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?= $Component->getMenu(); ?>
    <header class="bg-white py-5">
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br /> evangelismo online <br />e
                        desenvolvimento <br>pesssoal.</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Comece um tour pelo site<br /> e saiba como funciona o
                        <br> evangelismo web.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-warning btn-lg px-4 me-sm-3" href="<?= BASE ?>/pages/cadastro">Começar</a>
                        <a class="btn btn-outline-warning px-4 me-sm-3" href="#content-overview">Saiba mais</a>
                        <!-- <div class="justify-content-sm-center justify-content-xl-end">
                                <a class="btn btn-success text-black btn-lg px-4" href="/">Suporte</a>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="flex-shrink-0" id="content-overview">
        <!-- <section class="py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-black mb-2">Pr. Humberto Oliveira</h1>
                            <p class="lead fw-normal text-black-50 mb-4">
                                Humberto Oliveira é Empresário e Professor e dedica parte de seu tempo
                                para o ministério pastoral.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-dark btn-lg px-4"
                                    href="https://www.facebook.com/educacaoetreinamentos/">
                                    Facebook
                                    Leia a minha história
                                </a>
                            </div>
                        </div>
                    </div>
                    <img class="img-fluid rounded-3 my-5 bg-light rounded-circle" style="width: 295px; height: 270px;" src="<?= BASE ?>/src/images/perfil.png" alt="image de Humberto Oliveira" />
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img src="<?= BASE ?>/src/images/perfil.png" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
        </section> -->

        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="">
                        <div class="text-center"> <img src="<?= BASE ?>/src/images/humberto.png" alt="humberto" width="100" class="rounded-circle"> </div>
                        <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white">CEO</span>
                            <h5 class="mt-2 mb-0">Humberto Oliveira</h5> <span>Empresário • Palestrante • Educador • Coach • Administrador • Teólogo/Pr.</span>
                            <div class="px-4 mt-1">
                                <p class="fonts">"Atraímos pessoas quando nos preparamos <br> para resolver os problemas delas!".</p>
                            </div>
                            <ul class="d-flex flex-row ms-n3 justify-content-center" style="list-style: none;">
                                <li class="nav-item">
                                    <a class="nav-link pe-1" href="https://www.facebook.com/educacaoetreinamentos/" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    <a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pe-1" href="https://www.instagram.com/humberto.olliveira/" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pe-1" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg/featured" target="_blank">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="buttons">
                                <button class="btn btn-outline-primary px-4"><a href="<?= BASE ?>/home/page-profile" class="text-primary">Leia mais</a></button>
                                <button class="btn btn-primary px-4 ms-3"><a href="<?= BASE ?>/home/contato" class="text-white">Contato</a></button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <section class="py-5">  
            <div class="container px-5">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="mt-n8 mt-md-n9 text-center">
                            <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?= BASE ?>/src/images/humberto-oliveira.jpg" alt="humberto" loading="lazy">
                        </div>
                        <div class="row py-5">
                        <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mb-0">Humberto Oliveira</h3>
                        </div>
                            <p class="text-lg mb-0">
                            Em breve aqui será a biografia do Humberto
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section> -->
        <!-- Cursos box -->
        <section class="my-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                <div class="front front-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80); background-size: cover;">
                                    <div class="card-body py-7 text-center">
                                        <h3 class="text-white">Plataforma online</h3>
                                        <p class="text-white opacity-8">Esta é uma plataforma vérsatil para cursos
                                            completos para quem deseja trabalhar com o público e com a igreja.
                                            Conhecimento para conquistar seus objetivos.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Mais detalhes</h3>
                                        <p class="text-white opacity-8">Esta é uma plataforma vérsatil para cursos
                                            completos para quem deseja trabalhar com o público e com a igreja.
                                            Conhecimento para conquistar seus objetivos.</p>
                                        <a href="#area-comentários" target=""
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Saiba mais!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="fas fa-school"></i>
                                    <h5 class="font-weight-bolder mt-3">Deus</h5>
                                    <p class="pe-5">Trabalhamos para constituir uma trajetória sólida com base em
                                        valores éticos e morais, com a finalidade de formar cidadãos como você. </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="fas fa-home"></i>
                                    <h5 class="font-weight-bolder mt-3">Família</h5>
                                    <p class="pe-3">Este curso aborda a importância da família na educação de crianças e
                                        jovens além de mostrar o papel decisivo desta influência ao longo de toda vida
                                        escolar para o crescimento dos filhos.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-start mt-5">
                            <div class="col-md-6 mt-3">
                                <i class="fas fa-comments-dollar"></i>
                                <h5 class="font-weight-bolder mt-3">Vida financeira</h5>
                                <p class="pe-5">Estude o curso de Planejamento Financeiro Familiar Grátis com
                                    certificado válido em todo Brasil. Curso grátis online de Planejamento Financeiro
                                    Familiar.</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="info">
                                    <i class="fas fa-heart"></i>
                                    <h5 class="font-weight-bolder mt-3">Vida conjugal</h5>
                                    <p class="pe-3">Neste curso você conhecerá as bases do casamento segunda a Bíblia.
                                        Serão ministradas assuntos como:
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Àrea de cursos -->
        <!-- <section class="py-5 bg-white" id="page-course">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Conheça os nossos cursos</h2>
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
                                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
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
                                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
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
                                <div class="badge bg-success bg-gradient rounded-pill mb-2 text-white">Curso</div>
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
                        Button 
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-center">
                        <a class="btn btn-outline-dark btn-lg px-4 me-sm-3" href="<?= BASE ?>/page-video">Veja todos os
                            cursos
                        </a>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Comentários -->
        <section class="pb-5 position-relative bg-dark mx-n3" id="area-comentários">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-start mb-5 mt-5">
                        <h3 class="text-white z-index-1 position-relative">Comentários</h3>
                        <!-- <p class="text-white opacity-8 mb-0">O que estão falando desta plataforma.</p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg"
                                                src="<?= BASE ?>/src/images/rodrigo-oliveira.jpeg" alt="imagem">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Rodrigo Oliveira</h5>
                                        <h6 class="text-info">Unitbrasil</h6>
                                        <p class="mb-0">A Melhor plataforma de cursos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-lg-4 mt-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg"
                                                src="<?= BASE ?>/src/images/odelfrance-oliveira.jpg" alt="imagem">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Odelfrance Oliveira</h5>
                                        <h6 class="text-info">Unitbrasil</h6>
                                        <p class="mb-0">Os cursos serão de alto nível.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4 z-index-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg"
                                                src="<?= BASE ?>/src/images/lana-araujo.JPG" alt="imagem">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Lana Araújo</h5>
                                        <h6 class="text-info">Unitbrasil</h6>
                                        <p class="mb-0">A experiência será incrível!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-lg-4 mt-5 z-index-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg"
                                                src="<?= BASE ?>/src/images/josenias.JPG" style="width: 200px; height: 130px;" alt="imagem">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Josenias Santos</h5>
                                        <h6 class="text-info">Unitbrasil</h6>
                                        <p class="mb-0">Os conteúdos serão realmente incríveis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?= $Component->getFooterHome(); ?>