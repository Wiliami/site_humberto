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
$userId = $_GET['delete_user'];
?>
<div class="container">
    <?php
        $Read = new Read();
        $Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$userId}");
        if($Read->getResult()) {
            $DataCourse = $Read->getResult()[0];
                ?>
            <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success" title="Voltar para a lista de usuários">Voltar</a>
        <?php
        } else {
            die(Error("Usuário não encontrado!", 'danger'));
        }
    ?>
</div>

<div class="container">
    <?php
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($Post['delete_user'])) {
        $User= new User();
        $User->deleteUser($userId);
        if($User->getResult()) {
            Error($User->getError());
        } else {
            Error($User->getError());
        }
    }
    ?>
    <form action="" method="post" class="card-header">         
    <h1 class="h5 mb-0 text-gray-800 mb-4">Excluir <b><?= $DataCourse['user_name'] ?></b></h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Nome do usuário" 
        value="<?= $DataCourse['user_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="title" placeholder="E-mail do usuário" 
        value="<?= $DataCourse['user_email'] ?>">
    </div>
    <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-outline-success mb-2" title="Voltar para lista de usuários">Voltar</a>
        <input type="submit" class="btn btn-success mb-2" name="delete_user" data-toggle="modal" data-target="#exampleModal" value="Excluir usuário" >
    </form>
</div>








<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?= $Component->getFooterDashboard(); ?>