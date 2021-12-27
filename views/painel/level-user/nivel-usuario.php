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
                        <h1 class="h3 mb-0 text-gray-800">Lista de usuários nível: <?= $LevelUser['level_desc'] ?></h1>
                        <?php }
                        } else {
                            Error("Ainda não existe essa lista de usuários!");
                        }   
                        ?>
                        <thead>
                            <tr>
                                <th><span>Usuário</span></th>
                                <th><span>Nível Usuário</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Read->FullRead("SELECT u.*, ul.level_desc
                                        FROM users u 
                                        LEFT JOIN users_levels ul ON ul.level_id = u.user_level
                                        WHERE u.user_level = :ul", "ul={$NivelId}");
                            if($Read->getResult()) {
                                foreach($Read->getResult() as $Users) {
                            ?>
                            <tr>
                                <td>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                    <a href="<?= BASE ?>/link-maroto" class="user-link"></a>
                                </td>

                                <td>
                                    <?= $Users['user_name'] ?>
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
</div>
<?php
echo $Component->getFooterDashboard();
?>
