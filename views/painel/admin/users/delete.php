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
$DeleteUser = $_GET['delete_user'];
?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-start mb-3">
        <i class="fas fa-layer-plus"></i>
        <h1 class="h3 mb-0 text-gray-800">Excluir usuário</h1>
    </div>
    <form action="" method="post">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$DeleteUser}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $User) {
                ?>
    <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $User['user_name'] ?></h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Nome do usuário" 
        value="<?= $User['user_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="title" placeholder="E-mail do usuário" 
        value="<?= $User['user_email'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Senha</label>
        <input type="password" class="form-control" id="exampleInputEmail1" name="title" placeholder="Senha do usuário" 
        value="<?= $User['user_password'] ?>">
    </div>
    <input type="submit" class="btn btn-success mb-2" name="register_course" value="Excluir usuário">
    </form>
    <?php
        }
    } else {
        Error("Nenhum usuário selecionado para excluir!");
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>