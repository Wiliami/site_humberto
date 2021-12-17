<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Página | Forgot Password</title>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/owl.carousel.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/style.css">
        <link rel="stylesheet" href="<?= BASE ?>/res/site/css/responsive.css">
    </head>
    <body>
        <?php
        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['cadastro'])) {
            if(empty($Post['email'])) {
                $this->Error = "Informe um e-mail!";
                $this->Result = false;
            } 
        }
        ?>
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">                
                    <div class="col-md-6">
                        <form action="" id="login-form-wrap" class="login" method="post">
                            <h2>Recuperar senha</h2>
                            <p class="form-row form-row-first">
                                <input type="text" id="login" value="<?= isset($Post['email'])? $Post['email']: '' ?>" name="email" class="input-text" placeholder="Digite seu e-mail">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row">
                                <input type="submit" name="cadastro" class="button" value="Recuperar">
                            </p>    
                            <div class="clear"></div>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
