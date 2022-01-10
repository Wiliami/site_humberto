<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table id="listar-usuarios" class="table table-striped" style="width: 100%;">
                        <div class="d-sm-flex align-items-center justify-content-start mb-4">
                            <i class="fas fa-list"></i>
                            <h1 class="h3 mb-0 text-gray-800">Lista de usuários</h1>
                        </div>
                        <thead>
                            <tr>
                                <th>*</th>
                                <th>Usuário</th>
                                <th>Nível</th>
                                <th>Criado</th>
                                <th>Status</th>
                                <th>E-mail</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT u.*, ul.level_desc
                                FROM users u
                                LEFT JOIN users_levels ul ON ul.level_id = u.user_level");
                                // Primeiro eu tenho o id e o campo da tabela que eu quero 
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $User) { 
                                    ?> 
                            <tr>
                                <td>
                                    <?= $Component->getAvatarUser(); ?>
                                </td>
                                <td>    
                                    <?= $User['user_name'] ?>
                                </td>
                                <td>
                                    <?= $User['level_desc'] ?>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($User['user_create_date'])) ?>
                                </td>
                                <td>
                                    <?= $User['user_status'] ?>
                                </td>
                                <td>
                                    <?= $User['user_email'] ?>
                                </td>
                                <td>
                                    <a href="<?= BASE ?>/" class="table-link" title="Pesquisar <?= $User['user_name'] ?> ">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="<?= BASE ?>/" class="table-link" title="Alterar o nível de <?= $User['user_name'] ?> ">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="<?= BASE ?>/" class="table-link" title="Excluir <?= $User['user_name'] ?>" data-toggle="modal" data-target="#deleteModal">
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
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Excluir usuário</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * users DELETE FROM user_name = un WHERE ");
            ?>
            <div class="modal-body">Tem certeza que deseja excluir usuário <?= $User['user_id']?> ?</div>
            <div class="modal-footer">
                <button class="btn btn-success mb-2" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger mb-2" href="<?= BASE ?>/">Excluir</a>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>