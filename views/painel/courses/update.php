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
                <table id="listar-usuarios" class="table table-striped" style="width: 100%">
                    <div class="d-sm-flex align-items-center justify-content-start mb-2">
                        <i class="fas fa-pen-square"></i>
                        <h1 class="h3 mb-0 text-gray-800 ml-2">Cursos | Atualizar cursos</h1>
                    </div>
                    <thead>
                        <tr>
                            <th><span>Nome do curso</span></th>
                            <th><span>Criado</span></th>
                            <th class="text-center"><span>Descrição do curso</span></th>
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
                                <span><?= $Cursos['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span><?= $Cursos['curso_create_date'] ?></span>
                            </td>
                            <td>
                                <span><?= $Cursos['curso_descricao'] ?></span>
                            </td>
                            <td>
                                <a href="/" class="table-link">
                                    <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/update" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/delete" class="table-link danger">
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