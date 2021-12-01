    <?php

    $User = new User();
    $User->verifyExistLoginUser();

    $Component = new Component();
    echo $Component->getHeadHtmlPages();
    echo $Component->getMenuAndSideBarDashboard();
    echo $Component->getBarraMenuOptions();


    function dataUser($dataUsers) {
        $Read = new Read();
        $Read->FullRead("SELECT * FROM users WHERE users = :dt", "dt={$dataUsers}");
        if($Read->getResult()) {
            return true;
            Check::var_dump_json($Read->getResult());
        } else {
            return false;
        }   

    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                            <tr>
                                <th><span>Usuário</span></th>
                                <th><span>Criado</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>E-mail</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                    <a href="/" class="user-link"><?php echo $_SESSION['login']['user_name'] ?></a>
                                    
                                    <span class="user-subhead"><?php echo $_SESSION['login']['user_id'] ?></span>
                                </td>
                                <td>
                                    2021/12/01  
                                </td>
                                <td class="text-center">
                                    <span class="label label-default">Inativo</span>
                                </td>
                                <td>
                                    <a href="/"><?php echo $_SESSION['login']['user_email']; ?></a>
                                </td>
                                <td style="width: 20%;">
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="/" class="table-link danger">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" style="width: 50px; height: 50px">
                                    <a href="#" class="user-link">Carlos</a>
                                        
                                    <span class="user-subhead">Membro</span>
                                </td>
                                <td>
                                    2021/12/12
                                </td>
                                <td class="text-center">
                                    <span class="label label-default">Inativo</span>
                                </td>
                                <td>
                                    <a href="/">carlos@gmail.com</a>
                                </td>
                                <td style="width: 20%;">
                                    <a href="/" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="table-link danger">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>                
            </div>
            </div>
        </div>  
    </div>


    <?php 

        $Component = new Component();
        echo $Component->getFooterDashboard();
    
    ?>

    </body>
</html>