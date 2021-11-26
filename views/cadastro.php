<!-- <!DOCTYPE html>
    
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página | Cadastro</title>              
    
     Google Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'> -->
    
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="<?= BASE ?>/res/site/css/bootstrap.min.css"> -->
    
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="<?= BASE ?>/res/site/css/font-awesome.min.css"> -->
    
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="<?= BASE ?>/res/site/css/owl.carousel.css"> 
    <link rel="stylesheet" href="<?= BASE ?>/res/site/css/style.css">
    <link rel="stylesheet" href="<?= BASE ?>/res/site/css/responsive.css">  -->

  
  <!-- </head>



    <body>

    <div class="col-md-6"> -->




    <!DOCTYPE html>
     <html lang="pt-BR">
        <head>
            <meta charset="utf-8" />
            <link rel="apple-touch-icon" sizes="76x76" href="./assets/img//apple-icon.png">
            <link rel="icon" type="image/png" href="./assets/img//favicon.png">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title>
                Page | Cadastro
            </title>
            <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

            <!-- Fonts and icons -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
            
            <link id="pagestyle" href="<?= BASE ?>/src/css/material-kit.css?v=3.0.0" rel="stylesheet" />
            
            <!-- CSS Files -->
            <link href="<?= BASE ?>/res/site/css/bootstrap.min.css" rel="stylesheet" />
            <link href="<?= BASE ?>/res/site/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
          


        </head>

        <body class="index-page sidebar-collapse">

    <?php 

        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['cadastro'])) {
            $DataCreate['user_name'] = $Post['name'];
            $DataCreate['user_email'] = $Post['email'];
            $DataCreate['user_password'] = $Post['password'];

            $User = new User();
            $User->createUser($DataCreate);
            if($User->getResult()) {
                Error("Cadastrado com o id {$User->getResult()}");
                header('Location:' . BASE . '/dashboard');
            } else {
                Error($User->getError(), 'danger');
            }
            // Check::var_dump_json($Post);
        }
    
    ?>
    
            <!-- <form id="register-form-wrap" action="" class="register" method="post">
                <h2>Criar conta</h2>
                    <p class="form-row form-row-first">
                        <label for="nome">Nome<span class="required">*</span>
                        </label>
                        <input type="text" id="nome" value="<?=isset($Post['name'])?$Post['name']:''?>" name="name" class="input-text" maxlength="25" minlength="2" />
                    </p>
                    <p class="form-row form-row-first">
                        <label for="email">E-mail <span class="required">*</span>
                        </label>
                        <input type="email" id="email" value="<?=isset($Post['email'])?$Post['email']:''?>" name="email" class="input-text" maxlength="50" />
                    </p> -->
                    <!-- <p class="form-row form-row-first">
                        <label for="phone">Telefone
                        </label>
                        <input type="text" id="phone" name="phone" class="input-text" value="">
                    </p> -->
                    <!-- <p class="form-row form-row-las t">
                        <label for="senha">Senha<span class="required">*</span>
                        </label>
                        <input type="password" id="senha" value="<?=isset($Post['password'])?$Post['password']:''?>" name="password" class="input-text" maxlength="50" minlength="8" />
                    </p>
                        <div class="clear"></div>

                    <p class="form-row">
                            <input type="submit" value="Criar Conta" name="cadastro" class="button">
                    </p>

                    <div class="clear"></div>

            </form>               
    </div> -->
    <div class="section section-image section-login" style="background-image: url('<?= BASE ?>/src/images/login-image.jpg')">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card card-register">
                    <h3 class="title mx-auto">Faça o seu cadastro</h3>
                
                    <form class="" method="post">
                        <label>Nome</label>
                        <div class="input-group form-group-no-border">
                        <div class="input-group-prepend">
                        </div>
                            <input type="" class="form-control" name="name" value="<?= isset($Post['name'])?$Post['name']: '' ?>" placeholder="Name">
                        </div>
                        
                        <label>Email</label>
                        <div class="input-group form-group-no-border">
                        <div class="input-group-prepend">
                        </div>
                            <input type="email" class="form-control" name="email" value="<?= isset($Post['email'])?$Post['email']: '' ?>" placeholder="E-mail">
                        </div>

                        <label>Senha</label>
                        <div class="input-group form-group-no-border">
                        <div class="input-group-prepend">
                        </div>
                            <input type="password" class="form-control" name="password" value="<?= isset($Post['password'])?$Post['password']: '' ?>" placeholder="Senha">
                        </div>

                        <button class="btn btn-danger btn-block btn-round" name="Cadastrar">Cadastrar</button>
                    </form>
                   
                    </div>
                </div>
                </div>
            </div>
        </div>





    </body>
</html>

