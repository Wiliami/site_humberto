<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img//apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img//favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Humberto Oliveira| Login</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!-- Fonts and icons -->
        <link href="<?= BASE ?>/res/site/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= BASE ?>/res/site/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block"></div>
                                    <!-- <h1 class="h4 text-gray-900 mb-4">Faça seu login na plataforma!</h1> -->
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Faça o seu cadastro</h1>
                                        </div>
                                        <?php
                                        $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                        if(!empty($Post['register'])) {
                                            $DataCreate['user_name'] = $Post['name'];
                                            $DataCreate['user_email'] = $Post['email'];
                                            $DataCreate['user_password'] = $Post['password'];
                                            $User = new User();
                                            $User->createUser($DataCreate);
                                            if($User->getResult()) {
                                                $User->exeLogin($Post['email'], $Post['password']);
                                                if($User->getResult()) {
                                                    Error($User->getError());
                                                    header('Location: ' . BASE . '/painel/dashboard');
                                                    die();
                                                } else {
                                                    Error($User->getError());
                                                }
                                                } else {
                                                    Error($User->getError(), 'danger');
                                                }
                                        }
                                        ?>
                                        <form action="" class="" method="post">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control form-control-user" name="name" value="<?= isset($Post['name'])?$Post['name']: '' ?>" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control form-control-user" name="email" value="<?= isset($Post['email'])?$Post['email']: '' ?>" placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control form-control-user" name="password" value="<?= isset($Post['password'])?$Post['password']: '' ?>" placeholder="Senha">
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-block btn-round" name="register" value="Cadastrar">
                                        </form>
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