<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<!-- <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-list"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-2">Lista de usuários</h1>
    </div>
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
                                <th><span class="btn btn-warning mb-2">Status</span></th>
                                <th><span class="btn btn-warning mb-2">E-mail</span></th>
                                <th><span class="btn btn-warning mb-2">Opções</span></th>
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
                                            <?= $Component->getAvatarUser() ?>
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
                                            <a href="<?= BASE ?>/" class="table-link" title="Pesquisar <?= $User['user_name'] ?>">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE ?>/" class="table-link" title="Alterar o nível de <?= $User['user_name'] ?>">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE ?>/" class="table-link danger" title="Excluir <?= $User['user_name'] ?>">
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
        // Tabela de usuários (users)
        // $Read->FullRead("SELECT * FROM users WHERE LIMIT 1, 10");
        // if($Read->getResult()) {
        //     foreach($Read->getResult() as $ListUser) {
        //         ?>
        <a href="<?= BASE ?>/painel/lista-usuario&page= <?= $ListUser['level_id'] ?>" class="d-sm-flex align-items-center justify-content-center btn btn-success mb-2" title="Carregar mais usuários">Carregar mais...</a>

        } 
    }
    
</div> -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "../server_side/scripts/server_processing.php"            
            } );
        } );


        $columns = array(
            array( '0' => 'user_name' ),
            array( '0' => 'level_desc' ),
            array( '1' => 'user_create_date' ),
            array( '2' => 'user_status' ),
            array( '3' => 'user_email' ),
        );


    </script>

    <table id="listar-usuario" class="display" style="width:100%">
        <thead>
            <tr>
                <th><span class="">*</span></th>
                <th><span class="">Usuário</span></th>
                <th><span class="">Nível</span></th>
                <th><span class="">Criado</span></th>
                <th><span class="">Status</span></th>
                <th><span class="">E-mail</span></th>
                <th><span class="">Opções</span></th>
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
                    <span><?= $User['user_name'] ?></span>
                </td>
                <td>
                    <span><?= $User['level_desc'] ?></span>
                </td>
                <td>
                    <span><?= date('d/m/Y', strtotime($User['user_create_date'])) ?></span>
                </td>
                <td>
                    <span><?= $User['user_status'] ?></span>
                </td>
                <td>
                    <span><?= $User['user_email'] ?></span>
                </td>
                <!-- <td>
                    <a href="<?= BASE ?>/" class="table-link" title="Pesquisar <?= $User['user_name'] ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="<?= BASE ?>/" class="table-link" title="Alterar o nível de <?= $User['user_name'] ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="<?= BASE ?>/" class="table-link danger" title="Excluir <?= $User['user_name'] ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </td> -->
            </tr>

            <?php
                }
            } else{
                Error("Ainda não existem usuários!");
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>*</th>
                <th>Usuário</th>
                <th>Nível</th>
                <th>Criado</th>
                <th>Status</th>
                <th>E-mail</th>
                <th>Opções</th>
            </tr>
        </tfoot>
    </table>
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<?= $Component->getFooterDashboard(); ?>