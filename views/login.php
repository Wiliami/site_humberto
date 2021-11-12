<?php

$User = new User();
if($User->verifyLoginUserON()) {
    header('Location: ' . BASE . '/dashboard');
    die();

};

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Página | Login</title>
        
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap -->  
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/bootstrap.min.css">
        
        <!-- Font Awesome -->   
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/font-awesome.min.css">
        
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/owl.carousel.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/style.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/responsive.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body>


        <!-- <?php
        // $Component = new Component();
        // echo $Component->getMenu();
        ?> -->



        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">                
                    <div class="col-md-6">
                    
                        <form action="" id="login-form-wrap" class="login" method="post">
                        <?php 

                            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                            if(!empty($Post['login'])) {
                                $User = new User();
                                $User->exeLogin($Post['email'], $Post['password']);
                                if($User->getResult()) {
                                    Error($User->getError());
                                    header('Location: ' . BASE . '/dashboard');
                                    die();
                                } else {
                                    Error($User->getError(), 'danger');
                                }
                            } 

                            ?>
                            <h2>Acessar</h2>
                            <p class="form-row form-row-first">
                                <label for="login">E-mail <span class="required">*</span>
                                </label>
                                <input type="text" id="login" name="email" class="input-text">
                                </p>
                            <p class="form-row form-row-last">
                                <label for="senha">Senha <span class="required">*</span>
                                </label>
                                <input type="password" id="senha" name="password" class="input-text">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row">
                                <input type="submit" name="login" value="Login" class="button">
                                <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Manter conectado </label>
                            </p>
                            <p class="lost_password">
                                <a href="forgot">Esqueceu a senha?</a>
                            </p>
                            <p class="register">
                                <a href="cadastro">Fazer cadastro!</a>
                            </p>
    

                            <div class="clear"></div>
                            
                        </form>                    
                    </div>
                
                </div>
            </div>
        </div>
    

    </body>
</html>



