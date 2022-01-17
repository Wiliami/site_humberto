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
            <h6 class="m-0 font-weight-bold text-dark">Cursos | Aprovação de cursos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-cursos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome do curso</th>
                            <th>Data da compra</th>
                            <th>Status da compra</th>
                            <th>Usuário</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, u.user_name FROM compras c LEFT JOIN users u ON u.user_id");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $User) {
                                    ?>
                        <tr>
                            <td>
                                <span><?= $User['compra_curso'] ?></span>
                            </td>
                            <td>
                                <span><?= $User['compra_date'] ?></span>
                            </td>
                            <td>
                                <span><?= $User['compra_status'] ?></span>
                            </td>
                            <td>
                                <span><?= $User['user_name']?></span>
                            </td>
                            <td style="width: 20%;">
                                <a href="/" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="/" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="/" class="table-link danger">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </td>
                            <?php
                                }
                            } else {
                                Error("Ainda não existem usuários!");
                            }   
                            ?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do curso</th>
                            <th>Data da compra</th>
                            <th>Status da compra</th>
                            <th>Usuário</th>
                            <th>Opções</th>
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
            <div class="modal-body">Tem certeza que deseja excluir usuário <?= $User['user_name']?> ?</div>
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