<?php
    $User = new User();
    $User->verifyExistLoginUser();
    $Component = new Component();
    echo $Component->getHeadHtmlReset();
?>

    <body> 
        <section class="py-lg-5">
            <div class="col-lg-7">
                <div class="card-header px-4 py-sm-5 py-3">
                    <h2>Excluir cursos</h2>
                    <p class="lead">Excluir cursos</p>
                </div>
                
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="main-box clearfix">
                        <div class="table-responsive">
                            <table class="table user-list">
                                <thead>
                                    <tr>
                                        <th><span>Título do curso</span></th>
                                        <th><span>Criado</span></th>
                                        <th class="text-center"><span>Descrição</span></th>
                                        <th><span>E-mail</span></th>
                                        <th>&nbsp;</th>
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
                                            <a href="/" class="user-link"><?= $User['user_name'] ?></a>
                                            <span class="user-subhead"><?= $User['user_id'] ?></span>
                                        </td>
                                        <td>
                                            <?= $User['user_create_date'] ?>  
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-default">Situação</span>
                                        </td>
                                        <td>
                                            <a href="/"><?= $User['user_email'] ?></a>
                                        </td>
                                        <td style="width: 20%;">
                                            <a href="/" class="table-link">
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="/" class="table-link">
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
                </section>

<?php
    $Component = new Component();
    echo $Component->getFooterDashboard();
?>