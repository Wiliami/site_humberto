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
        $updateUser['user_password'] = $Post['ps'];
        //Check::var_dump_json($updateUser); // aqui ele recebe a atualização enviado pelo input
        $User = new User();
        $User->updateUser($updateUser); // o problema esta aqui
        Check::var_dump_json($User->updateUser($updateUser));
        if($User->getResult()) {
            Error($User->getError());
        } else {
            Error($User->getError(), 'warning');
        }
    }
    ?>
    <form method="post">
        <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$UserId}");
        if($Read->getResult()) {
            foreach($Read->getResult() as $User) {
                ?>
    <h1 class="h5 mb-0 text-gray-800 mb-4">Atualizar <?= $User['user_name'] ?></h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="example1" name="user" placeholder="Nome do usuário"
        value="<?= $User['user_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="email" class="form-control" id="example2" name="email" placeholder="E-mail do usuário" 
        value="<?= $User['user_email'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Senha</label>
        <input type="password" class="form-control" id="example3" name="ps" placeholder="Senha do usuário" 
        value="<?= $User['user_password'] ?>">
    </div>
    <!-- <div class="form-group">
        <label for="example">Nível</label>
        <select class="form-control" name="level" id="example4"
            placeholder="Nível do usuário">
            
            $Read = new Read();
            $Read->FullRead('SELECT * FROM users_levels');
            if($Read->getResult()) {
                    echo "<option value=''>Selecionar</option>";
                foreach($Read->getResult() as $levels) {
                    echo "<option value='{$levels['level_id']}'>{$levels['level_desc']}</option>";
                }
            } else {
                echo "<option value=''>Ainda não existem categorias!</option>"; 
            }
            ?>
        </select>
    </div> -->
        <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="update_user" value="Atualizar usuário">
    </form>
    <?php
        }
    } else {
        Error("Nenhum usuário foi selecionado para atualizar!");
    }
    ?>
</div>
<?= $Component->getFooterDashboard(); ?>