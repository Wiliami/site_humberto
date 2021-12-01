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

        <title>Página | Profile</title>

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
        echo $Component->getBarraMenuOptions();
    ?>
 

    <form>
        <h1 style="margin-left: 30px;">Meus dados</h1>
        <div class="form-group row" style="margin-left: 20px;">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $_SESSION['login'] ['user_name'] ?>" id="inputPassword">
                
            </div>
        </div>
        <div class="form-group row" style="margin-left: 20px;">
            <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?= $_SESSION['login'] ['user_email'] ?>" id="inputPassword">
                 
            </div>
        </div>
        <div class="form-group row" style="margin-left: 20px;">
            <label for="inputPassword" class="col-sm-2 col-form-label">Contato</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword">
            </div>
        </div>

        <input type="submit" class="btn btn-primary mb-2" value="Continuar" style="margin: 30px;">
    </form>
        

        <?php
        
            $Component = new Component();
            echo $Component->getFooterDashboard();
            
        ?>

    </body>
</html>