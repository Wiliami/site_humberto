<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sobre</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= BASE ?>/src/css/index.css" type="text/css">
  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    </head>

    <body>

        <?php 

        $Component = new Component();
        echo $Component->getMenu();

        ?>

        <header class="" style="height: 698px; width: 100%;">            
             <div class="overlay"></div>

            <img style="width: 100%;" src="<?= BASE ?>/src/images/page-sobre.jpg" alt="imagem de sobre" type="video/mp4">
            <div class="container my-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-start text-center text-xl-start">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="display-5 fw-bolder text-white mb-2">Esta é uma <br /> plataforma de <br /> evangelismo online.</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Comece um tour pelo site<br /> e saiba como funciona o evangelismo web.</p>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <a class="btn btn-success btn-lg px-4 me-sm-3" href="login">Começar</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="/">Saiba mais</a> 
                    </div>
                </div>
            </div>

        </header>


        <?php

        $Component = new Component();
        echo $Component->getFooter();

        ?>


    </body>
</html>