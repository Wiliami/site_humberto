<?php

    $Component = new Component();

    echo $Component->getHeadHtml();
    echo $Component->getMenu();

?>

    <header class="header-2" style="height: 698px;">
            <div class="page-header min-vh-100 relative" style="background-image: url('<?= BASE ?>/src/images/page-youtube.jpg')">
                <span class="mask bg-gradient-primary opacity-4"></span>
                <div class="container">
                    <div class="row">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-black mb-2">Biografia</h1>
                            <p class="lead text-black mt-3">Ministério Pastoral de Humberto Oliveira</p>
                        </div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-danger btn-lg px-4 me-sm-3" href="https://www.youtube.com/channel/UClFMwemd5j7EsXlV-gTw5Xg">INSCREVA-SE</a>
                        </div>  
                    </div>
                </div>
            </div>
    </header>


<?php 

$Component = new Component();
echo $Component->getFooterExampleTest();

?>