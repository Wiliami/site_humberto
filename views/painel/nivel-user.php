<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-start mb-4">
        <i class="fas fa-users"></i>
        <h1 class="h3 mb-0 text-gray-800 ml-2">Nível de usuários</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span class="btn btn-warning mb-2">Usuário</span></th>
                                <th><span class="btn btn-warning mb-2">Nível Usuário</span></th>
                                <th><span class="btn btn-warning mb-2">Opções</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read = new Read();
                            $Read->FullRead("SELECT * FROM users_levels");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Level) {
                                    ?>
                            <tr>
                                <td>
                                    <?= $Component->getAvatarUser(); ?>
                                </td>
                                <td>
                                    <span class="btn btn-light mb-2"><?= $Level['level_desc'] ?></span>
                                </td>
                                <td>
                                    <a href="<?= BASE ?>/painel/level-user/nivel-usuario&nivel=<?= $Level['level_id']?>" class="table-link btn btn-primary mb-2" title="Pesquisar usuários do nível <?= $Level['level_desc'] ?>">
                                        <span class="">
                                            <!-- <i class="fas fa-search"></i> -->
                                            <i class="fas fa-search fa-sm"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                Error("Ainda não existem usuários!");
                            }   
                            ?>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>  
</div>
<?php
echo $Component->getFooterDashboard();
?>
