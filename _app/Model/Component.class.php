<?php

class Component {
    public function getMenu ($MenuActive = 'index') {
        return "
        <div class=\"container\">
            <nav class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3\">
                <a href='" . BASE . "'>Logo</a>

                    <ul class=\"nav col-12 col-md-auto mb-2 justify-content-center mb-md-0\">
                        <li><a href='" . BASE . "' class=\"nav-link px-2 link-secondary\">Home</a></li>
                        <li><a href='" . BASE . "/sobre' class=\"nav-link px-2 link-secondary\">Sobre</a></li>
                        <li><a href='" . BASE . "/contato' class=\"nav-link px-2 link-secondary\">Contato</a></li>
                        <li><a href='" . BASE . "/conteudo' class=\"nav-link px-2 link-secondary\">Conteúdo</a></li>
                        <li><a href='" . BASE . "/unitbrasil' class=\"nav-link px-2 link-secondary\">Unitbrasil</a></li>
                    </ul>


                    <div class=\"col-md-3 text-end\">
                        <a href='" . BASE . "/cadastro' type=\"button\" class=\"btn me-2\">Cadastrar</a>
                        <a href=" . BASE . "/login type=\"button\" class=\"btn btn-warning\">Login</a>
                    </div>
            </nav>
        </div>
        ";
    }
    

    public function getHeader() {
        return '
        <header class="bg-white py-5" style="height: 698px;">
       
            <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
            
            <div class="overlay"></div>

            <!-- The HTML5 video element that will create the background video on the header -->
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
            </video>

        
            <div class="container h-100">
                 <div class="d-flex h-100 text-center align-items-center">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Plataforma de <br /> evangelismo online <br />e desenvolvimento<br /> pessoal.</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Comece um tour pelo site<br /> e saiba como funciona o evangelismo web.<br /> Faça o seu login!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-warning btn-lg px-4 me-sm-3" href="login">Começar</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#content-overview">Saiba mais</a>
                        </div>  
                    </div>
                </div>
            </div>

        </header>
        ';
    }



    public function getFooter() {
        return '
                <!-- Footer -->
                <div class="container my-5">
                    <footer class="bg-dark text-center text-lg-start text-white">

                        <div class="container p-4 w-100">

                            <div class="row my-4">

                                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                                        <!-- <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style={{ width: 150, height: 150}}>
                                            <img height="70" alt="" loading="lazy" /> 
                                        </div> -->


                                    <p class="text-center">Pr. Humberto Oliveira</p>

                                    <ul class="list-unstyled d-flex flex-row justify-content-center">
                                        <li>
                                            <a class="text-white px-2" href="/">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-white px-2" href="/">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-white ps-2" href="/">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                    <h5 class="text-uppercase mb-4">Parcerias</h5>

                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>unitplus</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>Igreja Adventista do sétimo dia</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>unitbrasil</a>
                                        </li>
                                       

                                    </ul>
                                </div>


                                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                    <h5 class="text-uppercase mb-4">Sobre</h5>

                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>Ministério Pastoral</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>Contato pessoal</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>Agenda</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>Eventos</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/" class="text-white"><i class="fas fa-paw pe-3"></i>Curiosidades</a>
                                        </li>

                                    </ul>
                                </div>


                                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                    <h5 class="text-uppercase mb-4">Contato</h5>

                                    <ul class="list-unstyled">
                                        <li>
                                            <p><i class="fas fa-map-marker-alt pe-2"></i>Amazonas, Av. Timbiras, 0000, Manaus </p>
                                        </li>
                                        <li>
                                            <p><i class="fas fa-phone pe-2"></i>(55) 92 99999-9999</p>
                                        </li>
                                        <li>
                                            <p><i class="fas fa-envelope pe-2 mb-0"></i>unitbrasil@.com</p>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>



                        <div class="text-center p-3 btn-primary">
                            © 2021 Copyright:
                            <a class="text-white" href="/">unitbrasil.com</a>
                        </div>

                    </footer>

                </div>
            </html>
        ';
    } 

    public function getLogo () {
        return '
        <div class=\"container\">
            <nav class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3\">
                <a href=" . BASE . ">Logo</a>
            </nav>
        </div>
        ';
    }


    public function getHeadHtml () {
        return '
        <!DOCTYPE html>
        <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Página Principal</title>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
                <link rel="stylesheet" href="' . BASE . '/src/css/index.css" type="text/css">
        
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
            </head>
        
        ';
    }



}