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
$userId = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <?php
            $Read = new Read();
            $Read->FullRead("SELECT * FROM users WHERE user_id = :ui", "ui={$userId}");
            if($Read->getResult()) {
                $User = $Read->getResult()[0];
                ?>
            <div class="h5 m-0 text-dark" style="font-size: 14px">Cursos de <?= $User['user_name'] ?></div>
            <a href="<?= BASE ?>/painel/admin/users/list" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Voltar</a>
            <?php
            } else {
                die(Error("Usuário não encontrado!", "danger"));
            }
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-cursos" class="cell-border compact stripe table-striped" style="width: 100%;">
                    <thead>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>CURSO</th>
                            <th>VALOR DO CURSO</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read->FullRead("SELECT * FROM cursos WHERE user_id = :ui", "ui={$userId}");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $DataCourseUser) {
                                ?>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <td>
                                <?= $DataCourseUser['curso_titulo'] ?> 
                            </td>
                            <td>
                                R$<?= number_format($DataCourseUser['curso_valor'], 2, ',', '.') ?>    
                            </td>
                            <td>
                                <!-- $DataCourseUser['user_create'] ?>   -->
                                <?= $DataCourseUser['user_create'] ?>   
                            </td>
                            <td>
                                <!-- $DataCourseUser['user_update']   -->
                                <?= $DataCourseUser['user_update'] ?>
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/admin/courses/update&update_curso=<?= $DataCourseUser['curso_id'] ?>" class="btn-sm" title="Editar <?= $DataCourseUser['curso_titulo'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/admin/courses/modules/list&course=<?= $DataCourseUser['curso_id'] ?>" class="btn-sm" title="Módulos de <?= $DataCourseUser['curso_titulo'] ?>" style="color: #1cc88a;"><i class="fas fa-book"></i></a>
                                <a href="<?= BASE ?>/painel/admin/courses/delete&delete_curso=<?= $DataCourseUser['curso_id'] ?>" class="danger btn-sm" title="Excluir <?= $DataCourseUser['curso_titulo'] ?>" style="color: red;"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            die(Error("Cursos não encontrados", 'warning'));
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>CURSO</th>
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
    $("#table-lista-cursos").DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum curso foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>
