<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component(); 
echo $Component->getMenuAndSideBarDashboard2();
?>
<body>  
    <div class="container">
            <div class="col-lg-7">
                <div class="card-header">
                    <h2>Lista de cursos</h2>
                    <p class="lead">Cursos</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                    <th><span>Título</span></th>
                                    <th><span>Criado</span></th>
                                    <th class="text-center"><span>Descrição</span></th>
                                    <th><span>Opções</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $Read = new Read();
                                $Read->FullRead("SELECT * FROM cursos");
                                if($Read->getResult()) {
                                    foreach($Read->getResult() as $Cursos) {
                                        ?>
                                        <tr>
                                    <td>
                                        <a href="/" class="user-link"><?= $Cursos['curso_titulo'] ?></a>
                                        <span class="user-subhead"></span>
                                    </td>
                                    <td>
                                        <?= $Cursos['curso_create_date'] ?>  
                                    </td>
                                    
                                    <td>
                                        <a href="/"><?= $Cursos['curso_descricao'] ?></a>
                                    </td>
                                    <td>
                                        <a href="<?= BASE ?>/" class="table-link" text="Ola">
                                            <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="<?= BASE ?>/painel/courses/update" class="table-link" text="ola">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="<?= BASE ?>/painel/courses/delete" class="table-link danger" text="ola">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse" text="ola"></i>
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
    <!-- Fim da div container -->
    </div>
<?php
echo $Component->getFooterDashboard();
?>