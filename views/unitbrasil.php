        <?php 

            $Component = new Component();
            echo $Component->getHeadHtmlPro();
            echo $Component->getMenu();

        ?>
    
        <header>
                <div class="page-header min-vh-100" style="background-image: url('<?= BASE ?>/src/images/unitbrasil-background.jpeg')" loading="lazy">
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

