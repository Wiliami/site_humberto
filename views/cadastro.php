<!DOCTYPE html>
<!--
    Hcode Store by hcode.com.br
-->
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página | Cadastro</title>              
    
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

  
  </head>



    <body>

    <div class="col-md-6">

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

            <form id="register-form-wrap" action="" class="register" method="post">
                <h2>Criar conta</h2>
                    <p class="form-row form-row-first">
                        <label for="nome">Nome<span class="required">*</span>
                        </label>
                        <input type="text" id="nome" name="name" class="input-text" maxlength="25" minlength="2" />
                    </p>
                    <p class="form-row form-row-first">
                        <label for="email">E-mail <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="input-text" maxlength="50" />
                    </p>
                    <!-- <p class="form-row form-row-first">
                        <label for="phone">Telefone
                        </label>
                        <input type="text" id="phone" name="phone" class="input-text" value="">
                    </p> -->
                    <p class="form-row form-row-las t">
                        <label for="senha">Senha<span class="required">*</span>
                        </label>
                        <input type="password" id="senha" name="password" class="input-text" maxlength="50" minlength="8" />
                    </p>
                        <div class="clear"></div>

                    <p class="form-row">
                            <input type="submit" value="Criar Conta" name="cadastro" class="button">
                    </p>

                    <div class="clear"></div>

            </form>               
    </div>

    </body>
</html>

