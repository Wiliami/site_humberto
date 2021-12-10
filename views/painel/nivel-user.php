<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getMenuAndSideBarDashboard2();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="main-box clearfix">
            <div class="table-responsive">
                <table class="table user-list">
                <h2>Lista de usuários</h2>
                    <thead>
                        <tr>
                            <th><span>Usuário</span></th>
                            <th><span>Nível Usuário</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM users");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $User) {
                                ?>
                                <tr>
                            <td>
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                <a href="/" class="user-link"><?= $User['user_name'] ?></a>
                            </td>
                            
                            <!-- Nível de usuário -->
                            <td>    
                                <?= $User['user_level'] ?>  
                            </td>

                            <td style="width: 20%;">
                                <a href="/" class="table-link">
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
