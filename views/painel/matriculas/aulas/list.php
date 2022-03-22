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
            <h6 class="m-0 h6 text-dark">Lista de matrículas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="lista-matriculas-aulas" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr style="font-size: 10px;">
                            <th><span>USUÁRIO MATRICULADO</span></th>
                            <th><span>CURSO MATRICULADO</span></th>
                            <th><span>DATA DA MATRÍCULA</span></th>
                            <th><span>OPCOES</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM matriculas_aulas");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $MatAulas) {
                                ?>
                        <tr style="font-size: 11px;">
                            <td>
                                <span><?= $MatAulas['matricula_usuario'] ?></span>
                            </td>
                            <td>
                                <span><?= $MatAulas['matricula_aula'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($MatAulas['matricula_aula_date'])) ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/matriculas/aulas/update&matricula_update_aula=<?= $MatAulas['matricula_id'] ?>" class="table-link" title="Editar matrícula de <?= $MatAulas['matricula_usuario'] ?>">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="<?= BASE ?>/painel/matriculas-aulas/delete&delete_matricula_aula=<?= $MatAulas['matricula_id'] ?>" class="table-link danger" title="Excluir matrícula de <?= $Matriculas['matricula_usuario'] ?>" style="color: red;">
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
                            Error("Lista de matrículas não encontrada!");
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th><span>USUÁRIO MATRICULADO</span></th>
                            <th><span>CURSO MATRICULADO</span></th>
                            <th><span>DATA DA MATRÍCULA</span></th>
                            <th><span>OPCOES</span></th>
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
    $("#lista-matriculas-aulas").DataTable({
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