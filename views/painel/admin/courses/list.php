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
            <div class="h5 m-0 text-dark" style="font-size: 14px">Lista de cursos</div>
            <a href="<?= BASE ?>/painel/admin/courses/create" class="btn btn-success rounded-pill" style="border-radius: 50%; font-size: 11px;">Cadastrar novo curso</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-lista-cursos" class="cell-border compact stripe table-striped" style="width: 100%;">
                    <thead>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>NOME DO CURSO</th>
                            <th>VALOR DO CURSO</th>
                            <th>CAD. POR</th>
                            <th>ATU. POR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT c.*, uc.user_name as user_create, uu.user_name as user_update
                            FROM cursos c
                            LEFT JOIN users uc ON uc.user_id = c.curso_user_create
                            LEFT JOIN users uu ON uu.user_id = c.curso_user_update");
                        if($Read->getResult()) {
                            foreach($Read->getResult() as $DataCourse) {
                                ?>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <td>
                                <?= $DataCourse['curso_titulo'] ?> 
                            </td>
                            <td>
                                R$<?= number_format($DataCourse['curso_valor'], 2, ',', '.') ?>    
                            </td>
                            <td>
                                <?= $DataCourse['user_create'] ?>  
                            </td>
                            <td>
                                <?= $DataCourse['user_update'] ?>  
                            </td>
                            <td>
                                <a href="<?= BASE ?>/painel/admin/courses/update&update_curso=<?= $DataCourse['curso_id'] ?>" class="btn-sm" title="Editar <?= $DataCourse['curso_titulo'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?= BASE ?>/painel/admin/courses/modules/list&course=<?= $DataCourse['curso_id'] ?>" class="btn-sm" title="Módulos de <?= $DataCourse['curso_titulo'] ?>" style="color: #1cc88a;"><i class="fas fa-book"></i></a>
                                <a href="<?= BASE ?>/painel/admin/courses/delete&delete_curso=<?= $DataCourse['curso_id'] ?>" class="danger btn-sm" title="Excluir <?= $DataCourse['curso_titulo'] ?>" style="color: red;"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            die(Error("Cursos não encontrados", 'c'));
                        }   
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="btn-sm" style="font-size: 10px;">
                            <th>NOME DO CURSO</th>
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
            "zeroRecords": "Nenhum registro foi encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_ registros",
            "infoEmpty": "Nenhum registro foi encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });
});
</script>