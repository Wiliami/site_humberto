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
        <!-- <link rel="stylesheet" href="<?= BASE ?>/res/site/css/owl.carousel.css"> -->
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/style.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/responsive.css">


    </head>
    <body>





        <!-- <div class="single-product-area">
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
                                <label for="login">E-mail <span class="required">*</span></label>
                                <input type="text" id="login" name="email" value="<?= isset($Post['email'])?$Post['email']: '' ?>" class="input-text" >
                            </p>
                            <p class="form-row form-row-last">
                                <label for="senha">Senha <span class="required">*</span></label>
                                <input type="password" id="senha" name="password" value="<?= isset($Post['password'])?$Post['password']: '' ?>" class="input-text" >
                            </p>
                            <div class="clear"></div>
                
                            <p class="lost_password">
                                <a href="<?= BASE ?>/forgot-password">Esqueci minha senha</a>
                            </p>
                            <p class="">
                                <a href="<?= BASE ?>/cadastro">Criar conta</a>
                            </p>

                            <p class="form-row">
                                <input type="submit" value="Entrar" name="login" class="button">
                            </p>
    

                            <div class="clear"></div>
                            
                        </form>                    
                    </div>
                
                </div>
            </div>
        </div> -->



            <div class="section section-image section-login" style="background-image: url('./assets/img/login-image.jpg');">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card card-register">
                    <h3 class="title mx-auto">Welcome</h3>
                    <div class="social-line text-center">
                        <a href="#pablo" class="btn btn-neutral btn-facebook btn-just-icon mt-0">
                        <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#pablo" class="btn btn-neutral btn-google btn-just-icon mt-0">
                        <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#pablo" class="btn btn-neutral btn-twitter btn-just-icon mt-0">
                        <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                    <form class="register-form">
                        <label>Email</label>
                        <div class="input-group form-group-no-border">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="nc-icon nc-email-85"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <label>Password</label>
                        <div class="input-group form-group-no-border">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="nc-icon nc-key-25"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <button class="btn btn-danger btn-block btn-round">Register</button>
                    </form>
                    <div class="forgot">
                        <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                    </div>
                    </div>
                    <div class="col text-center">
                    <a href="./examples/register-page.html" class="btn btn-outline-neutral btn-round btn-lg" target="_blank">View Register Page</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        

    </body>
</html>



