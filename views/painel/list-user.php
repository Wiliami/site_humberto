<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
echo $Component->getMenuOptionsDashboard();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                    <h2>Lista de usuários</h2>
                        <thead>
                            <tr>
                                <th><span>#</span></th>
                                <th><span>Usuário</span></th>
                                <th><span>Criado</span></th>
                                <th><span>Nível</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>E-mail</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT u.*, ul.level_desc 
                                    FROM users u 
                                    LEFT JOIN users_levels ul ON ul.level_id = u.user_level");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $User) {                    
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"alt="avatar" style="width: 50px; height: 50px">
                                        </td>
                                        <td><a href="<?= BASE ?>/painel/list-user" class="d-block user-link"><?= $User['user_name'] ?></a></td>
                                        <td>
                                            <?= date('d/m/Y', strtotime($User['user_create_date'])) ?>
                                        </td>
                                        <td><?= $User['level_desc'] ?></td>
                                        <td class="text-center">
                                            <span class="label label-default">Situação</span>
                                        </td>
                                        <td>
                                            <a href="<?= BASE ?>/"><?= $User['user_email'] ?></a>
                                        </td>
                                        <td>
                                            <a href="<?= BASE ?>/" class="table-link">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE ?>/" class="table-link">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE ?>/" class="table-link danger">
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