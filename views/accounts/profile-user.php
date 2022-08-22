<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
$profileUserId = $_SESSION['login']['user_id'];
$Username = $_SESSION['login']['user_name'];
$UserEmail = $_SESSION['login']['user_email'];
?>
<?php
$Read = new Read();
$Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$profileUserId}");
if($Read->getResult()) {
    $DataUser = $Read->getResult()[0];
} else {
    die(Error('Usuário não encontrado', 'danger'));
}
?>
<div class="container">
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['update_profile_user'])) {
        $updateProfileUser['user_name'] = $Post['user_name'];
        $updateProfileUser['user_email'] = $Post['user_email'];

        $User = new User();
        $User->updateProfileUser($updateProfileUser, $profileUserId);
        if($User->getResult()) {
            Error($User->getError());
        } else {
            die(Error($User->getError(), 'danger'));
        }
    } 
    ?>
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Meus dados</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="user_name" value="<?= $DataUser['user_name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="user_email" value="<?= $DataUser['user_email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contato</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="">
                    </div>
                </div>
                <input type="submit" class="btn btn-success mb-2" name="update_profile_user" value="Continuar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>