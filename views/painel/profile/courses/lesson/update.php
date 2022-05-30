<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$title = 'Comentário do usuário';
$commentId = filter_input(INPUT_GET, 'comment', FILTER_VALIDATE_INT);
?>
<div class="container"> 
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h5 mb-0 text-gray-800">Editar comentário</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                $Read = new Read();
                $Read->FullRead('SELECT * FROM comments WHERE comment_id = :ci', "ci={$commentId}");
                if($Read->getResult()) {
                    $DataComment = $Read->getResult()[0];
                } else {
                    Error('Comentário não excluído', 'warning');
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comentário</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da aula"  name="lesson" value="<?= $title ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Atualizar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>