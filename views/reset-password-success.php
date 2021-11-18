<?php

    $User = new User();
    $User->verifyExistLoginUser();

    $Component = new Component();

    echo $Component->getHeadHtmlDashboard();
    echo $Component->getMenuAndSideBarDashboard();
    echo $Component->getBarraMenuOptions();

?>


        <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Esqueceu a Senha?</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Senha Alterada!</h4>
                            <p>Tente fazer o com sua nova senha.<br><a href="<?= BASE ?>/login">Clique aqui</a> para fazer o login.</p>
                        </div>                  
                    </div>
                </div>
            </div>
        </div> 

        <?php

            $Component = new Component();
            echo $Component->getFooterDashboard();

        ?>