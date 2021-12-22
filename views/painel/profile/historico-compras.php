<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();  
?>
<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Histórico de Compras</h1>
        <div class="row">
            <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Curso</span></th>
                                <th><span>Data</span></th>
                                <th class="text-center"><span>Valor Pago</span></th>
                                <th><span>Usuário</span></th>
                                <th>&nbsp;</th>
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
                                    <span class="user-subhead"><?= $User['user_id'] ?></span>
                                </td>
                                <td>
                                    <?= $User['user_create_date'] ?>  
                                </td>
                                <td class="text-center">
                                    <span class="label label-default">Inativo</span>
                                </td>
                                <td>
                                    <a href="/"><?= $User['user_email']?></a>
                                </td>
                                <td style="width: 20%;">
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="/" class="table-link danger">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
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

