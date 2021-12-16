<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getMenuAndSideBarDashboard2();
?>
    <form action="" method="post">
    <?php 
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($Post['reset-password'])) {
        $Reset['user_password'] = $Post['current-pass'];
        $Reset['user_password'] = $Post['new-pass'];
        $Reset['user_password'] = $Post['confirm-new-pass'];
        $User = new User(); 
        $User->resetUserPassword($Reset);
        if($User->getResult()) {
            // Error("A senha foi alterada!");
            header('Location: ' . BASE . '/painel/profile/reset-password-success');
            exit();
        } else {
            Error($User->getResult(), 'danger');
        }   
    }
    ?>
    <h2 style="margin-left: 30px; margin-top: 30px;">Alterar senha</h2>
    <div class="form-group row" style="margin-left: 20px;">
        <label for="inputPassword" class="col-sm-2 col-form-label">Senha antiga</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword1" name="current-pass" <?= isset($Post['current-passs']) ? $Post['current-pass']: ''?> > 
        </div>
    </div>
    <div class="form-group row" style="margin-left: 20px;">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nova senha</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword2" name="new-pass" <?= isset($Post['new-pass']) ? $Post['new-pass']: ''?>>
        </div>
    </div>
    <div class="form-group row" style="margin-left: 20px;">
        <label for="inputPassword" class="col-sm-2 col-form-label">Confirme a nova senha</label>
        <div class="col-sm-10">
            <input typ  e="password" class="form-control" id="inputPassword3" name="confirm-new-pass" <?= isset($Post['confirm-new-pass']) ? $Post['confirm-new-pass']: ''?>>
        </div>
    </div>
    <input type="submit" class="btn btn-primary mb-2" value="Redefinir" name="reset-password" style="margin: 30px;">
    </form>
    <?php
    $Component = new Component();
    echo $Component->getFooterDashboard();
    ?>