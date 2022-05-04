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
        <h1 class="h6 mb-0">Atualizar comentário</h1>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <?php
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($Post['update_comment'])) {
                $DataComment['comment_status'] = $Post['comment_status'];
                $Course = new Course();
                $Course->updateCommentUserLesson($DataComment, $commentId);
                if($Course->getResult()) {
                    Error($Course->getError());
                } else {
                    Error($Course->getError(), 'danger');
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome da aula</label>
                    <input type="text" class="form-control" id="example1" name="comment_lesson" value="Nome da aula">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comentário nessa aula</label>
                    <input type="text" class="form-control" id="example2" name="comment_status" value="<?= $DataComment['comment_text'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" class="form-control" id="example3" name="comment_user" value="<?= $DataComment['user'] ?>">
                </div>

                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status do comentário:</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="comment_status">
                    <option>selecionar</option>
                    <option value="">Aprovado</option>  
                    <option value="">Reprovado</option>
                </select>
                <a href="<?= BASE ?>/painel/courses/lesson/comments/list" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
                <input type="submit" class="btn btn-success mb-2" name="update_comment" value="Atualizar">
                <a href="<?= BASE ?>/painel/profile/courses/courses-users&user=<?= $User['user_id'] ?>" class="btn btn-outline-success mb-2" title="Área cursos de usuário">Ver cursos do usuário</a>
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
