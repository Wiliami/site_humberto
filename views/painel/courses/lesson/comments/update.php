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
$commentId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
?>
<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT c.*, u.user_name 
        FROM comments c
        LEFT JOIN users u ON u.user_id = c.user
        WHERE comment_id = :ci", "ci={$commentId}");
    if($Read->getResult()) { 
        $DataComment = $Read->getResult()[0];
    } else {
        die(Error('Comentário não encontrado!', 'danger'));
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
            <form action="" method="post">
                <?php
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['update_comment'])) {
                    $DataCommentCreate['comment_status'] = $Post['status_comment'];
                    $Course = new Course();
                    $Course->updateCommentUserLesson($DataCommentCreate, $commentId);
                    if($Course->getResult()) {
                        // Check::var_dump_json($Course->getResult());
                        Error($Course->getError());
                    } else {
                        Error($Course->getError(), 'danger');
                    }
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome da aula</label>
                    <input type="text" class="form-control" id="example1" value="Nome da aula" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuário</label>
                    <input type="text" class="form-control" id="example3" value="<?= $DataComment['user_name'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comentário nessa aula</label>
                    <textarea type="text" class="form-control" id="example2"><?= $DataComment['comment_text'] ?></textarea>
                </div>

                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status do comentário:</label>
                <select class="form-control mb-3" id="inlineFormCustomSelectPref" name="status_comment">
                    <option value="">Selecionar</option>
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