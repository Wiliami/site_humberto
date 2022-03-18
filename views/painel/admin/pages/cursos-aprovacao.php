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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark" style="font-size: 12px;">Aprovação de cursos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-cursos" class="cell-border compact stripe table-striped" style="width:100%">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th><span>NOME DO CURSO</span></th>
                            <th><span>DATA DA COMPRA</span></th>
                            <th>STATUS DA COMPRA</th>
                            <th>USUÁRIO</th>
                            <th>OPCOES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, u.user_name FROM compras c LEFT JOIN users u ON u.user_id");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $User) {
                                    ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <span><?= $User['compra_curso'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($User['compra_date'])) ?></span>
                            </td>
                            <td>
                                <span><?= $User['compra_status'] ?></span>
                            </td>
                            <td>
                                <span><?= $User['user_name']?></span>
                            </td>
                            <td style="width: 20%;">
                                <a href="<?= BASE ?>/painel/admin/pages/aprovacao&aprovacao=<?= $User['compra_id'] ?>" class="table-link" title="Editar aprovação de <?= $User['compra_curso'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/admin/pages/delete-aprovacao&aprovacao_delete=<?= $User['compra_id'] ?>" class="table-link danger" title="Excluir aprovação de <?= $User['compra_curso'] ?>" style="color: #e74a3b">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                            <?php
                                }
                            } else {
                                Error("Usuários não encontrados!");
                            }   
                            ?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th>NOME DO CURSO</th>
                            <th>DATA DA COMPRA</th>
                            <th>STATUS DA COMPRA</th>
                            <th>USUÁRIO</th>
                            <th>OPCOES</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="<? BASE ?>/src/datatables/jquery.dataTables.min.js"></script>
<script src="<? BASE ?>/src/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $("#table-cursos").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>