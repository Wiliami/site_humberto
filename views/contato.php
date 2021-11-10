<?php

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>


    <header class="masthead bg-primary py-5" style="height: 698px;">

        <!-- <div class="overlay"></div> -->

        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Contate-me!</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Entre em contato conosco!</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-dark btn-lg px-4 me-sm-3" href="login">Contato</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Text Header -->

    </header>

    <?php

    $Component = new Component();
    echo $Component->getFooter();

    ?>

</body>

</html>