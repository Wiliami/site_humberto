<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboardExample();
echo $Component->getMenuAndSideBarDashboard();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                    <h2>Usuários - Administradores</h2>
                    <thead>
                        <tr>
                            <th><span>Usuário</span></th>
                            <th><span>Nível Usuário</span></th>
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
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                <a href="/" class="user-link"></a>
                            </td>
                            <!-- Nível de usuário -->   
                            <td>
                                <?= 'Administrador' ?>
                            </td>
                            <td>
                                <a href="/" class="table-link" title="Pesquisar usuários desse nível">
                                    <span class="fa-stack">
                                        <i class="fas fa-search"></i>
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
