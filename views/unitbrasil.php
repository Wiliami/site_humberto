        <?php 

            $Component = new Component();
            echo $Component->getHeadHtmlPro();
            echo $Component->getMenu();

        ?>

    <!-- <header class="bg-dark py-5" style="height: 698px;"> -->
       
        <!--This div is intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
            
        
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
        
        
        <!-- <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Descubra um mundo <br/>de facilidades ao <br/>estudar no exterior</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Conheça mais sobre a <br /> Unitbrasil acessando o site!</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://www.unitbrasil.com/">Visitar UNITBRASIL!</a>
                    </div>  
                </div>  
            </div>
        </div>
        
    </header> -->
    <!-- <div class="overlay"></div>
    
    <header class="header-2" style="height: 698px;">
        <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/unitbrasil-background.jpeg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Educação!</h1>
                        <p class="lead text-white mt-3">Descubra um mundo <br/>de facilidades ao <br/>estudar no exterior.</p>
                    </div>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="https://www.unitbrasil.com/">visitar Unitbrasil</a>
                    </div>  
                </div>
            </div>
        </div>
    </header> -->


        <header>
                <div class="page-header min-vh-100" style="background-image: url(<?= BASE ?>/src/images/page-youtube1.jpg;);" loading="lazy">
                    <span class="mask bg-gradient-info opacity-4"></span>
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
                            <h1 class="display-5 fw-bolder text-white mb-2">Educação & Sonhos!</h1>
                            <p class="lead text-white mt-3">Descubra um mundo de facilidades ao <br/>estudar no exterior.</p>
                        <div class="buttons">
                            <a class="btn btn-info btn-lg px-4 me-sm-3" href="https://www.unitbrasil.com/">visitar Unitbrasil</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
        </header>

        

    


    <?php 

        $Component = new Component();
        echo $Component->getFooterExampleTest();

    ?>

    </body>
</html>

