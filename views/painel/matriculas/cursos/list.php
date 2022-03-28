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
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark" style ="font-size: 13px;">Matrículas de cursos</h6>
            <a href="<?= BASE ?>/painel/matriculas/cursos/create" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Nova matrícula</a>
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
                        $Read->FullRead("SELECT mc.*, u.user_name, c.curso_titulo
                            FROM matriculas_cursos mc
                            LEFT JOIN users u ON u.user_id = mc.user_id
                            LEFT JOIN cursos c ON c.curso_id = mc.curso_id");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $Mat) {
                                ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <span><?= $Mat['user_name'] ?></span>
                            </td>
                            <td>
                                <span><?= $Mat['curso_titulo'] ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y', strtotime($Mat['matricula_create_date'])) ?></span>
                            </td>
                            <td>
                                <span><?= $Mat['matricula_create_user'] ?></span>
                            </td>
                            <td>
                                <span><?= $Mat['matricula_update_user'] ?></span>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/update&matricula_update=<?= $Mat['matricula_id'] ?>" class="btn-sm" title="Editar matrícula"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/matriculas/cursos/delete&delete_matricula=<?= $Mat['matricula_id'] ?>" class="btn-sm" title="Excluir matrícula de <?= $Mat['user_name'] ?>" style="color: red;"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
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
            "zeroRecords": "Nenhum curso foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>