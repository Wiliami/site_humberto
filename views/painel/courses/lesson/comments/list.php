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
// $lessonId = filter_input(INPUT_GET, 'aula', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="ml-0" style="font-size: 14px;">Comentários das aulas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-comments" class="cell-border compact stripe table-striped" style="width: 100%">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th>USUÁRIO</th>
                            <th>COMENTÁRIO</th>
                            <th>STATUS DO COMENTÁRIO</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, u.user_name, s.desc
                            FROM comments c
                            LEFT JOIN users u ON u.user_id = c.user
                            LEFT JOIN situation s ON s.id = c.comment_status");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $DataComment) {
                                ?>
                            <tr style="font-size: 11px;">
                                <td>
                                    <?= $DataComment['user_name'] ?>
                                </td>
                                <td>
                                    <?= $DataComment['comment_text'] ?>
                                </td>
                                <td>
                                    <?= $DataComment['desc'] ?>
                                </td>
                                <td>
                                    <a href="<?= BASE ?>/painel/courses/lesson/comments/update&comment=<?= $DataComment['comment_id'] ?>&lesson=<?= $DataLesson['aula_id'] ?>" class="btn-sm" title="Editar comentário" style="color: #4e73df;"><i class="fas fa-edit"></i></a>
                                    <a href="<?= BASE ?>/painel/courses/lesson/comments/delete&delete_comment=<?= $DataComment['comment_id'] ?>" class="btn-sm" title="Excluir comentário" style="color: #e74a3b;"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>USUÁRIO</th>
                            <th>COMENTÁRIO</th>
                            <th>STATUS DO COMENTÁRIO</th>
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
                <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Excluir comentário</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tem certeza que deseja excluir esse comentário</div>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#table-comments").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum comentário foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum comentário foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
}); 
</script>