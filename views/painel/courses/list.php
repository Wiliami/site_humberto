<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component(); 
echo $Component->getHeadHtmlDashboard();
echo $Component->getMenuSideBarDashboard();
?>
<div class="container-fluid">
    <i class="fas fa-book"></i>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista de cursos</h1>
    </div>
        <p>Cursos</p>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <div class="table-responsive">
                <table class="table user-list">
                    <thead>
                        <tr>
                            <th><span class="btn btn-warning mb-2">Nome do curso</span></th>
                            <th><span class="btn btn-warning mb-2">Data de cadastro</span></th>
                            <th><span class="btn btn-warning mb-2">Descrição</span></th>
                            <th><span class="btn btn-warning mb-2">Opções</span></th>
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
                                <span class="btn btn-light mb-2"><?= $Cursos['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span class="btn btn-light mb-2"><?= $Cursos['curso_create_date'] ?></span> 
                            </td>
                            <td>
                                <span class="btn btn-light mb-2"><?= $Cursos['curso_descricao'] ?></span>
                            </td>
                            <td>
                                <!-- <a href="<?= BASE ?>/" class="table-link" title="Pesquisar usuários">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a> -->
                                <a href="<?= BASE ?>/painel/courses/update" class="table-link" title="Atualizar curso">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/delete" class="table-link danger" title="Excluir curso">
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
<?php
echo $Component->getFooterDashboard();
?>