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
$UserId = $_GET['update_user'];

$Read = new Read();
$Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$UserId}");
if($Read->getResult()) {
    $DataUser = $Read->getResult()[0];
} else {
    die(Error('Usuário não foi encontrado!', 'warning'));
}
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-3">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Atualizar usuário</h1>
    </div>
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['update_user'])) { 
        $updateUser['user_name'] = $Post['user'];
        $updateUser['user_email'] = $Post['email'];
        $DataUser = $updateUser;
        if(!empty($Post['ps'])) {
            $updateUser['user_password'] = $Post['ps'];
        }
        $User = new User();
        $User->updateUser($updateUser, $UserId);
        if($User->getResult()) {
            Error($User->getError());
        } else {
            Error($User->getError(), 'warning');
        }
    }
    ?>
    <form method="post">
        <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $DataUser['user_name'] ?></h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="example1" name="user" placeholder="Nome do usuário"
            value="<?= $DataUser['user_name'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" class="form-control" id="example2" name="email" placeholder="E-mail do usuário" 
            value="<?= $DataUser['user_email'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Senha</label>
            <input type="password" class="form-control" id="example3" name="ps" placeholder="Digite a nova senha do usuário">
        </div>
        <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="update_user" value="Atualizar usuário">
        <a href="<?= BASE ?>/painel/profile/courses/courses-users&user=<?= $User['user_id'] ?>" class="btn btn-outline-success mb-2" title="Área cursos de usuário">Ver cursos do usuário</a>
    </form>
</div>
<?= $Component->getFooterDashboard(); ?>