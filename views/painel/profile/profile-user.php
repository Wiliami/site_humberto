<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Meus dados</h1>
    </div>
</div>
<form>
    <div class="form-group row" style="margin-left: 20px;">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="<?= $_SESSION['login']['user_name'] ?>" id="inputPassword">
        </div>
    </div>
    <div class="form-group row" style="margin-left: 20px;">
        <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="<?= $_SESSION['login']['user_email'] ?>" id="inputPassword">     
        </div>
    </div>
    <div class="form-group row" style="margin-left: 20px;">
        <label for="inputPassword" class="col-sm-2 col-form-label">Contato</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword">
        </div>
    </div>
    <input type="submit" class="btn btn-success mb-2" value="Continuar" style="margin: 30px;">
</form>
<?php
echo $Component->getFooterDashboard();
?>

