<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getMenuSideBarDashboard();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <div class="table-responsive">
                <table id="listar-usuarios" class="table table-striped">
                    <div class="d-sm-flex align-items-center justify-content-start mb-4">
                        <i class="fas fa-trash-alt"></i>
                        <h1 class="h3 mb-0 text-gray-800 ml-2">Excluir | Excluir cursos</h1>
                    </div>
                        <p>Excluir cursos</p>
                    <thead>
                        <tr>
                        <th><span>Nome do curso</span></th>
                        <th><span>Data da criação</span></th>
                        <th class="text-center"><span>Descrição</span></th>
                        <th><span>Excluir</span></th>
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
                            <span><?= $Cursos['curso_titulo'] ?></span>
                        </td>
                        <td>
                            <span><?= $Cursos['curso_create_date'] ?></span>
                        </td>
                        <td>
                            <span><?= $Cursos['curso_descricao'] ?></span>
                        </td>
                        <td>
                            <a href="/" class="table-link danger" title="Excluir <?= $Cursos['curso_titulo'] ?>">
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
<?= $Component->getFooterDashboard(); ?>