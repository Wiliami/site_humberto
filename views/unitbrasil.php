<?php 

$Component = new Component();

echo $Component->getHeadHtml();
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
                    <h1 class="display-5 fw-bolder text-white mb-2">Descubra um mundo <br/>de facilidades ao <br/>estudar no exterior</h1>
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

