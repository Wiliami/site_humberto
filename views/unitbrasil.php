<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNITBRASIL</title>
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


<?php 

$Component = new Component();
echo $Component->getMenu();

?>


    <header class="bg-dark py-5" style="height: 698px;">
       
        <!--This div is intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
            
        <!-- <div class="overlay"></div> -->

        <!-- The HTML5 video element that will create the background video on the header -->


        <!-- <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="background-image: url('https://mdbootstrap.com/img/new/fluid/nature/015.jpg'); height: 100vh;">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">UNITBRASIL: <br/>Descubra um mundo <br/>da facilidades ao <br/>estudar no exterior</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Conheça mais sobre a <br /> Unitbrasil acessando o nosso site!</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="login">Acessar site!</a>
                </div>  
            </div>
            </div>
        </div>
        </div> -->


        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Descubra um mundo <br/>da facilidades ao <br/>estudar no exterior</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Conheça mais sobre a <br /> Unitbrasil acessando o nosso site!</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://www.unitbrasil.com/">Visitar UNITBRASIL!</a>
                </div>  
                </div>  
            </div>
        </div>

    </header>



<?php 

$Component = new Component();
echo $Component->getFooter();

?>

