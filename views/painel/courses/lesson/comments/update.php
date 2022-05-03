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
$commentId = filter_input(INPUT_GET, 'comment', FILTER_VALIDATE_INT);
?>
<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM comments WHERE comment_id = :ci", "ci={$commentId}");
    if($Read->getResult()) {
        $DataComment = $Read->getResult()[0];
    } else {
        Error('Comentário não encontrado!', 'danger');
    }
    ?>
</div>

<!-- 
Fazer uma tabela para poder atualizar pequenas informações 
dos dados dos comentários dos usuários nas aulas
-->

<div class="container">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-start">
        <h1 class="h5 mb-0 text-gray-800">Atualizar <b><?= $DataComment['comment_text'] ?></b></h1>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Comentário</label>
                    <input type="text" class="form-control" id="example1" name="comment_text" value="<?= $DataComment['comment_text'] ?>">
                </div>
                <a href="<?= BASE ?>/painel/courses/lesson/comments/approval-comments" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="update_user" value="Atualizar">
                <a href="<?= BASE ?>/painel/profile/courses/courses-users&user=<?= $User['user_id'] ?>" class="btn btn-outline-success mb-2" title="Área cursos de usuário">Ver cursos do usuário</a>
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
