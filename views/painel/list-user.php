<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
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
                                    <a href="<?= BASE ?>/" class="table-link danger" title="Excluir <?= $User['user_name'] ?>" data-toggle="modal" data-target="#deleteModal">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </td> 
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
                </div>                
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Excluir usuário</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tem certeza que deseja excluir usuário?</div>
            <div class="modal-footer">
                <button class="btn btn-success mb-2" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger mb-2" href="<?= BASE ?>/">Excluir</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASE ?>/res/site/js/jquery.min.js"></script>
<script src="<?= BASE ?>/res/site/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE ?>/res/site/js/jquery.easing.min.js"></script>
<script src="<?= BASE ?>/res/site/js/sb-admin-2.min.js"></script> 


<?= $Component->getConfigDataTables(); ?>
