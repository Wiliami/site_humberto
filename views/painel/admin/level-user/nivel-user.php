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
            <h6 class="m-0 font-weight-bold text-dark">Nível de usuários</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-niveis" class="table table-striped table-bordered" style="width: 100%;">
                    </div>
                    <thead>
                        <tr class="btn-sm">
                            <th>Nível Usuário</th>
                            <th>Data de criação</th>
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
                        <tr class="btn-sm">
                            <td>
                                <span><?= $Level['level_desc'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($Level['level_create_date'])) ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/admin/level-user/update&level=<?= $Level['level_id'] ?>" class="table-link btn-sm" title="Editar nível <?= $Level['level_desc'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/admin/level-user/delete&level=<?= $Level['level_id'] ?>" class="table-link danger btn-sm" title="Excluir nível <?= $Level['level_desc'] ?>">
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
                    <tfoot>
                        <tr class="btn-sm">
                            <th>Nível Usuário</th>
                            <th>Data de criação</th>
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