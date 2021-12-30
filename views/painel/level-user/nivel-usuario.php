<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
$NivelId = $_GET['nivel'];
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM users_levels WHERE level_id = :ld", "ld={$NivelId}");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $LevelUser) {
                                ?>
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Lista de usuários nível: <?= $LevelUser['level_desc'] ?></h1>
                            <a href="<?= BASE ?>/painel/nivel-user" class="btn btn-success mb-2" title="Voltar para lista de usuários">Voltar</a>
                        </div>
                        
                        <?php
                            }
                        } else {
                            Error("Ainda não existe essa lista de usuários!");
                        }   
                        ?>
                        <thead>
                            <tr>
                                <th><span class="btn btn-warning mb-2">Perfil</span></th>
                                <th><span class="btn btn-warning mb-2">Usuário</span></th>
                                <th><span class="btn btn-warning mb-2">Opções</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read->FullRead("SELECT * FROM users WHERE user_level = :ul", "ul={$NivelId}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Users) {
                            ?>
                            <tr>
                                <td>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" alt="avatar" style="width: 50px; height: 50px">
                                    <a href="<?= BASE ?>/link-maroto" class="user-link"></a>
                                </td>

                                <td>
                                    <span class="btn btn-light mb-2"><?= $Users['user_name'] ?></span>
                                </td>
                                <td>
                                    <a href="<?= BASE ?>/" class="table-link" title="Alterar o nível de <?= $Users['user_name'] ?>">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                Error("Ainda não existem usuários para esse nível!");
                            }   
                            ?>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>  
    <a href="<?= BASE ?>/painel/nivel-user" class="d-sm-flex align-items-center justify-content-center btn btn-success mb-2" title="Carregar mais usuários">Carregar mais...</a>
</div>

<?php
echo $Component->getFooterDashboard();
?>
