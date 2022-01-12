<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Lista de usuários</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-usuarios" class="table table-striped table-bordered" style="width: 100%;">
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
                                <a href="<?= BASE ?>/" class="table-link"
                                    title="Pesquisar <?= $User['user_name'] ?> ">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/" class="table-link"
                                    title="Alterar o nível de <?= $User['user_name'] ?> ">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/" class="table-link" title="Excluir <?= $User['user_name'] ?>"
                                    data-toggle="modal" data-target="#deleteModal">
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






<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Nome da tabela</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->





<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Excluir usuário</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            $Delete = new Delete();
            $Delete->ExeDelete("users", "WHERE user_id = :id", "id={user_id}");
            if($Delete->getResult()) {
                foreach($Delete->getResult() as $Id) {
                 ?>
            <div class="modal-body">Tem certeza que deseja excluir usuário <?= $Id['user_name']?> ?</div>
            <?php
                }
            } else {
                Error("Não foi possível deletar o usuário!");
            }
            ?>
            <div class="modal-footer">
                <button class="btn btn-success mb-2" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger mb-2" href="<?= BASE ?>/">Excluir</a>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="<? BASE ?>/src/datatables/jquery.dataTables.min.js"></script>
<script src="<? BASE ?>/src/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#table-usuarios").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>