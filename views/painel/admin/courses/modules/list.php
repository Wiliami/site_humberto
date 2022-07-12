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
        <div class="card-body card-header py-3 d-sm-flex align-items-center justify-content-between">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * 
                FROM cursos 
                WHERE curso_id = :ci", "ci={$courseId}");
            if($Read->getResult()) {
                $DataCourse = $Read->getResult()[0]; 
                    ?>
                <div class="h3 m-0 text-dark" style="font-size: 15px;"><b><?= $DataCourse['curso_titulo'] ?></b></div>
                <a href="<?= BASE ?>/painel/admin/courses/modules/create&course=<?= $DataCourse['curso_id'] ?>" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Cadastrar módulo</a>
            <?php
                } else {
                    die(Error("Curso não encontrado!", "danger"));
                }
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_lista_modulos" class="cell-border compact stripe table-striped" style="width: 100%;">
                    <thead>
                        <tr style ="font-size: 10px;">
                            <th>MÓDULOS DO CURSO</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read->FullRead("SELECT m.*, uc.user_name, uu.user_name as update_user
                            FROM modulos m
                            LEFT JOIN users uc ON uc.user_id = m.modulo_create_user
                            LEFT JOIN users uu ON uu.user_id = m.modulo_update_user
                            -- LEFT JOIN users uc ON uc.user_id = m.modulo_create_user
                            WHERE m.curso_id = :mi", "mi={$courseId}");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $DataModule) {
                                ?>
                        <tr style="font-size: 10px;">
                            <td>
                                <?= $DataModule['modulo_name'] ?>
                            </td>
                            <td>
                                <?= $DataModule['user_name'] ?>
                            </td>
                            <td>
                                <?= $DataModule['update_user'] ?>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/admin/courses/modules/update&module=<?= $DataModule['modulo_id'] ?>" class="btn-sm" title="Atualizar módulo"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/admin/courses/lesson/list&module=<?= $DataModule['modulo_id'] ?>" class="btn-sm" title="Ver aulas desse módulo" style="color: #1cc88a;"><i class="fas fa-chalkboard-teacher"></i></a>
                                <a href="<?= BASE ?>/painel/admin/courses/modules/delete&delete_module=<?= $DataModule['modulo_id'] ?>" class="danger btn-sm" title="Excluir módulo" style="color: red;" title="Excluir curso"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        }  
                        ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-size: 10px;">
                            <th><span>MÓDULOS DO CURSO</span></th>
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
    $("#table_lista_modulos").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum módulo foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>