<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark" style="font-size: 13px;">Lista de usuários</h6>
            <a href="<?= BASE ?>/painel/admin/users/create" class="btn btn-success rounded-pill" title="Cadastrar novo usuário" style="border-radius: 50%; font-size: 10px;">Cadastrar novo usuário</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-usuarios" class="cell-border compact stripe table-striped" style="width: 100%">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th>USUÁRIO</th>
                            <th>FUNÇÃO</th>
                            <th>E-MAIL</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT u.*, ul.level_desc
                            FROM users u
                            LEFT JOIN users_levels ul ON ul.level_id = u.user_level");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Users) { 
                                ?>
                        <tr style="font-size: 11px;">
                            <td>
                                <?= $Users['user_name'] ?>
                            </td>
                            <td>
                                <?= $Users['level_desc'] ?>
                            </td>
                            <td>
                                <?= $Users['user_email'] ?>
                            </td>
                            <td>
                                <?= $Users['user_create_resp'] ?>
                            </td>
                            <td>
                                <?= $Users['user_update_resp'] ?>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/admin/users/update&update_user=<?= $Users['user_id'] ?>" class="btn-sm btn-primary" title="Editar <?= $Users['user_name'] ?> "><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/profile/courses/list&user=<?= $Users['user_id'] ?>" class="btn-sm btn-success" title="Cursos de <?= $Users['user_name'] ?> "><i class="fas fa-book"></i></a>
                                <a href="<?= BASE ?>/painel/admin/users/delete&delete_user=<?= $Users['user_id'] ?>" class="btn-sm btn-danger" title="Excluir <?= $Users['user_name'] ?> "><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else{
                            Error("Usuários não encontrados!", 'danger');
                        } 
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>USUÁRIO</th>
                            <th>FUNÇÃO</th>
                            <th>E-MAIL</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

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
                Error("Não foi possível excluir o usuário!");
            }
            ?>
            <div class="modal-footer">
                <button class="btn btn-success mb-2" type="button" data-dismiss="modal">
                    Cancelar
                </button>
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