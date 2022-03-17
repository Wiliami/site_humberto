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
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark" style="font-size: 11px;">Nível de usuários</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-niveis" class="cell-border compact stripe table-striped" style="width: 100%;">
                    </div>
                    <thead>
                        <tr class="btn-sm" style="font-size: 11px;">
                            <th>Nível Usuário</th>
                            <th>Cadastrado por</th>
                            <th>Atualizado por</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT * FROM users_levels");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Level) {
                                    ?>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <td>
                                <span><?= $Level['level_desc'] ?></span>
                            </td>
                            <td>
                                <span><?= $Level['level_user_create'] ?></span>
                            </td>
                            <td>
                                <span><?= $Level['level_user_update'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/admin/level-user/update&level=<?= $Level['level_id'] ?>" class="table-link btn-sm" title="Editar nível <?= $Level['level_desc'] ?>">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/admin/level-user/delete&delete_level=<?= $Level['level_id'] ?>" class="table-link btn-sm" title="Excluir <?= $Level['level_desc'] ?>">
                                    <span class="fa-stack fa-sm">
                                        <i class="fa fa-square fa-stack-2x" style="color: red;"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php
                                }
                            } else {
                                Error("Lista de usuários não encontrada!", 'warning');
                            }   
                            ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 11px;">
                            <th>Nível Usuário</th>
                            <th>Cadastrado por</th>
                            <th>Atualizado por</th>
                            <th>Opções</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#table-niveis").DataTable({
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