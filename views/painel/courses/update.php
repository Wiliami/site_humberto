<?php
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Cursos | Atualizar cursos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-cursos-update" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th><span>Nome do curso</span></th>
                            <th><span>Criado</span></th>
                            <th class="text-center"><span>Descrição do curso</span></th>
                            <th><span>Opções</span></th>
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
                                <a href="<?= BASE ?>/" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse" title="pesquisar <?= $Cursos['curso_titulo'] ?>"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/update" class="table-link" title="Atualizar curso <?= $Cursos['curso_titulo'] ?> "data-toggle="modal" data-target="#updateCourse">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/courses/delete" class="table-link" title="<?= $Cursos['curso_titulo'] ?>">
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


<div class="container">
    <div class="modal fade" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <?php 
            $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
            if(!empty($Post['register_module'])) { // se for diferente de branco (input diferente de sem valor ) ele registra esse input que contém o submit
                $CreateModule['modulo_name'] = $Post['module'];
                $Course = new Course();
                $Course->createModule($CreateModule);
                if($Course->getResult()) {
                    header('Location: '  . BASE . '/painel/courses/update');
                    Error($Course->getError());
                } else {
                    Error($Course->getError());
                }
            } 
            ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title btn btn-success bm-2 vw-100" id="updateCourse">Cadastre um módulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome do módulo</label>
                            <input type="text" class="form-control" name="module" id="recipient-name">
                        </div>        
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-success mb-2" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success mb-2" name="register_module" value="Cadastrar">
                </div>
            </div>
        </div>
    </div>
</div>



<?= $Component->getFooterDashboard(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $("#table-cursos-update").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>