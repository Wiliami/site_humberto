<?php
$User = new User();
if($User->verifyLoginUserON()) {
    header('Location: ' . BASE . '/painel/dashboard');
    die();
};
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Humberto Oliveira| Login</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!-- Fonts and icons -->
        <link href="<?= BASE ?>/public/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= BASE ?>/public/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Seja bem-vindo!</h1>
                                        </div>
                                        <form action="" class="user" method="post">
                                            <?php 
                                            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                            if(!empty($Post['logon'])) {
                                                $User = new User();
                                                $User->exeLogin($Post['email'], $Post['password']);
                                                if($User->getResult()) {
                                                    Error($User->getError());
                                                    header('Location: ' . BASE . '/painel/dashboard');
                                                    die();
                                                } else {
                                                    Error($User->getError(), 'danger');
                                                }
                                            } 
                                            ?>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" name="email"
                                                    id="exampleInputEmail" placeholder="Email" 
                                                    value="<?= isset($Post['email'])?$Post['email']: '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="password"
                                                    id="exampleInputPassword" placeholder="Senha"
                                                    value="<?= isset($Post['password'])? $Post['password']: '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Lembrar me</label>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="logon" value="Entrar">
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?= BASE ?>/accounts/password/reset/reset-password">Esqueceu a senha?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="<?= BASE ?>/cadastro">Criar conta!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>