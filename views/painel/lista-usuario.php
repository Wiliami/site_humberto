<?php
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
//$ListaUsuario = $_GET['page'];    
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-400">Lista de usuários</h1>
    </div>
        <p>Lista</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span class="btn btn-warning mb-2">#</span></th>
                                <th><span class="btn btn-warning mb-2">Usuário</span></th>
                                <th><span class="btn btn-warning mb-2">Nível</span></th>
                                <th><span class="btn btn-warning mb-2">Criado</span></th>
                                <th class="text-center"><span class="btn btn-warning mb-2">Status</span></th>
                                <th><span class="btn btn-warning mb-2">E-mail</span></th>
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
                                            <span><?= $Component->getAvatarUser(); ?></span>
                                        </td>
                                        <td>
                                            <span class="d-block user-link btn btn-light mb-2"><?= $User['user_name'] ?></span>
                                        </td>
                                        <td>
                                            <span class="btn btn-light mb-2"><?= $User['level_desc'] ?></td></span>
                                        <td>
                                            <span class="btn btn-light mb-2"><?= date('d/m/Y', strtotime($User['user_create_date'])) ?></span>
                                        </td>
                                        <td>
                                            <span class="btn btn-light mb-2">Situação</span>
                                        </td>
                                        <td>
                                            <span class="btn btn-light mb-2"><?= $User['user_email'] ?></span>
                                        </td>
                                        <td>
                                            <a href="<?= BASE ?>/painel/courses/list" class="table-link" title="Pesquisar <?= $User['user_name'] ?>">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE ?>/painel/courses/update" class="table-link" title="Alterar nível de <?= $User['user_name'] ?>">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE ?>/painel/courses/delete" class="table-link danger" title="Excluir <?= $User['user_name'] ?>">
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
    <?php
    // Qual a tabela que eu quero ler
    // Tabela de usuários
    $Read->FullRead("SELECT * FROM users WHERE LIMIT 1, 10");
    if($Read->getResult()) {
        foreach($Read->getResult() as $ListUser) {
            ?>
            <a href="<?= BASE ?>/painel/lista-usuario" class="d-sm-flex align-items-center justify-content-center btn btn-success mb-2" title="Carregar mais usuários">Carregar mais...</a>
    <?php
        }
    }   
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>