<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBarraMenuOptions();
echo $Component->getMenuAndSideBarDashboard2();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Painel | Aulas</title>
        <link href="<?= BASE ?>/res/site/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="<?= BASE ?>/res/site/css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    </head>            
    <body id="page-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                        <h2>Nível de usuários</h2>
                            <thead>
                                <tr>
                                    <th><span>Usuário</span></th>
                                    <th><span>Nível Usuário</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $Read = new Read();
                                $Read->FullRead("SELECT * FROM users");
                                if($Read->getResult()) {
                                    foreach($Read->getResult() as $User) {
                                        ?>
                                        <tr>
                                    <td>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                        <a href="/" class="user-link"><?= $User['user_name'] ?></a>
                                    </td>
                                    <!-- Nível de usuário -->
                                    <td>    
                                        <?= $User['user_level'] ?>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="/" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    Error("Ainda não existem usuários!");
                                }   
                                ?>
                            </tbody>
                        </table>
                    </div>                
                </div>
                </div>
            </div>  
        </div>
<?php
echo $Component->getFooterDashboard();
?>
