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
$userId = filter_input(INPUT_GET, 'delete_user', FILTER_VALIDATE_INT);
?>
<div class="container">
    <?php
    $Read = new Read();
    $Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$userId}");
    if($Read->getResult()) {
        $DataUser = $Read->getResult()[0];
    } else {
        Error("Usuário não encontrado!", 'danger');
    ?>
    <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success" title="Voltar para a lista de usuários">Voltar</a>
    <?php
        die();
    }


    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['delete_user'])) {
        $User= new User();
        $User->deleteUser($userId);
        if($User->getResult()) {
            Error($User->getError());
            header('Location: ' . BASE . '/painel/admin/users/list');
            die();
        } else {
            Error($User->getError(), 'danger'); 
        }
    }
    ?>
    <div class="card shadow">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-start">
            <h5 class="h6 mb-0 text-gray-800">Excluir <b><?= $DataUser['user_name'] ?></b></h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success" title="Voltar para lista de usuários">Voltar</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Excluir
                </button>


                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir <b><?= $DataUser['user_name']; ?></b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir este usuário?
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
<?= $Component->getFooterDashboard(); ?>