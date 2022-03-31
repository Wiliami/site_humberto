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
$courseId = filter_input(INPUT_GET, 'course', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM cursos WHERE curso_id = :ci", "ci={$courseId}");
            if($Read->getResult()) {
                foreach($Read->getResult() as $Course) {
                    ?>
                <div class="h5 m-0 text-dark" style="font-size: 14px">Usuários matriculados em <b><?= $Course['curso_titulo'] ?></b></div>
                <a href="<?= BASE ?>/painel/matriculas/cursos/create" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Nova matrícula</a>
            <?php
                }
            } else {
                Error("Curso não encontrado!", "danger");
            }
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_lista_matriculate" class="cell-border compact stripe table-striped" style="width: 100%;">
                    <thead>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>USUÁRIOS</th>
                            <th>DATA DA MATRÍCULA</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read->FullRead("SELECT mc.*, u.user_name, uc.user_name as user_create
                            FROM matriculas_cursos mc
                            LEFT JOIN users u ON u.user_id = mc.user_id
                            LEFT JOIN users uc ON uc.user_id = mc.matricula_create_user
                            WHERE mc.curso_id = :ci", "ci={$courseId}");
                        if($Read->getResult()) {
                                foreach($Read->getResult() as $Users)
                            ?>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <td>
                                <?= $Users['user_name'] ?>
                            </td>
                            <td>
                                <?= date('d/m/Y H:i:s', strtotime($Users['matricula_create_date'])) ?>
                            </td>
                            <td>
                                <?= $Users['user_create'] ?>
                            </td>
                            <td>
                                <?= $Users['matricula_update_user'] ?>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/courses/update&update_curso=<?= $Courses['curso_id'] ?>" class="btn-sm" title="Editar matrícula"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/courses/delete&delete_curso=<?= $Courses['curso_id'] ?>" class="danger btn-sm" title="Excluir matrícula" style="color: red;"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>USUÁRIO</th>
                            <th>VALOR DO CURSO</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
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
    $("#table_lista_matriculate").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum usuário foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>