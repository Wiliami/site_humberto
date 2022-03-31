<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
//echo $Component->getBlockPageProfile();
echo $Component->getHeadHtmlDashboard();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow mb-4"> 
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Alterar senha</h1>
        </div> 
        <div class="card-body">
            <form action="" method="post">
                <?php 
                $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($Post['reset_password'])) {
                    $resetPassword['user_password'] = $Post['current_pass'];
                    $resetPassword['user_password'] = $Post['new_pass'];
                    $resetPassword['user_password'] = $Post['confirm_new_pass'];
                    $User = new User(); 
                    $User->resetUserPassword($resetPassword);
                    if($User->getResult()) {
                        Error($User->getResult());
                    } else {
                        Error($User->getResult(), 'danger');
                    }   
                }  
                ?>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Senha atual</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword1" name="current_pass" placeholder="Digite a senha atual"
                            <?= isset($Post['current_pass']) ? $Post['current_pass']: ''?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nova senha</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword2" name="new_pass" placeholder="Digite a nova senha"
                            <?= isset($Post['new_pass']) ? $Post['new_pass']: ''?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Confirme a nova senha</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" name="confirm_new_pass" placeholder="Confirme a nova senha"
                            <?= isset($Post['confirm_new_pass']) ? $Post['confirm_new_pass']: ''?>>
                    </div>
                </div>
                <input type="submit" class="btn btn-success mb-2" name="reset_password" value="Alterar">
            </form>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>