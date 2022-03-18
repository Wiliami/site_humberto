<?php 
$User = new User();
$User->verifyExistLoginUser();
$Component = new Component();
echo $Component->getBlockPageAdmin();
echo $Component->getHeadHtmlDashboard();
echo $Component->getHeadHtmlDataTable();
echo $Component->getSideBarDashboard();
echo $Component->getLiAdministrativoDashboard();
echo $Component->getLiCoursesDashboard();
echo $Component->getLiPagesDashboard();
echo $Component->getCreatePagesAdmin();
echo $Component->getListPagesAdmin();
echo $Component->getMenuDashboard();
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark" style ="font-size: 13px;">Matrículas de cursos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="lista-matriculas" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th><span>USUÁRIO</span></th>
                            <th><span>CURSO</span></th>
                            <th><span>DATA DA MATRÍCULA</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇÕES</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM matriculas_cursos");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Matriculas) {
                                ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <span><?= $Matriculas['user_id'] ?></span>
                            </td>
                            <td>
                                <span><?= $Matriculas['curso_id'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($Matriculas['matricula_create_date'])) ?></span>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/update&matricula_update=<?= $Matriculas['matricula_id'] ?>" class="table-link btn-sm" title="Editar matrícula de <?= $Matriculas['curso_id'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/delete&delete_matricula=<?= $Matriculas['matricula_id'] ?>" class="table-link danger btn-sm" title="Excluir matrícula de <?= $Matriculas['user_id'] ?>" style="color: red;">
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
                            Error("Ainda não existe lista de matrículas!");
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th><span>USUÁRIO</span></th>
                            <th><span>CURSO</span></th>
                            <th><span>DATA DA MATRÍCULA</span></th>
                            <th><span>CAD. POR</span></th>
                            <th><span>ATU. POR</span></th>
                            <th><span>OPÇÕES</span></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $Component->getFooterDashboard(); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $("#lista-matriculas").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum resultado foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>