<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
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
$commentId = filter_input(INPUT_GET, 'delete_comment', FILTER_VALIDATE_INT);

$Read = new Read();
$Read->FullRead("SELECT * FROM comments WHERE comment_id = :ci", "ci={$commentId}");
if ($Read->getResult()) {
    $DataComment = $Read->getResult()[0];
} else {
    Error('Comentário não encontrado!', 'danger');
}
?>
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-start">
            <h1 class="h6 mb-0 text-gray-800">Excluir <?= $DataComment['comment_text'] ?></h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Post =  filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['delete_user'])) {
                    $Course = new Course();
                    $Course->deleteComment($commentId);
                    if($Course->getResult()) {
                        Error($Course->getError());
                    } else {
                        Error($Course->getResult(), 'danger');
                    } 
                }
                ?>
                <a href="<?= BASE ?>/painel/courses/lesson/comments/approval-comments" class="btn btn-outline-success" title="Voltar para lista de comentários">Voltar</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#delete">
                    Excluir
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir comentário?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-success mb-2" type="button" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <input type="submit" class="btn btn-success mb-2" name="delete_user" value="Excluir">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="delete_comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-success mb-2 vw-100" id="exampleModalLabel">Excluir comentário</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tem certeza que deseja excluir usuário <?= $DataComment['comment_text']?> ?</div>
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
