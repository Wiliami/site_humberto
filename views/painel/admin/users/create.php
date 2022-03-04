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
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-3">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Cadastrar usuário</h1>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Nome do usuário" 
            value="<?= isset($Post['name'])? $Post['name']: '' ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="title" placeholder="E-mail do usuário" 
            value="<?= isset($Post['email'])? $Post['email']: '' ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Senha</label>
            <input type="password" class="form-control" id="exampleInputEmail1" name="title" placeholder="Senha do usuário" 
            value="<?= isset($Post['password'])? $Post['password']: '' ?>">
        </div>
        <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="register_course" value="Cadastrar usuário">
    </form>
</div>
<?= $Component->getFooterDashboard();?>