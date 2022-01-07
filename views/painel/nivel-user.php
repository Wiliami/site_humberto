<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table id="listar-usuarios" class="table table-striped" style="width: 100%;">
                        <div class="d-sm-flex align-items-center justify-content-start mb-4">
                            <i class="fas fa-users"></i> 
                            <h1 class="h3 mb-0 text-gray-800">Nível de usuários</h1>
                        </div>
                        <thead>
                            <tr>
                                <th>Nível Usuário</th>
                                <th>Opções</th>
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
                                    <span><?= $Level['level_desc'] ?></span>
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
<?= $Component->getFooterDashboard(); ?>
