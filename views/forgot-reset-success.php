<?php

$User = new User();
$User->verifyExistLoginUser();

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="<?= BASE ?>/res/site/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?= BASE ?>/res/site/css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body id="page-top">
    
        <?php

        $Component = new Component();
        echo $Component->getMenuAndSideBarDashboard();

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
                            <p>Tente fazer o login com sua nova senha.<br><a href="<?= BASE ?> /login">Clique aqui</a> para fazer o login.</p>
                        </div>                  
                    </div>
                </div>
            </div>
        </div> 

        <?php

            $Component = new Component();
            echo $Component->getFooterDashboard();

        ?>

    </body>
</html>